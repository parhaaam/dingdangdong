<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class BotInputValidate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->has("update_id")) {
            return response("bad request", 403);
        }
        if (!$request->has("my_chat_member") && !$request->has("message")) {
            return response("bad request", 403);
        }
        return $next($request);
    }
}
