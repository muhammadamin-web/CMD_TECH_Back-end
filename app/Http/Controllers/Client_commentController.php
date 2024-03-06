<?php

namespace App\Http\Controllers;

use App\Models\Client_comment;

class Client_commentController extends BaseController
{
    public function index()
    {
        $client_comments = Client_comment::all();
        return view('client_comments.index', array_merge(compact('client_comments'), $this->getFooterData()));
    }

    public function show($locale, $slug)
    {
        $client_comment = Client_comment::where('slug_' . $locale, $slug)->first();
        return view('client_comments.show', array_merge(compact('client_comment'), $this->getFooterData()));
    }
}

