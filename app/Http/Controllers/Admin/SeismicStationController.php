<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEarthquakeRequest;
use App\Http\Requests\MassDestroySeismicStationRequest;
use App\Http\Requests\StoreEarthquakeRequest;
use App\Http\Requests\StoreSeismicStationRequest;
use App\Http\Requests\UpdateEarthquakeRequest;
use App\Http\Requests\UpdateSeismicStationRequest;
use App\Imports\EarthquakesImport;
use App\Imports\SeismicStationsImport;
use App\Models\Earthquake;
use App\Models\SeismicStation;
use App\Service\EarthquakeService;
use Gate;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\Response;

class SeismicStationController extends Controller
{

    public function __construct(public EarthquakeService $earthquakeService){}

    public function index()
    {
        abort_if(Gate::denies('seismic-station_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $seismicStations = SeismicStation::all();

        return view('admin.seismicStations.index', compact('seismicStations'));
    }

    public function create()
    {
        abort_if(Gate::denies('seismic-station_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.seismicStations.create');
    }

    public function store(StoreSeismicStationRequest $request)
    {
        SeismicStation::create($request->all());

        return redirect()->route('admin.seismicStations.index');
    }

    public function edit(SeismicStation $seismicStation)
    {
        abort_if(Gate::denies('seismic-station_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.seismicStations.edit', compact('seismicStation'));
    }

    public function update(UpdateSeismicStationRequest $request, SeismicStation $seismicStation)
    {
        $seismicStation->update($request->all());

        return redirect()->route('admin.seismic-station.index');
    }

    public function show(SeismicStation $seismicStation)
    {
        abort_if(Gate::denies('earthquake_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.seismicStations.show', compact('seismicStation'));
    }

    public function destroy(SeismicStation $seismicStation)
    {
        abort_if(Gate::denies('seismic-station_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $seismicStation->delete();

        return back();
    }

    public function massDestroy(MassDestroySeismicStationRequest $request)
    {
        SeismicStation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('seismic-station_create') && Gate::denies('seismic-station_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new SeismicStation();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }

    // Import data from excel file
    public function import(Request $request)
    {
        // Validate the excel file
        $request->validate([
            'file' => 'required|mimes:xls,xlsx,csv'
        ]);
        Excel::import(new SeismicStationsImport(), $request->file('file')->store('temp'));

        return redirect()->route('admin.seismic-station.index')->with('success', 'Data imported successfully.');
    }
}
