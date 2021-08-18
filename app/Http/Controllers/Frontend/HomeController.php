<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
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

class HomeController extends Controller
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

    public function index()
    {
        $values = Cookie::get();
        // dd($values);
        $histories = array();
        foreach ($values as $key=>$value) {
            if ($key != "XSRF-TOKEN" && $key != "laravel_session") {
                if ($key > 1) {
                    $id = (int)$value;
                    $recent = $this->chapterModel->find($id);
                    if ($recent != null) {
                       array_push($histories,$recent);
                    }   
                } else {
                    $id = (int)$value;
                    if ($id > 0 ) {
                        $planRef = $this->planRefModel->find($id);
                        if ($planRef != null) {
                           array_push($histories,$planRef);
                        }
                    }  
                }     
            }     
        }

        // dd(array_reverse($histories, true));
        $title = 'Read full and free bible versions ';
        $description = 'Website updates quickly and provide free and full contents on Website and app';
        $data = [
            'title' => $title, 
            'description' => $description,
            'histories' => array_reverse($histories, true),
        ];

        return view('Frontend.Contents.home', $data);
    }

    public function search(Request $request)
    {
        if ($request->book) 
        {
            $books = $this->bookModel
                         ->where('version_id', 70)
                         ->where('name', 'LIKE', $request->book.'%')
                         ->take(10)
                         ->get();
            $data = array();
            
            foreach ($books as $key => $value) {
                $search = array();
                $chapter= $value->chapters->first();
                $search['bookName'] = $value->name;
                $search['bookSlug'] = $value->slug;
                $search['chapterSlug'] = $chapter->slug;
                array_push($data,$search);
            }

            return $data;
        }
    }    
}
