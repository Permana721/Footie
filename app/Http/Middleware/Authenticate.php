<?php

namespace App\Http\Middleware;

use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson() && !Auth::check()) {
            return route('home');
        }
    }

}
