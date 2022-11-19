<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyAlertRequest;
use App\Http\Requests\StoreAlertRequest;
use App\Http\Requests\UpdateAlertRequest;
use App\Models\Alert;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class AlertController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('alert_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $alerts = Alert::all();

        return view('admin.alerts.index', compact('alerts'));
    }

    public function create()
    {
        abort_if(Gate::denies('alert_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.alerts.create');
    }

    public function store(StoreAlertRequest $request)
    {
        $alert = Alert::create($request->all());
        $this->deactivateOthers($request, $alert);

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $alert->id]);
        }

        return redirect()->route('admin.alerts.index');
    }

    public function edit(Alert $alert)
    {
        abort_if(Gate::denies('alert_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.alerts.edit', compact('alert'));
    }

    public function update(UpdateAlertRequest $request, Alert $alert)
    {
        $alert->update($request->all());
        $this->deactivateOthers($request, $alert);

        return redirect()->route('admin.alerts.index');
    }

    public function show(Alert $alert)
    {
        abort_if(Gate::denies('alert_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.alerts.show', compact('alert'));
    }

    public function destroy(Alert $alert)
    {
        abort_if(Gate::denies('alert_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $alert->delete();

        return back();
    }

    public function massDestroy(MassDestroyAlertRequest $request)
    {
        Alert::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('alert_create') && Gate::denies('alert_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Alert();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }

    public function deactivateOthers($request, $alert){
        if($request->has('active') && $request->active){
            Alert::query()->whereNot('id', $alert->id)->update([
                'active' => 0
            ]);
        }
    }
}
