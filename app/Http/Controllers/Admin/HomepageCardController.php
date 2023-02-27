<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyAlertRequest;
use App\Http\Requests\StoreHomepageCardRequest;
use App\Http\Requests\UpdateHomepageCardRequest;
use App\Models\Alert;
use App\Models\HomepageCard;
use Illuminate\Support\Facades\Gate;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class HomepageCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        abort_if(Gate::denies('homepage_cards_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $homepageCards = HomepageCard::all();

        return view('admin.homepage-cards.index', compact('homepageCards'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        abort_if(Gate::denies('homepage_cards_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.homepage-cards.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHomepageCardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHomepageCardRequest $request)
    {
        $alert = HomepageCard::create($request->all());
        return redirect()->route('admin.homepage-cards.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomepageCard  $homepageCard
     * @return \Illuminate\Http\Response
     */
    public function show(HomepageCard $homepageCard)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomepageCard  $homepageCard
     * @return \Illuminate\Http\Response
     */
    public function edit(HomepageCard $homepageCard)
    {
        abort_if(Gate::denies('homepage_cards_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.homepage-cards.edit', compact('homepageCard'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHomepageCardRequest  $request
     * @param  \App\Models\HomepageCard  $homepageCard
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHomepageCardRequest $request, HomepageCard $homepageCard)
    {
        $homepageCard->update($request->all());

        return redirect()->route('admin.homepage-cards.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomepageCard  $homepageCard
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomepageCard $homepageCard)
    {
        abort_if(Gate::denies('homepage_cards_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $homepageCard->delete();

        return back();
    }

    public function massDestroy(MassDestroyAlertRequest $request)
    {
        HomepageCard::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
