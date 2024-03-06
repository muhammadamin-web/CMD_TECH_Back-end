<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product; // Mahsulot modeli (yoki boshqa kerakli model)

class CkeditorController extends Controller
{
    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName.'_'.time().'.'.$extension;
            
            $request->file('upload')->move(public_path('images/cseditor'), $fileName);

            $url = asset('images/cseditor/'.$fileName); 

            return response()->json([
                'uploaded' => 1,
                'fileName' => $fileName,
                'url' => $url,
            ]);
        }
    }

    // Mahsulotni o'chirish
    public function destroyProduct(Product $product)
    {
        // CKEditor orqali yuklangan rasmlarni o'chirish
        $locales = config('app.available_locales', ['ru', 'uz', 'en']);
        foreach ($locales as $locale) {
            $descriptionField = 'description_' . $locale;
            if (isset($product->$descriptionField)) {
                $this->deleteCkeditorImages($product->$descriptionField);
            }
        }

        // Mahsulotni o'chirish
        $product->delete();

        // ... keyingi qadamlar ...
    }

    // CKEditor orqali yuklangan rasmlarni o'chirish
    private function deleteCkeditorImages($htmlContent)
    {
        preg_match_all('/<img[^>]+src="([^">]+)"/', $htmlContent, $matches);
        foreach ($matches[1] as $imageUrl) {
            $imagePath = public_path(parse_url($imageUrl, PHP_URL_PATH));
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }
    }
}
