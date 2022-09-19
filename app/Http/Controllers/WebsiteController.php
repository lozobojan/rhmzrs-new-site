<?php

namespace App\Http\Controllers;

use App\Models\PublicCompetition;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    // A function to return public competitions paginated by 10
    public function publicCompetitions()
    {
        $publicCompetitions = PublicCompetition::paginate(10);
        return view('pages.public-competitions', compact('publicCompetitions'));
    }
}
