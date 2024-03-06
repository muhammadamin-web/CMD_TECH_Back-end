<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Tour;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function filterByTags(Request $request)
    {
        $tags = $request->input('tags', []);

        $posts = Tour::whereHas('tags', function ($query) use ($tags) {
            $query->whereIn('tags.id', $tags);
        })->get();

        return view('tags.filtered_posts', compact('posts'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tags)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tag $tags)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tag $tags)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tags)
    {
        //
    }
}
