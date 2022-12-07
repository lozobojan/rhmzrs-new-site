<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyCurrentTemperatureRequest;
use App\Http\Requests\StoreCurrentTemperatureRequest;
use App\Http\Requests\UpdateCurrentTemperatureRequest;
use App\Models\CurrentTemperature;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class CurrentTemperatureController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('current_temperature_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $currentTemperatures = CurrentTemperature::all();

        return view('admin.currentTemperatures.index', compact('currentTemperatures'));
    }

    public function create()
    {
        abort_if(Gate::denies('current_temperature_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.currentTemperatures.create');
    }

    public function store(StoreCurrentTemperatureRequest $request)
    {
        $currentTemperature = CurrentTemperature::create($request->all());

        return redirect()->route('admin.current-temperatures.index');
    }

    public function edit(CurrentTemperature $currentTemperature)
    {
        abort_if(Gate::denies('current_temperature_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.currentTemperatures.edit', compact('currentTemperature'));
    }

    public function update(UpdateCurrentTemperatureRequest $request, CurrentTemperature $currentTemperature)
    {
        $currentTemperature->update($request->all());

        return redirect()->route('admin.current-temperatures.index');
    }

    public function show(CurrentTemperature $currentTemperature)
    {
        abort_if(Gate::denies('current_temperature_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.currentTemperatures.show', compact('currentTemperature'));
    }

    public function destroy(CurrentTemperature $currentTemperature)
    {
        abort_if(Gate::denies('current_temperature_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $currentTemperature->delete();

        return back();
    }

    public function massDestroy(MassDestroyCurrentTemperatureRequest $request)
    {
        CurrentTemperature::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
