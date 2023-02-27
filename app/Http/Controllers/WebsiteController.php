<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use App\Models\DocumentAndRegulation;
use App\Models\HomepageCard;
use App\Models\Page;
use App\Models\Post;
use App\Models\PublicCompetition;
use App\Models\PublicPurchase;
use App\Models\Questionnaire;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class WebsiteController extends Controller
{
    // A function to return public competitions paginated by 10
    public function publicCompetitions()
    {
        $publicCompetitions = PublicCompetition::paginate(10);
        return view('pages.public-competitions', compact('publicCompetitions'));
    }

    public function publicCompetition(PublicCompetition $publicCompetition)
    {
        return view('pages.public-competition', compact('publicCompetition'));
    }

    public function downloadMedia(Media $media)
    {
        $media->download_count = $media->download_count + 1;
        $media->save();
        return response()->download($media->getPath(), $media->file_name);
    }

    // A function to return public competitions paginated by 10
    public function publicPurchases()
    {
        $publicPurchases = PublicPurchase::paginate(10);
        return view('pages.public-purchases', compact('publicPurchases'));
    }

    public function publicPurchase(PublicPurchase $publicPurchase)
    {
        return view('pages.public-purchase', compact('publicPurchase'));
    }

    public function documents()
    {
        $documents = DocumentAndRegulation::paginate(10);
        return view('pages.document-and-regulations', compact('documents'));
    }

    public function document(DocumentAndRegulation $documentAndRegulation)
    {
        return view('pages.document-and-regulation', compact('documentAndRegulation'));
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function saveContact(Request $request)
    {
        return $request->all();
    }

    public function post(Post $post)
    {
        return view('pages.post', compact('post'));
    }

    public function alert(Alert $alert)
    {
        return view('pages.alert', compact('alert'));
    }

    // Routes for questionnaires
    public function questionnaires()
    {
        $questionnaires = Questionnaire::paginate(10);
        return view('pages.questionnaires', compact('questionnaires'));
    }

    public function questionnaire(Questionnaire $questionnaire)
    {
        return view('pages.questionnaire', compact('questionnaire'));
    }

    public function index(){
        // Get latest posts
        $posts = Post::latest()->take(6)->get();
        // Get 3 latest homepage cards
        $homepageCards = HomepageCard::latest()->take(3)->get();
        // Get latest 5 media with pdf, doc, docx, xls, xlsx and txt extensions
        $media = Media::query()->whereIn('mime_type', ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'text/plain'])->latest()->take(5)->get();
        $questionnaires = Questionnaire::latest()->take(25)->get();
        // return pages.welcome with posts
        return view('pages.welcome', compact('posts', 'questionnaires', 'media', 'homepageCards'));
    }

    public function generalJobs()
    {
        $publicCompetitions = PublicCompetition::paginate(10);
        $publicPurchases = PublicPurchase::paginate(10);
        $documents = DocumentAndRegulation::paginate(10);
        return view('pages.general-jobs', compact('publicCompetitions', 'publicPurchases', 'documents'));
    }
    public function airControl()
    {
        $page = Page::query()->where('slug', 'izvjestaji')->first();
        return view('pages.air-quality', compact('page'));
    }

}
