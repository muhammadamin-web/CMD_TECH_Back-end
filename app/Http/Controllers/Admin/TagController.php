<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

    // Yangi tag yaratish uchun create metodi
    public function create()
    {
        return view('admin.tags.create');
    }

    // Yangi tag saqlash uchun store metodi
    public function store(Request $request)
    {
        // Validation qoidalari, faqat 'name' maydoni kerak
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Tag::create($validatedData);
        return redirect()->route('tags.index')->with('success', __('Tag created successfully.'));
    }

    // Tag'ning batafsil ko'rish uchun show metodi
    public function show(Tag $tag)
    {
        return view('admin.tags.show', compact('tag'));
    }

    // Tag tahrirlash uchun edit metodi
    public function edit(Tag $tag)
    {
        return view('admin.tags.edit', compact('tag'));
    }

    // Tag'ni yangilash uchun update metodi
    public function update(Request $request, Tag $tag)
    {
        // Validation qoidalari, faqat 'name' maydoni kerak
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $tag->update($validatedData);
        return redirect()->route('tags.index')->with('success', __('Tag updated successfully.'));
    }

    // Tag'ni o'chirish uchun destroy metodi
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tags.index')->with('success', __('Tag deleted successfully.'));
    }
}
