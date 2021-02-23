<?php

namespace App\Http\Middleware;

use App\Events\OrderShipped;
use App\Jobs\MessageJob;
use App\Models\LogisticsLine;
use App\Models\User;
use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Gate;
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
        dd(chunk_split('2sadasdsad',1));
        dump(str_replace('a', 'b', "AAaa"));
        dd(str_ireplace('a','b','AAaa'));
        dd(str_replace('.','-',['sdads.dsds','dasdsad.aaaa']));
        return $next($request);
    }

    public function terminate($request, $response)
    {
    }
}
