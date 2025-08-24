@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="text-center">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Welcome to Expense Tracker</h1>
    <p class="text-gray-600 mb-8">Track your daily expenses and manage your budget effectively.</p>
    
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-blue-100 p-6 rounded-lg">
            <h3 class="text-xl font-semibold mb-4">Add Expense</h3>
            <p class="text-gray-700 mb-4">Record your daily expenses quickly and easily.</p>
            <a href="{{ route('expenses.create') }}" 
               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Add New Expense
            </a>
        </div>
        
        <div class="bg-green-100 p-6 rounded-lg">
            <h3 class="text-xl font-semibold mb-4">View Expenses</h3>
            <p class="text-gray-700 mb-4">See all your recorded expenses in one place.</p>
            <a href="{{ route('expenses.index') }}" 
               class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                View All Expenses
            </a>
        </div>
        
        <div class="bg-purple-100 p-6 rounded-lg">
            <h3 class="text-xl font-semibold mb-4">Monthly Report</h3>
            <p class="text-gray-700 mb-4">Check your monthly spending by category.</p>
            <a href="{{ route('expenses.monthly') }}" 
               class="bg-purple-500 hover:bg-purple-700 text-white font-bold py-2 px-4 rounded">
                Monthly Report
            </a>
        </div>
    </div>
</div>
@endsection