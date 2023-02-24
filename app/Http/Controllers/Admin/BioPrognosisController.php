<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyBioPrognosiRequest;
use App\Http\Requests\StoreBioPrognosiRequest;
use App\Http\Requests\UpdateBioPrognosiRequest;
use App\Models\BioPrognosi;
use App\Models\Bioprognosis;
use Gate;
use Symfony\Component\HttpFoundation\Response;

class BioPrognosisController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('bio_prognosi_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bioPrognosis = Bioprognosis::all();

        return view('admin.bioPrognosis.index', compact('bioPrognosis'));
    }

    public function create()
    {
        abort_if(Gate::denies('bio_prognosi_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bioPrognosis.create');
    }

    public function store(StoreBioPrognosiRequest $request)
    {
        $bioPrognosi = Bioprognosis::create($request->all());

        return redirect()->route('admin.bio-prognosis.index');
    }

    public function edit(Bioprognosis $bioPrognosi)
    {
        abort_if(Gate::denies('bio_prognosi_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bioPrognosis.edit', compact('bioPrognosi'));
    }

    public function update(UpdateBioPrognosiRequest $request, Bioprognosis $bioPrognosi)
    {
        $bioPrognosi->update($request->all());

        return redirect()->route('admin.bio-prognosis.index');
    }

    public function show(Bioprognosis $bioPrognosi)
    {
        abort_if(Gate::denies('bio_prognosi_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.bioPrognosis.show', compact('bioPrognosi'));
    }

    public function destroy(Bioprognosis $bioPrognosi)
    {
        abort_if(Gate::denies('bio_prognosi_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $bioPrognosi->delete();

        return back();
    }

    public function massDestroy(MassDestroyBioPrognosiRequest $request)
    {
        Bioprognosis::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
