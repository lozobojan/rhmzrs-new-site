<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyEcoInformationRequest;
use App\Http\Requests\StoreEcoInformationRequest;
use App\Http\Requests\UpdateEcoInformationRequest;
use App\Models\EcoInformation;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class EcoInformationController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;
    public function index()
    {
        abort_if(Gate::denies('eco_information_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ecoInformations = EcoInformation::all();

        return view('admin.ecoInformation.index', compact('ecoInformations'));
    }

    public function create()
    {
        abort_if(Gate::denies('eco_information_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ecoInformation.create');
    }

    public function store(StoreEcoInformationRequest $request)
    {
        $ecoInformation = EcoInformation::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $ecoInformation->id]);
        }

        return redirect()->route('admin.eco-information.index');
    }

    public function edit(EcoInformation $ecoInformation)
    {
        abort_if(Gate::denies('eco_information_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ecoInformation.edit', compact('ecoInformation'));
    }

    public function update(UpdateEcoInformationRequest $request, EcoInformation $ecoInformation)
    {
        $ecoInformation->update($request->all());

        return redirect()->route('admin.eco-information.index');
    }

    public function show(EcoInformation $ecoInformation)
    {
        abort_if(Gate::denies('eco_information_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ecoInformation.show', compact('ecoInformation'));
    }

    public function destroy(EcoInformation $ecoInformation)
    {
        abort_if(Gate::denies('eco_information_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ecoInformation->delete();

        return back();
    }

    public function massDestroy(MassDestroyEcoInformationRequest $request)
    {
        EcoInformation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('eco_information_create') && Gate::denies('eco_information_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new EcoInformation();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
