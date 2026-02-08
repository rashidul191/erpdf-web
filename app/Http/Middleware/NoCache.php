<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class NoCache
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        $response->headers->add(['Cache-control' => 'no-store']);
        return $response;
    }
}
