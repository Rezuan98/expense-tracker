@extends('layouts.app')

@section('title', 'Monthly Expenses Report')

@section('content')
<h1 class="text-2xl font-bold text-gray-900 mb-6">Monthly Expenses Report - {{ date('F Y') }}</h1>

@if($monthlyExpenses->count() > 0)
    <div class="space-y-4">
        @foreach($monthlyExpenses as $category => $amount)
            <div class="flex justify-between items-center border-b pb-2">
                <span class="text-lg font-medium">{{ $category }}:</span>
                <span class="text-lg font-bold">${{ number_format($amount, 2) }}</span>
            </div>
        @endforeach
        
        <div class="border-t-2 border-gray-300 pt-4 mt-4">
            <div class="flex justify-between items-center">
                <span class="text-xl font-bold">Total:</span>
                <span class="text-xl font-bold text-blue-600">${{ number_format($total, 2) }}</span>
            </div>
        </div>
    </div>
    
    <div class="mt-6">
        <a href="{{ route('expenses.index') }}" 
           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            View All Expenses
        </a>
        <a href="{{ route('expenses.create') }}" 
           class="ml-2 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            Add New Expense
        </a>
    </div>
@else
    <div class="text-center py-8">
        <p class="text-gray-500 text-lg">No expenses found for this month.</p>
        <a href="{{ route('expenses.create') }}" 
           class="mt-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Add Your First Expense
        </a>
    </div>
@endif
@endsection