<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $locales = config('app.available_locales', ['ru', 'uz']);
        $rules = $this->buildValidationRules($locales);
        $validatedData = $request->validate($rules);
    
        $imageName = $this->handleImageUpload($request);
        $createData = $this->buildDataArray($validatedData, $locales, $imageName);
    
        Category::create($createData);
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }


    public function show(Category $category)
    {
        return view('admin.categories.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $locales = config('app.available_locales', ['ru', 'uz']);
        $rules = $this->buildValidationRules($locales);
        $validatedData = $request->validate($rules);
    
        $imageName = $this->handleImageUpload($request, $category);
        $updateData = $this->buildDataArray($validatedData, $locales, $imageName);
    
        $category->update($updateData);
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }
    
    private function buildValidationRules($locales)
    {
        $rules = ['image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'];
        foreach ($locales as $locale) {
            $rules["name_$locale"] = 'required|string|max:255';
            $rules["meta_description_$locale"] = 'nullable|string';
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
            $request->image_path->move(public_path('images/categories'), $imageName);
            return $imageName;
        }
        return $existingModel ? $existingModel->image_name : null;
    }
    
    private function deleteExistingImage($imageName)
    {
        $imagePath = public_path('images/categories/' . $imageName);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }
    
    private function buildDataArray($validatedData, $locales, $imageName)
    {
        $data = [];
        foreach ($locales as $locale) {
            $data["name_$locale"] = $validatedData["name_$locale"];
            $data["description_$locale"] = $validatedData["description_$locale"] ?? null;
            $data["slug_$locale"] = Str::slug($validatedData["name_$locale"]);
        }
        $data['image_path'] = $imageName ? 'images/categories/' . $imageName : null;
        $data['image_name'] = $imageName;
        return $data;
    }
    public function destroy(Category $category)
    {
        if ($category->image_name) {
            unlink(public_path('images/categories/' . $category->image_name));
        }
        $category->delete();

        return redirect()->route('categories.index')
            ->with('success', __('Категория удалена.'));
    }
}
