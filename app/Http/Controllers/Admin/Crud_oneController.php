<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Crud_one;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Crud_oneController extends Controller
{
    public function index()
    {
        $modelName = config('app.crud_one_model');
        $model = app("App\\Models\\" . $modelName);
        $crud_ones = $model::all();
    
        return view('admin.crud_ones.index', compact('crud_ones'));
    }

    public function create()
    {
        $tours = Tour::all();

        return view('admin.crud_ones.create', compact('tours'));
    }

    public function store(Request $request)
    {
        $locales = config('app.available_locales', ['ru', 'uz']);
        $rules = $this->buildValidationRules($locales);
        $validatedData = $request->validate($rules);

        $imageName = $this->handleImageUpload($request);
        $createData = $this->buildDataArray($validatedData, $locales, $imageName);

        Crud_one::create($createData);
        return redirect()->route(config('app.crud_one_admin') . '.index')->with('success', 'Design created successfully.');
    }

    public function show($id)
    {
        $tours = Tour::all();

        $modelName = config('app.crud_one_model');
        $crud_one = app("App\\Models\\" . $modelName)::findOrFail($id);
        return view('admin.crud_ones.show', compact('crud_one','tours'));
    }

    public function edit($id)
    {
        $tours = Tour::all();

        $modelName = config('app.crud_one_model');
        $crud_one = app('App\\Models\\' . $modelName)::findOrFail($id);
        return view('admin.crud_ones.edit', compact('crud_one','tours'));
    }

    public function update(Request $request, Crud_one $crud_one)
    {
        $locales = config('app.available_locales', ['ru', 'uz']);
        $rules = $this->buildValidationRules($locales);
        $validatedData = $request->validate($rules);

        $imageName = $this->handleImageUpload($request, $crud_one);
        $updateData = $this->buildDataArray($validatedData, $locales, $imageName);

        $crud_one->update($updateData);
        return redirect()->route(config('app.crud_one_admin') . '.index')->with('success', 'Item updated successfully.');
    }

    public function destroy($id)
    {
        $modelName = config('app.crud_one_model');
        $crud_one = app("App\\Models\\" . $modelName)::findOrFail($id);
    
        if ($crud_one->image_name) {
            $imagePath = public_path('images/crud_ones/' . $crud_one->image_name);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    
        $crud_one->delete();
        return redirect()->route(config('app.crud_one_admin') . '.index')->with('success', 'Design deleted successfully.');
    }

     private function buildValidationRules($locales)
    {
        $rules = [
            'site_url' => 'required|string',
            'site_name' => 'required|string|max:255',
            'status' => 'required|in:published,draft',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tour_ids' => 'required|array|min:1',
            'tour_ids.*' => 'exists:tours,id'
        ];

        foreach ($locales as $locale) {
            $rules["name_{$locale}"] = 'required|string|max:255';
            $rules["description_{$locale}"] = 'required|string';
            $rules["meta_description_{$locale}"] = 'nullable|string';
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
            $request->image_path->move(public_path('images/crud_ones'), $imageName);
            return $imageName;
        }
        return $existingModel ? $existingModel->image_name : null;
    }


    private function deleteExistingImage($imageName)
    {
        $imagePath = public_path('images/crud_ones/' . $imageName);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    private function buildDataArray($validatedData, $locales, $imageName)
    {
        $data = [
            'site_url' => $validatedData['site_url'],
            'site_name' => $validatedData['site_name'],
            'status' => $validatedData['status'],
            'tour_ids' => $validatedData['tour_ids'],
            // 'tour_ids' => $tour_ids,

        ];

        foreach ($locales as $locale) {
            $data["name_{$locale}"] = $validatedData["name_{$locale}"];
            $data["description_{$locale}"] = $validatedData["description_{$locale}"];
            $data["slug_{$locale}"] = Str::slug($validatedData["name_{$locale}"]);
            $data["meta_description_{$locale}"] = $validatedData["meta_description_{$locale}"] ?? null;
        }

        // if (isset($validatedData['tour_ids'])) {
        //     $data['tour_ids'] = json_encode($validatedData['tour_ids']);
        // }
        $data['image_path'] = $imageName ? 'images/crud_ones/' . $imageName : null;
        $data['image_name'] = $imageName;
        return $data;
    }

}
