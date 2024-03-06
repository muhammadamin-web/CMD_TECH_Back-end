<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Client_comment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class Client_commentController extends Controller
{
    public function index()
    {
        $client_comments = Client_comment::all();

        return view('admin.client_comments.index', compact('client_comments'));
    }

    public function create()
    {
        return view('admin.client_comments.create');
    }

    public function store(Request $request)
    {
        $locales = config('app.available_locales', ['ru', 'uz']);
        $rules = $this->buildValidationRules($locales);
        $validatedData = $request->validate($rules);

        $imageName = $this->handleImageUpload($request);
        $createData = $this->buildDataArray($validatedData, $locales, $imageName);

        Client_comment::create($createData);
        return redirect()->route('client_comments.index')->with('success', __('Проект создан.'));
    }

    public function show(Client_comment $client_comment)
    {
        return view('admin.client_comments.show', compact('client_comment'));
    }

    public function edit(Client_comment $client_comment)
    {
        return view('admin.client_comments.edit', compact('client_comment'));
    }

    public function update(Request $request, Client_comment $client_comment)
    {
        $locales = config('app.available_locales', ['ru', 'uz']);
        $rules = $this->buildValidationRules($locales);
        $validatedData = $request->validate($rules);

        $imageName = $this->handleImageUpload($request, $client_comment);
        $updateData = $this->buildDataArray($validatedData, $locales, $imageName);

        $client_comment->update($updateData);
        return redirect()->route('client_comments.index')->with('success', __('Проект обновлен.'));
    }


    private function buildValidationRules($locales)
    {
        $rules = ['image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'];
        foreach ($locales as $locale) {
            $rules["name_$locale"] = 'required|string|max:255';
            $rules["comment_$locale"] = 'nullable|string';
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
            $request->image_path->move(public_path('images/client_comments'), $imageName);
            return $imageName;
        }
        return $existingModel ? $existingModel->image_name : null;
    }

    private function deleteExistingImage($imageName)
    {
        $imagePath = public_path('images/client_comments/' . $imageName);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
    }

    private function buildDataArray($validatedData, $locales, $imageName)
    {
        $data = [];
        foreach ($locales as $locale) {
            $data["name_$locale"] = $validatedData["name_$locale"];
            $data["comment_$locale"] = $validatedData["comment_$locale"];
        }
        $data['image_path'] = $imageName ? 'images/client_comments/' . $imageName : null;
        $data['image_name'] = $imageName;
        return $data;
    }


    public function destroy(Client_comment $client_comment)
    {
        if ($client_comment->image_name) {
            unlink(public_path('images/client_comments/' . $client_comment->image_name));
        }
        $client_comment->delete();

        return redirect()->route('client_comments.index')
            ->with('success', __('Проект удален.'));
    }
}
