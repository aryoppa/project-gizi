<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Visit;
use Illuminate\Support\Str;

class CountVisitor
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Skip admin, api, and asset requests
        if ($request->is('admin*') || $request->is('api*') || preg_match('/\.(js|css|map|png|jpg|jpeg|svg|ico|woff|woff2|ttf)$/i', $request->getRequestUri())) {
            return $next($request);
        }

        // Ensure session started so we have session id
        if (! $request->session()->isStarted()) {
            $request->session()->start();
        }

        $sessionId = $request->session()->getId() ?? Str::random(40);
        $path = '/'.$request->path(); // store leading slash for readability

        // Anti-duplication rule: only count once per session per path per day
        $today = now()->startOfDay();

        $already = Visit::where('path', $path)
            ->where('session_id', $sessionId)
            ->where('visited_at', '>=', $today)
            ->exists();

        if (! $already) {
            Visit::create([
                'path' => $path,
                'method' => $request->method(),
                'ip' => $request->ip(),
                'session_id' => $sessionId,
                'user_agent' => substr($request->userAgent() ?? '', 0, 1000),
                'visited_at' => now(),
            ]);
        }

        return $next($request);
    }
}
