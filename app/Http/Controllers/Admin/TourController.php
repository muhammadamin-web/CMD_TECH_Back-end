<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TourController extends Controller
{
    // Tourlarni ko'rish uchun index metodi
    public function index()
    {
        $tours = Tour::all();
        return view('admin.tours.index', compact('tours'));
    }

    // Yangi tour yaratish uchun create metodi
    public function create()
    {
        return view('admin.tours.create');
    }

    // Yangi tour saqlash uchun store metodi
    public function store(Request $request)
    {
        $locales = config('app.available_locales', ['ru', 'uz']);
        $rules = $this->buildValidationRules($locales);
        $validatedData = $request->validate($rules);

        $images = $this->handleMultipleImageUpload($request);
        $createData = $this->buildDataArray($validatedData, $locales, $images);

        Tour::create($createData);
        return redirect()->route('tours.index')->with('success', __('Tour created successfully.'));
    }

    // Tourning batafsil ko'rish uchun show metodi
    public function show(Tour $tour)
    {
        return view('admin.tours.show', compact('tour'));
    }

    // Tour tahrirlash uchun edit metodi
    public function edit(Tour $tour)
    {
        $categories = Category::all();
        return view('admin.tours.edit', compact('tour', 'categories'));
    }

    // Tourni yangilash uchun update metodi
    public function update(Request $request, Tour $tour)
    {
        $locales = config('app.available_locales', ['ru', 'uz']);
        $rules = $this->buildValidationRules($locales);
    
        // Agar rasmlar maydoni bo'sh bo'lsa, validatsiyadan o'tkazmang
           // 'images' maydoni uchun validatsiya qoidalari
           $rules['images'] = 'array';
           $rules['images.*'] = 'image|mimes:jpeg,png,jpg,gif|max:10240';
    
        $validatedData = $request->validate($rules);
    
        $images = $this->handleMultipleImageUpload($request, $tour);
        $updateData = $this->buildDataArray($validatedData, $locales, $images);
    
        $tour->update($updateData);
        return redirect()->route('tours.index')->with('success', __('Tour updated successfully.'));
    }

    // Tourni o'chirish uchun destroy metodi
    public function destroy(Tour $tour)
    {
        foreach (json_decode($tour->images) as $imagePath) {
            if (file_exists(public_path($imagePath))) {
                unlink(public_path($imagePath));
            }
        }

        $tour->delete();
        return redirect()->route('tours.index')->with('success', __('Tour deleted successfully.'));
    }

    // Rasmni yangilash uchun updateImage metodi
    public function updateImage(Request $request, Tour $tour, $imageKey)
    {
        $request->validate([
            
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
        ]);

        $images = json_decode($tour->images, true);

        if (isset($images[$imageKey])) {
            $imagePath = public_path($images[$imageKey]);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images/tours'), $imageName);

            $images[$imageKey] = '/images/tours/' . $imageName;
            $tour->images = json_encode($images);
            $tour->save();
        }

        return redirect()->route('tours.edit', $tour)->with('success', __('Image updated successfully.'));
    }

    // Rasmni o'chirish uchun deleteImage metodi
    public function deleteImage($tourId, $imageKey)
    {
        $tour = Tour::find($tourId);

        if (!$tour) {
            return response()->json(['status' => 'error', 'message' => 'Tour not found'], 404);
        }

        $images = json_decode($tour->images, true);

        if (isset($images[$imageKey])) {
            $imagePath = public_path($images[$imageKey]);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
            unset($images[$imageKey]);

            $tour->images = json_encode(array_values($images));
            $tour->save();

            return response()->json(['status' => 'success', 'message' => 'Image deleted successfully']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Image not found'], 404);
        }
    }


    private function buildValidationRules($locales)
    {
        $rules = [
            'images' => 'required|array|min:1',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:10240',
            'price' => 'nullable|numeric',
            'status' => 'required|in:published,draft',
        ];

        foreach ($locales as $locale) {
            $rules["name_{$locale}"] = 'required|string|max:255';
            $rules["short_name_{$locale}"] = 'required|string|max:255';
            $rules["description_{$locale}"] = 'required|string';
            $rules["meta_description_{$locale}"] = 'nullable|string';
            $rules["tags_{$locale}"] = 'nullable|string';
        }

        return $rules;
    }
    // ...boshqa yordamchi metodlar...
    private function handleMultipleImageUpload($request, $existingModel = null)
    {
        $images = $existingModel ? json_decode($existingModel->images, true) : [];

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $imageName = time() . '_' . $index . '.' . $image->extension();
                $image->move(public_path('images/tours'), $imageName);
                $images[] = 'images/tours/' . $imageName;
            }
        }

        return json_encode($images);
    }

    private function    buildDataArray($validatedData, $locales, $images)
    {
        $data = [
            'images' => $images,
            'price' => $validatedData['price'] ?? null,
            'status' => $validatedData['status'],
        ];

        foreach ($locales as $locale) {
            $data["name_{$locale}"] = $validatedData["name_{$locale}"];
            $data["short_name_{$locale}"] = $validatedData["short_name_{$locale}"];
            $data["description_{$locale}"] = $validatedData["description_{$locale}"];
            $data["tags_{$locale}"] = $validatedData["tags_{$locale}"] ?? null;
            $data["meta_description_{$locale}"] = $validatedData["meta_description_{$locale}"] ?? null;
            $data["slug_{$locale}"] = Str::slug($validatedData["name_{$locale}"]);
        }

        return $data;
    }
}
