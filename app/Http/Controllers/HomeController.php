<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Client_comment;
use App\Models\Crud_one;
use App\Models\Tour;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    public function index(Request $request)
    {
        $client_comments = Client_comment::latest()->take(3)->get();
        $categories = Category::latest()->take(3)->get(); 
        $crud_one = Crud_one::latest()->take(4)->get(); 
        $tours = Tour::latest()->take(6)->get();
        return view('home', array_merge(compact('client_comments', 'categories', 'tours', 'crud_one'), $this->getFooterData()));
    }

    public function show(Request $request, Client_comment $client_comment)
    {
        return view('client_comments.show', array_merge(compact('client_comment'), $this->getFooterData()));
    }
}
