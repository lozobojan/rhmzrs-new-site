<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyDocumentAndRegulationRequest;
use App\Http\Requests\StoreDocumentAndRegulationRequest;
use App\Http\Requests\UpdateDocumentAndRegulationRequest;
use App\Models\Page;
use App\Models\DocumentAndRegulation;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class DocumentAndRegulationController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('document_and_regulation_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documentAndRegulations = DocumentAndRegulation::with(['page', 'media'])->get();

        $pages = Page::get();

        return view('admin.documentAndRegulations.index', compact('pages', 'documentAndRegulations'));
    }

    public function create()
    {
        abort_if(Gate::denies('document_and_regulation_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pages = Page::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.documentAndRegulations.create', compact('pages'));
    }

    public function store(StoreDocumentAndRegulationRequest $request)
    {
        $documentAndRegulation = DocumentAndRegulation::create($request->all());

        foreach ($request->input('attachments', []) as $file) {
            $documentAndRegulation->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('attachments');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $documentAndRegulation->id]);
        }

        return redirect()->route('admin.document-and-regulations.index');
    }

    public function edit(DocumentAndRegulation $documentAndRegulation)
    {
        abort_if(Gate::denies('document_and_regulation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pages = Page::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $documentAndRegulation->load('page');

        return view('admin.documentAndRegulations.edit', compact('pages', 'documentAndRegulation'));
    }

    public function update(UpdateDocumentAndRegulationRequest $request, DocumentAndRegulation $documentAndRegulation)
    {
        $documentAndRegulation->update($request->all());

        if (count($documentAndRegulation->attachments) > 0) {
            foreach ($documentAndRegulation->attachments as $media) {
                if (!in_array($media->file_name, $request->input('attachments', []))) {
                    $media->delete();
                }
            }
        }
        $media = $documentAndRegulation->attachments->pluck('file_name')->toArray();
        foreach ($request->input('attachments', []) as $file) {
            if (count($media) === 0 || !in_array($file, $media)) {
                $documentAndRegulation->addMedia(storage_path('tmp/uploads/' . basename($file)))->toMediaCollection('attachments');
            }
        }

        return redirect()->route('admin.document-and-regulations.index');
    }

    public function show(DocumentAndRegulation $documentAndRegulation)
    {
        abort_if(Gate::denies('document_and_regulation_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documentAndRegulation->load('page');

        return view('admin.documentAndRegulations.show', compact('documentAndRegulation'));
    }

    public function destroy(DocumentAndRegulation $documentAndRegulation)
    {
        abort_if(Gate::denies('document_and_regulation_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $documentAndRegulation->delete();

        return back();
    }

    public function massDestroy(MassDestroyDocumentAndRegulationRequest $request)
    {
        DocumentAndRegulation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('document_and_regulation_create') && Gate::denies('document_and_regulation_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new DocumentAndRegulation();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
