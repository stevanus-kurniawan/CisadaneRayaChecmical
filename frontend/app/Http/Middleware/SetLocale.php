<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    protected array $supported = ['en', 'id'];

    /**
     * Handle an incoming request. Set app locale from session, cookie, or Accept-Language.
     * Admin routes keep default (en); public routes use user preference.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Admin: keep default locale (no translation)
        if ($request->is('admin') || $request->is('admin/*')) {
            App::setLocale(config('app.locale'));
            return $next($request);
        }

        $locale = $this->resolveLocale($request);
        if (in_array($locale, $this->supported, true)) {
            App::setLocale($locale);
            $request->session()->put('locale', $locale);
        }

        return $next($request);
    }

    protected function resolveLocale(Request $request): string
    {
        // Session (set by GET /locale/{locale} or previous visit)
        $session = $request->session()->get('locale');
        if (in_array($session, $this->supported, true)) {
            return $session;
        }

        // Cookie (optional persistence)
        $cookie = $request->cookie('locale');
        if (in_array($cookie, $this->supported, true)) {
            return $cookie;
        }

        // Browser preference (optional)
        $preferred = $request->getPreferredLanguage($this->supported);
        if ($preferred) {
            return $preferred;
        }

        return config('app.locale');
    }
}
