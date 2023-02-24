<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyMeteoStationRequest;
use App\Http\Requests\StoreMeteoStationRequest;
use App\Http\Requests\UpdateMeteoStationRequest;
use App\Imports\MeteoStationsImport;
use App\Models\MeteoStation;
use Gate;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class MeteoStationController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('meteo_station_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $meteoStations = MeteoStation::all();

        return view('admin.meteoStations.index', compact('meteoStations'));
    }

    public function create()
    {
        abort_if(Gate::denies('meteo_station_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.meteoStations.create');
    }

    public function store(StoreMeteoStationRequest $request)
    {
        $meteoStation = MeteoStation::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $meteoStation->id]);
        }

        return redirect()->route('admin.meteo-stations.index');
    }

    public function edit(MeteoStation $meteoStation)
    {
        abort_if(Gate::denies('meteo_station_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.meteoStations.edit', compact('meteoStation'));
    }

    public function update(UpdateMeteoStationRequest $request, MeteoStation $meteoStation)
    {
        $meteoStation->update($request->all());

        return redirect()->route('admin.meteo-stations.index');
    }

    public function show(MeteoStation $meteoStation)
    {
        abort_if(Gate::denies('meteo_station_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.meteoStations.show', compact('meteoStation'));
    }

    public function destroy(MeteoStation $meteoStation)
    {
        abort_if(Gate::denies('meteo_station_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $meteoStation->delete();

        return back();
    }

    public function massDestroy(MassDestroyMeteoStationRequest $request)
    {
        MeteoStation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function import(Request $request)
    {
        // Validate the excel file
        $request->validate([
            'file' => 'required|mimes:xls,xlsx,csv'
        ]);
        Excel::import(new MeteoStationsImport(), $request->file('file')->store('temp'));

        return redirect()->route('admin.meteo-stations.index')->with('success', 'Data imported successfully.');
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('meteo_station_create') && Gate::denies('meteo_station_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new MeteoStation();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
