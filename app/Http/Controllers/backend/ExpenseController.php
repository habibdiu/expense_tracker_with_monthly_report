<?php

namespace App\Http\Controllers\backend;

use PDOException;
use App\Models\Expense;
use App\Models\Category;
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
        // Fetch all categories for the dropdown
        $categories = Category::all();

        $data = [
            'active_menu' => 'expense',
            'page_title'  => 'Add Expense',
            'categories'  => $categories, // <-- send to Blade
        ];

        if ($request->isMethod('post')) {
            try {
                Expense::create([
                    'title'       => $request->title,
                    'amount'      => $request->amount,
                    'category_id' => $request->category_id,
                ]);

                return redirect()->route('admin.expense')->with('success', 'Expense added successfully');
            } catch (PDOException $e) {
                return back()->with('error', 'Failed: ' . $e->getMessage());
            }
        }

        return view('backend.pages.add_expense', compact('data'));
    }


    public function expense_list()
    {
        $data = [
            'active_menu' => 'expense_list',
            'page_title'  => 'Expense List',
            'expenses'    => Expense::latest()->get(),
        ];

        return view('backend.pages.list_expense', compact('data'));
    }
}
