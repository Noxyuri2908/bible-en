<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VersionsController extends Controller
{
    public function versions()
    {
        $title = 'Update full and free English bible versions';
        $description = 'Update full and free English bible versions';
        $data = [
            'title' => $title, 
            'description' => $description,
        ];

        return view('Frontend.Contents.versions', $data);
    }
}
