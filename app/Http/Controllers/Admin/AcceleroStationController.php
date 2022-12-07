<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAcceleroStationRequest;
use App\Http\Requests\StoreAcceleroStationRequest;
use App\Http\Requests\UpdateAcceleroStationRequest;
use App\Models\AcceleroStation;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class AcceleroStationController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('accelero_station_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $acceleroStations = AcceleroStation::all();

        return view('admin.acceleroStations.index', compact('acceleroStations'));
    }

    public function create()
    {
        abort_if(Gate::denies('accelero_station_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.acceleroStations.create');
    }

    public function store(StoreAcceleroStationRequest $request)
    {
        $acceleroStation = AcceleroStation::create($request->all());

        return redirect()->route('admin.accelero-stations.index');
    }

    public function edit(AcceleroStation $acceleroStation)
    {
        abort_if(Gate::denies('accelero_station_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.acceleroStations.edit', compact('acceleroStation'));
    }

    public function update(UpdateAcceleroStationRequest $request, AcceleroStation $acceleroStation)
    {
        $acceleroStation->update($request->all());

        return redirect()->route('admin.accelero-stations.index');
    }

    public function show(AcceleroStation $acceleroStation)
    {
        abort_if(Gate::denies('accelero_station_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.acceleroStations.show', compact('acceleroStation'));
    }

    public function destroy(AcceleroStation $acceleroStation)
    {
        abort_if(Gate::denies('accelero_station_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $acceleroStation->delete();

        return back();
    }

    public function massDestroy(MassDestroyAcceleroStationRequest $request)
    {
        AcceleroStation::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
