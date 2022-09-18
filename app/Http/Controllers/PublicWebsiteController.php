<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PublicWebsiteController extends Controller
{
    public function displayPage(string $slug){
        return view('pages.dynamic-page', [
            'page' => Page::query()->where('slug', $slug)->firstOrFail()
        ]);
    }

    public function hidrologijaPage(){

    }
}
