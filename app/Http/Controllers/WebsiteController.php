<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Models\Alert;
use App\Models\DocumentAndRegulation;
use App\Models\HomepageCard;
use App\Models\Page;
use App\Models\Post;
use App\Models\PublicCompetition;
use App\Models\PublicPurchase;
use App\Models\Questionnaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
        $page = Page::where('slug', 'kontakt')->first();

        // Obfuscate email addresses in the content
        $page->html_content = $this->obfuscateEmails($page->html_content);

        return view('pages.contact', compact('page'));
    }

    private function obfuscateEmails($content)
    {
        // Regular expression to match mailto links with email addresses
        $emailRegex = '/<a\s+href="mailto:([a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})">(.*?)<\/a>/';

        // Use a callback function to replace mailto links with Base64 encoded emails
        return preg_replace_callback($emailRegex, function ($matches) {
            $email = $matches[1];  // The email found in the href attribute
            $encodedEmail = base64_encode($email);  // Encode the email in Base64

            // Return the obfuscated version of the mailto link
            // Kliknite da otkrijete napisi na cirlici taj tekst

            return '<a href="#" data-email="' . $encodedEmail . '" class="obfuscated-email">[Емаил сакривен - Кликните да откријете]</a>';
        }, $content);
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
        $posts = Post::latest()->take(6)->whereIn('page_id', [14,23,24])->get();
        // Get 3 latest homepage cards
        $homepageCards = HomepageCard::all();
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
        $page = Page::where('slug', 'izvjestaji')->first();

        // Grupisanje priloga na osnovu 'description', gde se sve što nije M, D, ili G svrstava u 'Other'
        $groupedAttachments = $page->attachments->groupBy(function ($item, $key) {
            $description = strtoupper($item->custom_properties['description'] ?? '');
            return in_array($description, ['M', 'D', 'G']) ? $description : 'Other';
        });

        return view('pages.air-quality', compact('page', 'groupedAttachments'));
    }


    public function allProjects(Request $request)
    {
        $projects = Post::query()->where('type', 'project')
            ->when($request->has('term'), fn($q) => $q->where('title', 'like', '%'.$request->term.'%'))
            ->orderByDesc('created_at')
            ->paginate(10);
        return view('pages.all-projects', compact('projects'));
    }
    public function allActivities(Request $request)
    {
        $activities = Post::query()->where('type', 'post')
            ->when($request->has('term'), fn($q) => $q->where('title', 'like', '%'.$request->term.'%'))
            ->orderByDesc('created_at')
            ->paginate(10);
        return view('pages.all-activities', compact('activities'));
    }

    public function sendEmail(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $data = $request->only(['name', 'email', 'subject', 'message']);

        Mail::to('mare.sampbn@gmail.com')->send(new ContactFormMail($data));

        return back()->with('success', 'Vaša poruka je poslata.');
    }


}
