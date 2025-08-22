<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Routing\Controllers\HasMiddleware;
use App\Http\Middleware\backendAuthenticationMiddleware;

class ExpenseController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            backendAuthenticationMiddleware::class
        ];
    }

    public function expense(Request $request)
    {

        // $data  = array();
        // $data['active_menu'] = 'Profile';
        // $data['page_title'] = 'Profile';
        return view('backend.pages.expense', compact('data'));
    }
    public function expense_list(Request $request)
    {

        // $data  = array();
        // $data['active_menu'] = 'Profile';
        // $data['page_title'] = 'Profile';
        return view('backend.pages.expense_list', compact('data'));
    }
}
