<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Locale
{
    public function handle(Request $request, Closure $next)
    {
        $locale = $request->segment(1);

        if (in_array($locale, config('app.available_locales'))) {
            app()->setLocale($locale);
        }
        else {
            app()->setLocale(config('app.fallback_locale')); // Fallback locale'ni o'rnatish
        }
        return $next($request);
    }
}
