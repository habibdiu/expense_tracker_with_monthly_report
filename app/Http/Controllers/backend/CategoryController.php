<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\HasMiddleware;
use App\Http\Middleware\backendAuthenticationMiddleware;

class CategoryController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            backendAuthenticationMiddleware::class
        ];
    }


    public function category(Request $request)
    {

        // $data  = array();
        // $data['active_menu'] = 'Profile';
        // $data['page_title'] = 'Profile';
        return view('backend.pages.category', compact('data'));
    }
}
