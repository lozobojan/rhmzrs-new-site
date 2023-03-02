<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PublicWebsiteController extends Controller
{
    public function displayPage(string $slug){
        $replacers = [
            'x-meteo-stations' => view('components.meteo-stations')->toHtml(),
        ];

        if ($slug == "pracenje-bolesti"){
            // Redirect to http://carpo.farm/ in new tab
            return redirect()->away('http://carpo.farm/');

        }

        $page = Page::query()
            ->where('slug', $slug)
            ->with(['pagePosts' => function ($query) {
                $query->orderBy('created_at', 'desc');
            }])
            ->firstOrFail();

        $text = $page->html_content;
        foreach ($replacers as $key => $value) {
            $text = str_replace('{'.$key.'}', $value, $text);
        }

        $page->html_content = $text;
        return view('pages.dynamic-page', [
            'page' => $page,
            'text' => $text,
            'slug' => $slug
        ]);
    }

    public function hidrologijaPage(){

    }
}
