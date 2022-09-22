<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDocumentAndRegulationRequest;
use App\Http\Requests\StoreDocumentAndRegulationRequest;
use App\Http\Requests\UpdateDocumentAndRegulationRequest;
use App\Models\Page;
use App\Models\PublicCompetition;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class PublicCompetitionController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('public_competition_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $publicCompetitions = PublicCompetition::with(['page', 'media'])->get();

        $pages = Page::get();

        return view('admin.publicCompetitions.index', compact('pages', 'publicCompetitions'));
    }

    public function create()
    {
        abort_if(Gate::denies('public_competition_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pages = Page::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.publicCompetitions.create', compact('pages'));
    }

    public function store(StoreDocumentAndRegulationRequest $request)
    {
        $publicCompetition = PublicCompetition::create($request->all());

        foreach ($request->input('attachments', []) as $file) {
            $publicCompetition->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('attachments');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $publicCompetition->id]);
        }

        return redirect()->route('admin.public-competitions.index');
    }

    public function edit(PublicCompetition $publicCompetition)
    {
        abort_if(Gate::denies('public_competition_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pages = Page::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $publicCompetition->load('page');

        return view('admin.publicCompetitions.edit', compact('pages', 'publicCompetition'));
    }

    public function update(UpdateDocumentAndRegulationRequest $request, PublicCompetition $publicCompetition)
    {
        $publicCompetition->update($request->all());

        if (count($publicCompetition->attachments) > 0) {
            foreach ($publicCompetition->attachments as $media) {
                if (!in_array($media->file_name, $request->input('attachments', []))) {
                    $media->delete();
                }
            }
        }
        $media = $publicCompetition->attachments->pluck('file_name')->toArray();
        foreach ($request->input('attachments', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $publicCompetition->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('attachments');
            }
        }

        return redirect()->route('admin.public-competitions.index');
    }

    public function show(PublicCompetition $publicCompetition)
    {
        abort_if(Gate::denies('public_competition_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $publicCompetition->load('page');

        return view('admin.publicCompetitions.show', compact('publicCompetition'));
    }

    public function destroy(PublicCompetition $publicCompetition)
    {
        abort_if(Gate::denies('public_competition_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $publicCompetition->delete();

        return back();
    }

    public function massDestroy(MassDestroyDocumentAndRegulationRequest $request)
    {
        PublicCompetition::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('public_competition_create') && Gate::denies('public_competition_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new PublicCompetition();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
