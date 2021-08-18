<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InfomationController extends Controller
{

    public function infomation()
    {
        $title = 'What is the bible?';
        $description = 'The basic information about the definition and origin of the bible';
        $data = [
            'title' => $title, 
            'description' => $description,
        ];

        return view('Frontend.Contents.infomation', $data);
    }

}
