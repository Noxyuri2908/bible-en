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

class DetailPlanController extends Controller
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

    public function detailPlan($type, $ver, $month, $day, $year)
    {
        $now = Carbon::now();
        $previous = Carbon::createFromDate($now->year, $month, $day)->subDay(1);
        $next = Carbon::createFromDate($now->year, $month, $day)->subDay(-1);
        $nextDay = $next->day;
        $nextMonth = $next->month;
        $previousDay = $previous->day;
        $previousMonth = $previous->month;
        $versions = $this->versionModel
                         ->where('language_id', 15)
                         ->get();
        $plan = $this->planModel
                     ->where('slug', $type)
                     ->first();
        $version = $this->versionModel
                        ->where('shortName', $ver)
                        ->first();
        $content = $this->planRefModel
                        ->where('plan_id', $plan->id)
                        ->where('version_id', $version->id)
                        ->where('day', $day)
                        ->where('month', $month)
                        ->first();
        // dd($content);
        $contentsArr = array();
        
        if($content != null) {
            $cookie = cookie($plan->slug, $content->id, time() + (1 * 365 * 24 * 60 * 60));
        } else {
            $cookie = "unavailable value";
        }
        
        if ($content  != null && $content->content != null && $content->content != "null") 
        {
            $contents = json_decode($content->content, true);
            // dd(count($contents[0]));
            foreach ($contents as $key => $value) 
            {
                $contentArr = array();
                $book = $this->bookModel
                             ->where('id', $value[0])
                             ->first();
                $chapters = $this->chapterModel
                                 ->where('book_id', $value[0])
                                 ->get();

                if (count($contents[0]) == 3) {
                    $range = explode('-', $value[1]);
                    $sentencesArr = explode('-', $value[2]);
                    if (count($range) == 2) 
                    {
                        $chapterNbs = range( $range[0], $range[1] );
                        foreach ($chapterNbs as $chapterNb) 
                        {
                            $contentArr['chapterName'] = $chapters[$chapterNb-1]->name;
                            $contentArr['chapterContent'] = json_decode($chapters[$chapterNb-1]->content);
                            array_push($contentsArr, $contentArr);
                        }
                    } else {
                        $contentArr['chapterName'] = $chapters[$value[1]-1]->name;
                        $contentChapterArr = json_decode($chapters[$value[1]-1]->content);
                        // dd(json_decode($chapters[$value[1]-1]->content));
                        if (count($sentencesArr) == 2) 
                        {
                            $partArr = array();
                            $sentenceNbs = range( $sentencesArr[0], $sentencesArr[1] );
                            // dd($sentenceNbs);
                            foreach ($sentenceNbs as $sentenceNb) 
                            {
                                array_push($partArr, $contentChapterArr[$sentenceNb-1]);
                            }
                            $contentArr['chapterContent'] = $partArr;
                            array_push($contentsArr, $contentArr);
                            // dd($partArr);
                        } else {
                            $contentArr['chapterName'] = $chapters[$value[1]-1]->name;
                            $contentArr['chapterContent'] = json_decode($chapters[$value[1]-1]->content);
                            array_push($contentsArr, $contentArr);
                            // dd($contentsArr);
                        }
                    }
                } else {
                    $range = explode('-', $value[1]);

                    if (count($range) == 2) 
                    {
                        $chapterNbs = range( $range[0], $range[1] );
                        foreach ($chapterNbs as $chapterNb) 
                        {
                            $contentArr['chapterName'] = $chapters[$chapterNb-1]->name;
                            $contentArr['chapterContent'] = json_decode($chapters[$chapterNb-1]->content);
                            array_push($contentsArr, $contentArr);
                        }
                    } else {
                        $contentArr['chapterName'] = $chapters[$value[1]-1]->name;
                        $contentArr['chapterContent'] = json_decode($chapters[$value[1]-1]->content);
                        array_push($contentsArr, $contentArr);
                    }
                }
            }
        }
        $title = 'Read the bible with daily plan - '.$plan->name;
        $description = 'Read the bible with daily plan - '.$plan->name.', which have a logical and full contents';
        $data = [
            'versions' => $versions, 
            'version' => $version, 
            'type' => $type, 
            'plan' => $plan,
            'ver' => $ver,  
            'year' => $year,  
            'day' => $day,  
            'month' => $month,  
            'content' => $content,  
            'contents' => $contentsArr, 
            'nextDay' => $nextDay, 
            'nextMonth' => $nextMonth, 
            'previousDay' => $previousDay, 
            'previousMonth' => $previousMonth,
            'title' => $title, 
            'description' => $description,
        ];

        // return view('Frontend.Contents.plan', $data);
        return response()
            ->view('Frontend.Contents.plan-2', $data)->withCookie($cookie);
    }   
}
