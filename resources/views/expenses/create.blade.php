@extends('layouts.app')

@section('title', 'Add New Expense')

@section('content')
<h1 class="text-2xl font-bold text-gray-900 mb-6">Add New Expense</h1>

<form method="POST" action="{{ route('expenses.store') }}">
    @csrf

    <div class="mb-4">
        <label for="title" class="block text-gray-700 text-sm font-bold mb-2">
            Title
        </label>
        <input type="text" 
               id="title" 
               name="title" 
               value="{{ old('title') }}"
               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
               required>
    </div>

    <div class="mb-4">
        <label for="amount" class="block text-gray-700 text-sm font-bold mb-2">
            Amount
        </label>
        <input type="number" 
               id="amount" 
               name="amount" 
               value="{{ old('amount') }}"
               step="0.01"
               min="0"
               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
               required>
    </div>

    <div class="mb-4">
        <label for="category_id" class="block text-gray-700 text-sm font-bold mb-2">
            Category
        </label>
        <select id="category_id" 
                name="category_id"
                class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                required>
            <option value="">Select Category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="mb-6">
        <label for="date" class="block text-gray-700 text-sm font-bold mb-2">
            Date
        </label>
        <input type="date" 
               id="date" 
               name="date" 
               value="{{ old('date', date('Y-m-d')) }}"
               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
               required>
    </div>

    <div class="flex items-center justify-between">
        <button type="submit" 
                class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Add Expense
        </button>
        <a href="{{ route('expenses.index') }}" 
           class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
            Back to Expenses
        </a>
    </div>
</form>
@endsection