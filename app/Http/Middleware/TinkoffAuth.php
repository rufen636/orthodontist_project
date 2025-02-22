<?php

namespace App\Http\Middleware;

use Closure;

class TinkoffAuth
{
    public function handle($request, Closure $next)
    {
        $allowedIps = ['91.194.226.0/23', '91.194.226.181','91.218.132.0/24','91.218.133.0/24','91.218.134.0/24','91.218.135.0/24','212.49.24.0/24','212.233.80.0/24','212.233.81.0/24','212.233.82.0/24','212.233.83.0/24']; // IP Тинькофф
        if (!in_array($request->ip(), $allowedIps)) {
            return response('Forbidden', 403);
        }

        return $next($request);
    }
}

