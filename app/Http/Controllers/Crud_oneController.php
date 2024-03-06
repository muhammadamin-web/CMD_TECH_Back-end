<?php

namespace App\Http\Controllers;

use App\Models\Crud_one;

class Crud_oneController extends BaseController
{
    public function index()
    {
        $crud_ones = Crud_one::all();
        return view('crud_ones.index', array_merge(compact('crud_ones'), $this->getFooterData()));
    }

    public function show($locale, $slug)
    {
        $crud_one = Crud_one::where('slug_' . $locale, $slug)->first();
        return view('crud_ones.show', array_merge(compact('crud_one'), $this->getFooterData()));
    }
}
