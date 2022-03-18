<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GravatarCache
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $email = Auth::user()->email;
        $hash = md5(Str::of($email)->lower()->trim());
        $gravatar = "www.gravatar.com/avatar/" . $hash . ".png";
        $file = "public/avatars/" . $hash . ".png";

        $exists = Storage::exists($file);

        if ($exists) {
            $modified = Storage::lastModified($file);
            $now = time();
            if ($now - $modified < 3600) {
                return $next($request);
            }
        }

        $response = Http::get($gravatar);
        Storage::put($file, $response->body());

        return $next($request);
    }
}
