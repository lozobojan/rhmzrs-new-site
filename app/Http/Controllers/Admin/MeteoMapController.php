<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyMeteoMapRequest;
use App\Http\Requests\StoreMeteoMapRequest;
use App\Http\Requests\UpdateMeteoMapRequest;
use App\Models\MeteoMap;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class MeteoMapController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('meteo_map_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $meteoMaps = MeteoMap::all();

        return view('admin.meteoMaps.index', compact('meteoMaps'));
    }

    public function create()
    {
        abort_if(Gate::denies('meteo_map_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.meteoMaps.create');
    }

    public function store(StoreMeteoMapRequest $request)
    {
        $meteoMap = MeteoMap::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $meteoMap->id]);
        }

        return redirect()->route('admin.meteo-maps.index');
    }

    public function edit(MeteoMap $meteoMap)
    {
        abort_if(Gate::denies('meteo_map_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.meteoMaps.edit', compact('meteoMap'));
    }

    public function update(UpdateMeteoMapRequest $request, MeteoMap $meteoMap)
    {
        $meteoMap->update($request->all());

        return redirect()->route('admin.meteo-maps.index');
    }

    public function show(MeteoMap $meteoMap)
    {
        abort_if(Gate::denies('meteo_map_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.meteoMaps.show', compact('meteoMap'));
    }

    public function destroy(MeteoMap $meteoMap)
    {
        abort_if(Gate::denies('meteo_map_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $meteoMap->delete();

        return back();
    }

    public function massDestroy(MassDestroyMeteoMapRequest $request)
    {
        MeteoMap::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('meteo_map_create') && Gate::denies('meteo_map_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new MeteoMap();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
