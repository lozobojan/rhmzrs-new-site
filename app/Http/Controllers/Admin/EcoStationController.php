<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyEcoStationRequest;
use App\Http\Requests\StoreEcoStationRequest;
use App\Http\Requests\UpdateEcoStationRequest;
use App\Models\EcoStation;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class EcoStationController extends Controller
{
    use MediaUploadingTrait;
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('eco_station_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ecoStations = EcoStation::all();

        return view('admin.ecoStations.index', compact('ecoStations'));
    }

    public function create()
    {
        abort_if(Gate::denies('eco_station_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ecoStations.create');
    }

    public function store(StoreEcoStationRequest $request)
    {
        $ecoStation = EcoStation::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $ecoStation->id]);
        }

        return redirect()->route('admin.eco-stations.index');
    }

    public function edit(EcoStation $ecoStation)
    {
        abort_if(Gate::denies('eco_station_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ecoStations.edit', compact('ecoStation'));
    }

    public function update(UpdateEcoStationRequest $request, EcoStation $ecoStation)
    {
        $ecoStation->update($request->all());

        return redirect()->route('admin.eco-stations.index');
    }

    public function show(EcoStation $ecoStation)
    {
        abort_if(Gate::denies('eco_station_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.ecoStations.show', compact('ecoStation'));
    }

    public function destroy(EcoStation $ecoStation)
    {
        abort_if(Gate::denies('eco_station_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $ecoStation->delete();

        return back();
    }

    public function massDestroy(MassDestroyEcoStationRequest $request)
    {
        EcoStation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('eco_station_create') && Gate::denies('eco_station_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new EcoStation();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
