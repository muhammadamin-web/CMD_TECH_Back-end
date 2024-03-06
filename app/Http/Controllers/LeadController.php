<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class LeadController extends Controller
{
    public function store(Request $request)
    {
        // Ma'lumotlarni validatsiya qilish
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'description' => 'nullable|string',
            'status' => 'not_seen', // Boshlang'ich qiymatni belgilash

        ]);

        // Ma'lumotlarni saqlash
        $lead = Lead::create($validatedData);

        // Telegramga yuborish
        $this->sendToTelegram($lead);

        // Muvaffaqiyatli yuborilgan murojaat haqida sessiyada xabar saqlash
        session()->flash('leadSuccess', 'Murojaat muvaffaqiyatli yuborildi');

        // Agar AJAX so'rov orqali kelgan bo'lsa, JSON javob qaytarish
        if ($request->ajax()) {
            return response()->json(['message' => 'Murojaat muvaffaqiyatli yuborildi']);
        }
    
        // AJAX so'rovi bo'lmagan taqdirda
        return redirect()->route('home', app()->getLocale());
    }

    protected function sendToTelegram($lead)
    {
        $token = '6492762561:AAFim9IWFrIJNz0Kf2hh7f6FmfvaNjvFOZg'; // Bot tokeningizni shu yerga kiriting
        $chat_id = '-1002141727691'; // Chat ID'ingizni shu yerga kiriting
        $url = "https://api.telegram.org/bot{$token}/sendMessage";
        $message = "Ism: {$lead->name}\nTel: {$lead->phone}\nEmail: {$lead->email}\nTavsif: {$lead->description}";

        try {
            // Telegramga HTTP orqali so'rov yuborish
            $response = Http::post($url, [
                'chat_id' => $chat_id,
                'text' => $message
            ]);

            if ($response->successful()) {
                // Telegramga xabar muvaffaqiyatli yuborildi
                return true;
            } else {
                // Xabar yuborishda xatolik
                return false;
            }
        } catch (\Exception $e) {
            // Xabar yuborishda yuzaga kelgan istisno (exception)
            return false;
        }
    }
}
