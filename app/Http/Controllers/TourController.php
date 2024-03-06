<?php

namespace App\Http\Controllers;

use App\Models\Tour;

class TourController extends BaseController
{
    public function index()
    {
        $tours = Tour::all();
        return view('tours.index', array_merge(compact('tours'), $this->getFooterData()));
    }

    public function show($locale, $slug)
    {
        // Til almashtirish funksiyasi kodlari
        $tour = Tour::where('slug_' . $locale, $slug)->first();
        return view('tours.show', array_merge(compact('tour'), $this->getFooterData()));
    }
}
