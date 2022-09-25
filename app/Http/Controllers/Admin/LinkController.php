<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyLinkRequest;
use App\Http\Requests\StoreLinkRequest;
use App\Http\Requests\UpdateLinkRequest;
use App\Models\Link;
use App\Models\Page;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LinkController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('link_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $links = Link::query()->whereNull('parent_id')->orderBy('created_at')->get();
        $pages = Page::get();

        return view('admin.links.index', compact('links', 'pages'));
    }

    public function create()
    {
        abort_if(Gate::denies('link_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pages = Page::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $parents = Link::pluck('slug', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.links.create', compact('pages', 'parents'));
    }

    public function store(StoreLinkRequest $request)
    {
        $link = Link::create($request->all());

        return redirect()->route('admin.links.index');
    }

    public function edit(Link $link)
    {
        abort_if(Gate::denies('link_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $pages = Page::pluck('title', 'id')->prepend(trans('global.pleaseSelect'), '');

        $parents = Link::pluck('slug', 'id')->prepend(trans('global.pleaseSelect'), '');

        $link->load('page', 'parent');

        return view('admin.links.edit', compact('link', 'pages', 'parents'));
    }

    public function update(UpdateLinkRequest $request, Link $link)
    {
        $link->update($request->all());

        return redirect()->route('admin.links.index');
    }

    public function show(Link $link)
    {
        abort_if(Gate::denies('link_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $link->load('page', 'parent', 'parentLinks');

        return view('admin.links.show', compact('link'));
    }

    public function destroy(Link $link)
    {
        abort_if(Gate::denies('link_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $link->delete();

        return back();
    }

    public function massDestroy(MassDestroyLinkRequest $request)
    {
        Link::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
