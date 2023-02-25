<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyEarthquakeRequest;
use App\Http\Requests\StoreEarthquakeRequest;
use App\Http\Requests\UpdateEarthquakeRequest;
use App\Imports\EarthquakesImport;
use App\Models\Earthquake;
use App\Service\EarthquakeService;
use Gate;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\Response;

class EarthquakeController extends Controller
{

    public function __construct(public EarthquakeService $earthquakeService){}

    public function index()
    {
        abort_if(Gate::denies('earthquake_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $earthquakes = Earthquake::all();

        return view('admin.earthquakes.index', compact('earthquakes'));
    }

    public function create()
    {
        abort_if(Gate::denies('earthquake_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.earthquakes.create');
    }

    public function store(StoreEarthquakeRequest $request)
    {
        $earthquake = Earthquake::create($request->all());
        $this->earthquakeService->generateDraftPost($earthquake);

        return redirect()->route('admin.earthquakes.index');
    }

    public function edit(Earthquake $earthquake)
    {
        abort_if(Gate::denies('earthquake_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.earthquakes.edit', compact('earthquake'));
    }

    public function update(UpdateEarthquakeRequest $request, Earthquake $earthquake)
    {
        $earthquake->update($request->all());

        return redirect()->route('admin.earthquakes.index');
    }

    public function show(Earthquake $earthquake)
    {
        abort_if(Gate::denies('earthquake_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.earthquakes.show', compact('earthquake'));
    }

    public function destroy(Earthquake $earthquake)
    {
        abort_if(Gate::denies('earthquake_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $earthquake->delete();

        return back();
    }

    public function massDestroy(MassDestroyEarthquakeRequest $request)
    {
        Earthquake::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    // Import data from excel file
    public function import(Request $request)
    {
        // Validate the excel file
        $request->validate([
            'file' => 'required|mimes:xls,xlsx,csv'
        ]);
        Excel::import(new EarthquakesImport, $request->file('file')->store('temp'));

        return redirect()->route('admin.earthquakes.index')->with('success', 'Data imported successfully.');
    }
}
