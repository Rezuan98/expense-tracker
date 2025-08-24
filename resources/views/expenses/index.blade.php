@extends('layouts.app')

@section('title', 'My Expenses')

@section('content')
<div class="flex justify-between items-center mb-6">
    <h1 class="text-2xl font-bold text-gray-900">My Expenses</h1>
    <a href="{{ route('expenses.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Add New Expense
    </a>
</div>

@if($expenses->count() > 0)
    <div class="overflow-x-auto">
        <table class="min-w-full table-auto">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 text-left">Title</th>
                    <th class="px-4 py-2 text-left">Amount</th>
                    <th class="px-4 py-2 text-left">Category</th>
                    <th class="px-4 py-2 text-left">Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($expenses as $expense)
                    <tr class="border-b">
                        <td class="px-4 py-2">{{ $expense->title }}</td>
                        <td class="px-4 py-2"><strong>৳</strong>{{ number_format($expense->amount, 2) }}</td>
                        <td class="px-4 py-2">{{ $expense->category->name }}</td>
                        <td class="px-4 py-2">{{ $expense->date->format('M d, Y') }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <div class="text-center py-8">
        <p class="text-gray-500 text-lg">No expenses found.</p>
        <a href="{{ route('expenses.create') }}" class="mt-4 inline-block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            Add Your First Expense
        </a>
    </div>
@endif
@endsection