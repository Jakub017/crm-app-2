<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureFakturowniaIntegrationIsSet
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        // Wykluczenie ścieżki, do której robisz redirect
        if($request->routeIs('fakturownia.create') || $request->routeIs('fakturownia.store') || $request->routeIs('integration.index')) {
            return $next($request);
        }

        if($user && $user->fakturownia_api_key === null && $user->fakturownia_login === null) {
            return redirect()->route('integration.index');
        }
        return $next($request);
    }
}
