<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyWindRequest;
use App\Http\Requests\StoreWindRequest;
use App\Http\Requests\UpdateWindRequest;
use App\Models\Wind;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class WindController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('wind_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $winds = Wind::all();

        return view('admin.winds.index', compact('winds'));
    }

    public function create()
    {
        abort_if(Gate::denies('wind_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.winds.create');
    }

    public function store(StoreWindRequest $request)
    {
        $wind = Wind::create($request->all());

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $wind->id]);
        }

        return redirect()->route('admin.winds.index');
    }

    public function edit(Wind $wind)
    {
        abort_if(Gate::denies('wind_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.winds.edit', compact('wind'));
    }

    public function update(UpdateWindRequest $request, Wind $wind)
    {
        $wind->update($request->all());

        return redirect()->route('admin.winds.index');
    }

    public function show(Wind $wind)
    {
        abort_if(Gate::denies('wind_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.winds.show', compact('wind'));
    }

    public function destroy(Wind $wind)
    {
        abort_if(Gate::denies('wind_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $wind->delete();

        return back();
    }

    public function massDestroy(MassDestroyWindRequest $request)
    {
        Wind::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('wind_create') && Gate::denies('wind_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Wind();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
