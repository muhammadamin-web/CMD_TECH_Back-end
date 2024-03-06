<?php

namespace App\Http\Controllers;

class StaticPagesController extends BaseController
{
    public function lyustra_v_tashkente()
    {
        return view('lyustra_v_tashkente', $this->getFooterData());
    }

    public function about()
    {
        return view('about', $this->getFooterData());
    }
}
