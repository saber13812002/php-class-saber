<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class CheckToken
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
//        dd($token = $request->bearerToken());
        $token = $request->bearerToken();

        if(!$token){
            abort(403);
        }

        try {
            User::query()->where('token', $token)->firstOrFail();
        } catch (\Exception $e) {
//            return redirect('home');
//            return $e->getMessage();
            abort(403);

        }
        return $next($request);
    }
}
