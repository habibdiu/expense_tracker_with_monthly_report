<?php

namespace App\Http\Controllers\backend;

use PDOException;
use App\Models\Category;
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


    public function category()
    {
        $data = [
            'active_menu' => 'category',
            'page_title'  => 'Category Add',
            'categories'  => Category::get(),
        ];

        return view('backend.pages.category', compact('data'));
    }


    public function category_store_and_list(Request $request)
    {
        try {
            Category::create([
                'name' => $request->name,
            ]);
            return redirect()->route('admin.category')->with('success', 'Category created successfully');
        } catch (PDOException $e) {    
            return back()->with('error', 'Failed: ' . $e->getMessage());
        }
    }


}
