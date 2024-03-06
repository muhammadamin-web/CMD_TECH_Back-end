<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Crud_two;
use Illuminate\Http\Request;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Crud_twoController extends Controller
{
    public function index()
    {
        $modelName = config('app.crud_two_model');
        $model = app("App\\Models\\" . $modelName);
        $crud_twos = $model::all();
    
        return view('admin.crud_twos.index', compact('crud_twos'));
    }

    public function create()
    {
        $tags = Tag::all();

        return view('admin.crud_twos.create', compact('tags'));
    }

    public function store(Request $request)
    {
        $locales = config('app.available_locales', ['ru', 'uz']);
        $rules = $this->buildValidationRules($locales);
        $validatedData = $request->validate($rules);

        $imageName = $this->handleImageUpload($request);
        $createData = $this->buildDataArray($validatedData, $locales, $imageName);

        Crud_two::create($createData);
        return redirect()->route(config('app.crud_two_admin') . '.index')->with('success', 'Design created successfully.');
    }

    public function show($id)
    {
        $tags = Tag::all();

        $modelName = config('app.crud_two_model');
        $crud_two = app("App\\Models\\" . $modelName)::findOrFail($id);
        return view('admin.crud_twos.show', compact('crud_two','tags'));
    }

    public function edit($id)
    {
        $tags = Tag::all();

        $modelName = config('app.crud_two_model');
        $crud_two = app('App\\Models\\' . $modelName)::findOrFail($id);
        return view('admin.crud_twos.edit', compact('crud_two','tags'));
    }

    public function update(Request $request, Crud_two $crud_two)
    {
        $locales = config('app.available_locales', ['ru', 'uz']);
        $rules = $this->buildValidationRules($locales);
        $validatedData = $request->validate($rules);

        $imageName = $this->handleImageUpload($request, $crud_two);
        $updateData = $this->buildDataArray($validatedData, $locales, $imageName);

        $crud_two->update($updateData);
        return redirect()->route(config('app.crud_two_admin') . '.index')->with('success', 'Item updated successfully.');
    }

    public function destroy($id)
    {
        $modelName = config('app.crud_two_model');
        $crud_two = app("App\\Models\\" . $modelName)::findOrFail($id);
    
        if ($crud_two->image_name) {
            $imagePath = public_path('images/crud_twos/' . $crud_two->image_name);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    
        $crud_two->delete();
        return redirect()->route(config('app.crud_two_admin') . '.index')->with('success', 'Design deleted successfully.');
    }

     private function buildValidationRules($locales)
    {
        $rules = [
            
            'status' => 'required|in:published,draft',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tag_ids' => 'required|array|min:1',
            'tag_ids.*' => 'exists:tags,id'
        ];

        foreach ($locales as $locale) {
            $rules["name_{$locale}"] = 'required|string|max:255';
            $rules["description_{$locale}"] = 'required|string';
            $rules["meta_description_{$locale}"] = 'nullable|string';
            $rules["keyword_{$locale}"] = 'nullable|string';
        }

        return $rules;
    }


    private function handleImageUpload($request, $existingModel = null)
    {
        if ($request->hasFile('image_path')) {
            if ($existingModel && $existingModel->image_name) {
                $this->deleteExistingImage($existingModel->image_name);
            }
            $imageName = time() . '.' . $request->image_path->extension();
            $request->image_path->move(public_path('images/crud_twos'), $imageName);
            return $imageName;
        }
        return $existingModel ? $existingModel->image_name : null;
    }


    private function deleteExistingImage($imageName)
    {
        $imagePath = public_path('images/crud_twos/' . $imageName);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    private function buildDataArray($validatedData, $locales, $imageName)
    {
        $data = [
            'status' => $validatedData['status'],
            'tag_ids' => $validatedData['tag_ids'],
            // 'tag_ids' => $tag_ids,

        ];

        foreach ($locales as $locale) {
            $data["name_{$locale}"] = $validatedData["name_{$locale}"];
            $data["description_{$locale}"] = $validatedData["description_{$locale}"];
            $data["slug_{$locale}"] = Str::slug($validatedData["name_{$locale}"]);
            $data["meta_description_{$locale}"] = $validatedData["meta_description_{$locale}"] ?? null;
            $data["keyword_{$locale}"] = $validatedData["keyword_{$locale}"] ?? null;
        }

        // if (isset($validatedData['tag_ids'])) {
        //     $data['tag_ids'] = json_encode($validatedData['tag_ids']);
        // }
        $data['image_path'] = $imageName ? 'images/crud_twos/' . $imageName : null;
        $data['image_name'] = $imageName;
        return $data;
    }

}
