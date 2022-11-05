<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyRiverBasinRequest;
use App\Http\Requests\StoreRiverBasinRequest;
use App\Http\Requests\UpdateRiverBasinRequest;
use App\Models\RiverBasin;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class RiverBasinController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('river_basin_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $riverBasins = RiverBasin::with(['media'])->get();

        return view('admin.riverBasins.index', compact('riverBasins'));
    }

    public function create()
    {
        abort_if(Gate::denies('river_basin_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.riverBasins.create');
    }

    public function store(StoreRiverBasinRequest $request)
    {
        $riverBasin = RiverBasin::create($request->all());

        if ($request->input('photo', false)) {
            $riverBasin->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $riverBasin->id]);
        }

        return redirect()->route('admin.river-basins.index');
    }

    public function edit(RiverBasin $riverBasin)
    {
        abort_if(Gate::denies('river_basin_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.riverBasins.edit', compact('riverBasin'));
    }

    public function update(UpdateRiverBasinRequest $request, RiverBasin $riverBasin)
    {
        $riverBasin->update($request->all());

        if ($request->input('photo', false)) {
            if (!$riverBasin->photo || $request->input('photo') !== $riverBasin->photo->file_name) {
                if ($riverBasin->photo) {
                    $riverBasin->photo->delete();
                }
                $riverBasin->addMedia(storage_path('tmp/uploads/' . basename($request->input('photo'))))->toMediaCollection('photo');
            }
        } elseif ($riverBasin->photo) {
            $riverBasin->photo->delete();
        }

        return redirect()->route('admin.river-basins.index');
    }

    public function show(RiverBasin $riverBasin)
    {
        abort_if(Gate::denies('river_basin_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.riverBasins.show', compact('riverBasin'));
    }

    public function destroy(RiverBasin $riverBasin)
    {
        abort_if(Gate::denies('river_basin_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $riverBasin->delete();

        return back();
    }

    public function massDestroy(MassDestroyRiverBasinRequest $request)
    {
        RiverBasin::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('river_basin_create') && Gate::denies('river_basin_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new RiverBasin();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
