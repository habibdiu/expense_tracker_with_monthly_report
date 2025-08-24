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
            'expenses'    => Expense::with('category')
                                ->orderBy('created_at', 'desc')
                                ->get()
                                ->groupBy(function ($expense) {
                                    return Carbon::parse($expense->created_at)->format('F Y');
                                }),
        ];

        return view('backend.pages.list_expense', compact('data'));
    }




    public function monthlyReport()
    {
        $expenses = Expense::with('category')->get();

        $groupedByCategory = $expenses->groupBy(fn($item) => $item->category->name ?? 'Others')
                                    ->map(fn($group) => $group->sum('amount'));

        $groupedByMonth = $expenses->groupBy(fn($item) => Carbon::parse($item->created_at)->format('F'))
                                    ->map(fn($group) => $group->sum('amount'));

        $data = [
            'active_menu'    => 'monthly_report',
            'page_title'     => 'Monthly Expenses Report',
            'categories'     => $groupedByCategory->keys()->toArray(),
            'totals'         => $groupedByCategory->values()->toArray(),
            'monthly_labels' => $groupedByMonth->keys()->toArray(),
            'monthly_totals' => $groupedByMonth->values()->toArray(),
            'expenses'       => $expenses,
        ];

        return view('backend.pages.monthly_report', compact('data'));
    }


}
