<?php

namespace App\Http\Middleware;

use App\Events\OrderShipped;
use Closure;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;
use Ramsey\Collection\Collection;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        event(new OrderShipped("嘿嘿嘿".time()));
//        dd(\cache()->store('redis')->get('message'));
        return $next($request);
    }

    public function terminate($request, $response)
    {
    }
}
