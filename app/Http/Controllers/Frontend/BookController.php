<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\language;
use App\Models\version;
use App\Models\book;
use App\Models\chapter;
use App\Models\plan;
use App\Models\planRef;
use Carbon\Carbon;
use DateTime;
use Str;
use File;

class BookController extends Controller
{
	protected $languageModel;
	protected $versionModel;
	protected $bookModel;
	protected $chapterModel;
	protected $planModel;
	protected $planRefModel;

    public function __construct(language $languageModel, version $versionModel, book $bookModel, chapter $chapterModel, plan $planModel, planRef $planRefModel)
    {
        $this->languageModel = $languageModel;
        $this->versionModel = $versionModel;
        $this->bookModel = $bookModel;
        $this->planModel = $planModel;
        $this->planRefModel = $planRefModel;
        $this->chapterModel = $chapterModel;
    }

    public function getBooks($verSlug)
    {
        $version = $this->versionModel
                        ->where('slug', $verSlug)
                        ->first();
        $books = $this->bookModel
                      ->where('version_id', $version->id)
                      ->get();
        $title = 'Including full chapters of '.$version->name;
        $description = 'Website includes full and exact chapters of'.$version->name;
        // dd($books->first()->chapters->first()->slug);
        $data = [
            'books' => $books,
            'version' => $version,
            'title' => $title, 
            'description' => $description,
        ];

        // return view('Frontend.Contents.book', $data);
        return view('Frontend.Contents.book-2', $data);
    }  
}
