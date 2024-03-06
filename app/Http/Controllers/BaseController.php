<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Crud_one;
use App\Models\Tour;
use App\Models\Client_comment;

class BaseController extends Controller
{
    protected function getFooterData()
    {
        return [
            'tours_footer' => Tour::latest()->take(3)->get(),
            'client_comments_footer' => Client_comment::latest()->take(3)->get(),
            'categories_footer' => Category::latest()->take(3)->get(),
            'crud_ones_footer' => Crud_one::latest()->take(3)->get(),
        ];
    }
}
