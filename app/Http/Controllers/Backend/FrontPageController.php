<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;

class FrontPageController extends Controller
{
    public function showDynamicPages($slug='')
    {
        dd($slug);
    }
}
