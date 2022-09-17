<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPublicPurchaseRequest;
use App\Http\Requests\StorePublicPurchaseRequest;
use App\Http\Requests\UpdatePublicPurchaseRequest;
use App\Models\Page;
use App\Models\PublicPurchase;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PublicPurchaseController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('public_purchase_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $publicPurchases = PublicPurchase::with(['page', 'media'])->get();

        $pages = Page::get();

        return view('admin.publicPurchases.index', compact('pages', 'publicPurchases'));
    }

    public function create()
    {
        abort_if(Gate::denies('public_purchase_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pages = Page::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.publicPurchases.create', compact('pages'));
    }

    public function store(StorePublicPurchaseRequest $request)
    {
        $publicPurchase = PublicPurchase::create($request->all());

        foreach ($request->input('attachments', []) as $file) {
            $publicPurchase->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('attachments');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $publicPurchase->id]);
        }

        return redirect()->route('admin.public-purchases.index');
    }

    public function edit(PublicPurchase $publicPurchase)
    {
        abort_if(Gate::denies('public_purchase_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pages = Page::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $publicPurchase->load('page');

        return view('admin.publicPurchases.edit', compact('pages', 'publicPurchase'));
    }

    public function update(UpdatePublicPurchaseRequest $request, PublicPurchase $publicPurchase)
    {
        $publicPurchase->update($request->all());

        if (count($publicPurchase->attachments) > 0) {
            foreach ($publicPurchase->attachments as $media) {
                if (!in_array($media->file_name, $request->input('attachments', []))) {
                    $media->delete();
                }
            }
        }
        $media = $publicPurchase->attachments->pluck('file_name')->toArray();
        foreach ($request->input('attachments', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $publicPurchase->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('attachments');
            }
        }

        return redirect()->route('admin.public-purchases.index');
    }

    public function show(PublicPurchase $publicPurchase)
    {
        abort_if(Gate::denies('public_purchase_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $publicPurchase->load('page');

        return view('admin.publicPurchases.show', compact('publicPurchase'));
    }

    public function destroy(PublicPurchase $publicPurchase)
    {
        abort_if(Gate::denies('public_purchase_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $publicPurchase->delete();

        return back();
    }

    public function massDestroy(MassDestroyPublicPurchaseRequest $request)
    {
        PublicPurchase::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('public_purchase_create') && Gate::denies('public_purchase_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new PublicPurchase();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
