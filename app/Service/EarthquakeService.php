<?php

namespace App\Service;

use App\Models\Earthquake;
use App\Models\Page;
use App\Models\Post;
use Carbon\Carbon;

class EarthquakeService
{
    public function generateDraftPost(Earthquake $earthquake) :void
    {
        Post::query()->create([
            'html_content' => $this->getPostContent($earthquake),
            'title' => $this->getPostTitle($earthquake),
            'type' => 'post',
            'page_id' => Page::SEISMOLOGY_NEWS // seizmologija aktuelnosti
        ]);
    }

    public function getPostContent(Earthquake $earthquake):string{
        $dateFormatted = Carbon::parse($earthquake->earthquake_date)->format('d.m.Y');
        $timeFormatted = Carbon::parse($earthquake->earthquake_time)->format('H:i');
        return "<p align=\"JUSTIFY\">Дана, <b>{$dateFormatted}.године</b> мрежом сеизмолошких станица Републичког хидрометеоролошког завода РС лоциран је земљотрес <strong>у {$timeFormatted} </strong>по локалном времену, са магнитудом <strong>МL={$earthquake->magnitude} Рихтера</strong> и процијењеним интензитетом у епицентралној зони од <strong>{$earthquake->depth} Меркалијеве скале, </strong><strong>у региону {$earthquake->municipality}.</strong></p>
                <p align=\"JUSTIFY\">Земљотрес овог интензитета не може изазвати штете на објектима, а становништво га у епицентралној зони може осјетити.</p>";
    }

    public function getPostTitle(Earthquake $earthquake):string{
        return "Земљотрес у региону {$earthquake->municipality}";
    }
}
