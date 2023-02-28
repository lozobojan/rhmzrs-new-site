<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyPageRequest;
use App\Http\Requests\StorePageRequest;
use App\Http\Requests\UpdatePageRequest;
use App\Models\Link;
use App\Models\Page;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PageController extends Controller
{
  use MediaUploadingTrait;

  public function index()
  {
    abort_if(Gate::denies('page_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    $pages = Page::all();

    return view('admin.pages.index', compact('pages'));
  }

  public function create()
  {
    abort_if(Gate::denies('page_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    return view('admin.pages.create');
  }

  public function store(StorePageRequest $request)
  {
    // TODO: Remove this
    $link = Link::query()->where('title', '=', $request->title)->first();
    if ($link) {
        $request['slug'] = $link->slug;
    }

    $page = Page::create($request->all());

    $link?->update(['page_id' => $page->id]);

    $descriptions = $request->descriptions;

    foreach ($request->input('attachments', []) as $key => $file) {
      if (!array_key_exists($key, $request->descriptions)) {
        $descriptions[$key] = '';
      }
      $description = $descriptions[$key];
      $page->addMedia(storage_path('tmp/uploads/' . basename($file)))
        ->withCustomProperties(['description' => $description])
        ->toMediaCollection('attachments');
    }

    return redirect()->route('admin.pages.index');
  }

  public function edit(Page $page)
  {
    abort_if(Gate::denies('page_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    return view('admin.pages.edit', compact('page'));
  }

  public function update(UpdatePageRequest $request, Page $page)
  {
    $page->update($request->all());

    if (count($page->attachments) > 0) {
      foreach ($page->attachments as $media) {
        if (!in_array($media->file_name, $request->input('attachments', []))) {
          $media->delete();
        }
      }
    }
    $media = $page->attachments->pluck('file_name')->toArray();
    $descriptions = $request->descriptions;
    foreach ($request->input('attachments', []) as $key => $file) {
      if (count($media) === 0 || !in_array($file, $media)) {
        if (!array_key_exists($key, $request->descriptions)) {
          $descriptions[$key] = '';
        }
        $description = $descriptions[$key];
        $page->addMedia(storage_path('tmp/uploads/' . basename($file)))
          ->withCustomProperties(['description' => $description])
          ->toMediaCollection('attachments');
      }
    }

    return redirect()->route('admin.pages.index');
  }

  public function show(Page $page)
  {
    abort_if(Gate::denies('page_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    $page->load('pagePublicPurchases', 'pagePublicCompetitions', 'pagePosts', 'pageLinks');

    return view('admin.pages.show', compact('page'));
  }

  public function destroy(Page $page)
  {
    abort_if(Gate::denies('page_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    $page->delete();

    return back();
  }

  public function massDestroy(MassDestroyPageRequest $request)
  {
    Page::whereIn('id', request('ids'))->delete();

    return response(null, Response::HTTP_NO_CONTENT);
  }

  public function storeCKEditorImages(Request $request)
  {
    abort_if(Gate::denies('post_create') && Gate::denies('post_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

    $model = new Page();
    $model->id = $request->input('crud_id', 0);
    $model->exists = true;
    $media = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

    return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
  }
}
