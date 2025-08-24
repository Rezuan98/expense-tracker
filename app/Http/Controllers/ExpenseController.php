<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class ExpenseController extends Controller
{
    public function index()
    {
        $expenses = Auth::user()->expenses()
                        ->with('category')
                        ->latest('date')
                        ->get();
        
        return view('expenses.index', compact('expenses'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('expenses.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'amount' => 'required|numeric|min:0',
            'date' => 'required|date',
            'category_id' => 'required|exists:categories,id'
        ]);

        Auth::user()->expenses()->create([
            'title' => $request->title,
            'amount' => $request->amount,
            'date' => $request->date,
            'category_id' => $request->category_id
        ]);

        return redirect()->route('expenses.index')
                        ->with('success', 'Expense added successfully!');
    }

    public function monthly()
    {
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;

        $monthlyExpenses = Auth::user()->expenses()
            ->whereMonth('date', $currentMonth)
            ->whereYear('date', $currentYear)
            ->with('category')
            ->get()
            ->groupBy('category.name')
            ->map(function ($expenses) {
                return $expenses->sum('amount');
            });

        $total = $monthlyExpenses->sum();

        return view('expenses.monthly', compact('monthlyExpenses', 'total'));
    }
}