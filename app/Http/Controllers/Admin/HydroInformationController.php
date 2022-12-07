<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyHydroInformationRequest;
use App\Http\Requests\StoreHydroInformationRequest;
use App\Http\Requests\UpdateHydroInformationRequest;
use App\Models\HydroInformation;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class HydroInformationController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('hydro_information_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hydroInformations = HydroInformation::all();

        return view('admin.hydroInformations.index', compact('hydroInformations'));
    }

    public function create()
    {
        abort_if(Gate::denies('hydro_information_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.hydroInformations.create');
    }

    public function store(StoreHydroInformationRequest $request)
    {
        $hydroInformation = HydroInformation::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $hydroInformation->id]);
        }

        return redirect()->route('admin.hydro-informations.index');
    }

    public function edit(HydroInformation $hydroInformation)
    {
        abort_if(Gate::denies('hydro_information_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.hydroInformations.edit', compact('hydroInformation'));
    }

    public function update(UpdateHydroInformationRequest $request, HydroInformation $hydroInformation)
    {
        $hydroInformation->update($request->all());

        return redirect()->route('admin.hydro-informations.index');
    }

    public function show(HydroInformation $hydroInformation)
    {
        abort_if(Gate::denies('hydro_information_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.hydroInformations.show', compact('hydroInformation'));
    }

    public function destroy(HydroInformation $hydroInformation)
    {
        abort_if(Gate::denies('hydro_information_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $hydroInformation->delete();

        return back();
    }

    public function massDestroy(MassDestroyHydroInformationRequest $request)
    {
        HydroInformation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('hydro_information_create') && Gate::denies('hydro_information_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new HydroInformation();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
