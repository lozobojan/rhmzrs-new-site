<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyFloodDefensePointRequest;
use App\Http\Requests\StoreFloodDefensePointRequest;
use App\Http\Requests\UpdateFloodDefensePointRequest;
use App\Models\FloodDefensePoint;
use App\Models\RiverBasin;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FloodDefensePointController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('flood_defense_point_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $floodDefensePoints = FloodDefensePoint::with(['river_basin'])->get();

        return view('admin.floodDefensePoints.index', compact('floodDefensePoints'));
    }

    public function create()
    {
        abort_if(Gate::denies('flood_defense_point_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $river_basins = RiverBasin::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.floodDefensePoints.create', compact('river_basins'));
    }

    public function store(StoreFloodDefensePointRequest $request)
    {
        $floodDefensePoint = FloodDefensePoint::create($request->all());

        return redirect()->route('admin.flood-defense-points.index');
    }

    public function edit(FloodDefensePoint $floodDefensePoint)
    {
        abort_if(Gate::denies('flood_defense_point_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $river_basins = RiverBasin::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $floodDefensePoint->load('river_basin');

        return view('admin.floodDefensePoints.edit', compact('floodDefensePoint', 'river_basins'));
    }

    public function update(UpdateFloodDefensePointRequest $request, FloodDefensePoint $floodDefensePoint)
    {
        $floodDefensePoint->update($request->all());

        return redirect()->route('admin.flood-defense-points.index');
    }

    public function show(FloodDefensePoint $floodDefensePoint)
    {
        abort_if(Gate::denies('flood_defense_point_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $floodDefensePoint->load('river_basin');

        return view('admin.floodDefensePoints.show', compact('floodDefensePoint'));
    }

    public function destroy(FloodDefensePoint $floodDefensePoint)
    {
        abort_if(Gate::denies('flood_defense_point_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $floodDefensePoint->delete();

        return back();
    }

    public function massDestroy(MassDestroyFloodDefensePointRequest $request)
    {
        FloodDefensePoint::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
