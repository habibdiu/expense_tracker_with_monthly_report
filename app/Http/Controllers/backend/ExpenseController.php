<?php

namespace App\Http\Controllers\backend;
use PDOException;
use Carbon\Carbon;
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
        $categories = Category::all();

        $data = [
            'active_menu' => 'expense',
            'page_title'  => 'Add Expense',
            'categories'  => $categories,
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

    public function monthlyReport()
    {
        $expenses = Expense::with('category')
            ->whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->get();

       
        $grouped = $expenses->groupBy(fn($item) => $item->category->name ?? 'Others')
        ->map(fn($group) => $group->sum('amount'));

        $data = [
            'active_menu' => 'monthly_report',
            'page_title'  => 'Monthly Expenses Report',
            'categories' => $grouped->keys()->toArray(),
            'totals'     => $grouped->values()->toArray(),
            'expenses'   => $expenses,
        ];

        return view('backend.pages.monthly_report', compact('data'));
    }

}
