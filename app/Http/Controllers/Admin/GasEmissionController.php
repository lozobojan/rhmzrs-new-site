<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyGasEmissionRequest;
use App\Http\Requests\StoreGasEmissionRequest;
use App\Http\Requests\UpdateGasEmissionRequest;
use App\Models\GasEmission;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class GasEmissionController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('gas_emission_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gasEmissions = GasEmission::all();

        return view('admin.gasEmissions.index', compact('gasEmissions'));
    }

    public function create()
    {
        abort_if(Gate::denies('gas_emission_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.gasEmissions.create');
    }

    public function store(StoreGasEmissionRequest $request)
    {
        $gasEmission = GasEmission::create($request->all());

        return redirect()->route('admin.gas-emissions.index');
    }

    public function edit(GasEmission $gasEmission)
    {
        abort_if(Gate::denies('gas_emission_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.gasEmissions.edit', compact('gasEmission'));
    }

    public function update(UpdateGasEmissionRequest $request, GasEmission $gasEmission)
    {
        $gasEmission->update($request->all());

        return redirect()->route('admin.gas-emissions.index');
    }

    public function show(GasEmission $gasEmission)
    {
        abort_if(Gate::denies('gas_emission_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.gasEmissions.show', compact('gasEmission'));
    }

    public function destroy(GasEmission $gasEmission)
    {
        abort_if(Gate::denies('gas_emission_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $gasEmission->delete();

        return back();
    }

    public function massDestroy(MassDestroyGasEmissionRequest $request)
    {
        GasEmission::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
