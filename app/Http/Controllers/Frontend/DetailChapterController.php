<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;
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

class DetailChapterController extends Controller
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

    public function detailChapter($bookSlug, $chapterSlug)
    {
        $book = $this->bookModel
                     ->where('slug', $bookSlug)
                     ->first();
        $versions = $this->versionModel
                         ->where('language_id', $book->version->language_id)
                         ->get()->keyBy('id'); 
        $version = $versions[$book->version_id];
      	$books = $this->bookModel
            		  ->where('version_id', $version->id)
            		  ->get();
        $chapters = $this->chapterModel
                         ->where('book_id', $book->id)
                         ->get()
                         ->keyBy('slug');
        $offset = array_search($chapterSlug, array_keys($chapters->toArray()));
        $chapter = $chapters[$chapterSlug];
        $title = 'Read '.$book->name;
        $description = 'Read'.$book->name.'with full and exact contents';
        $cookie = cookie($book->id, $chapter->id, time() + (1 * 365 * 24 * 60 * 60));

        if ($chapter->id == $chapters->min('id')) {
            $previous = $chapter;
        } else {
            $previous = $chapters->where('id', '<', $chapter->id)->max();
        }

        if ($chapter->id == $chapters->max('id')) {
            $next = $chapter;
        } else {
            $next = $chapters->where('id', '>', $chapter->id)->min();
        }
      	$contents = json_decode($chapter->content);
        // dd($contents);
      	$data = [
            'versions' => $versions, 
            'previous' => $previous, 
            'next' => $next, 
            'version' => $version, 
            'books' => $books, 
            'book' => $book, 
            'offset' => $offset, 
            'chapters' => $chapters, 
            'chapter' => $chapter, 
            'contents' => $contents, 
            'title' => $title, 
            'description' => $description,
        ];
      	
        // return view('Frontend.Contents.detailChapter', $data);
        // return view('Frontend.Contents.testChapter', $data);
        return response()
            ->view('Frontend.Contents.detail-chapter-2', $data)->withCookie($cookie);
    }    
}
