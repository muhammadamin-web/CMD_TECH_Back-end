<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tour;
use Illuminate\Support\Facades\Log;

class CategoryController extends BaseController
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', array_merge(compact('categories'), $this->getFooterData()));
    }

    public function show($locale, $slug)
    {
        $category = Category::where('slug_' . $locale, $slug)->first();

        if (!$category) {
            Log::error('Category not found with slug: ' . $slug);
            abort(404);
        }

        $tours = Tour::where('category_id', $category->id)->get();

        return view('categories.show', array_merge(compact('category', 'tours'), $this->getFooterData()));
    }
}
