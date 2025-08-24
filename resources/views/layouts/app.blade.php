<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Expense Tracker')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between h-16">
                <div class="flex items-center">
                    <a href="{{ route('dashboard') }}" class="text-xl font-bold text-gray-800">
                        Expense Tracker
                    </a>
                    <div class="ml-10 flex space-x-8">
                        <a href="{{ route('dashboard') }}" class="text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md">Dashboard</a>
                        <a href="{{ route('expenses.index') }}" class="text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md">Expenses</a>
                        <a href="{{ route('expenses.create') }}" class="text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md">Add Expense</a>
                        <a href="{{ route('expenses.monthly') }}" class="text-gray-700 hover:text-gray-900 px-3 py-2 rounded-md">Monthly Report</a>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-700">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white px-4 py-2 rounded">
                            Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Flash Messages -->
            @if (session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Page Content -->
            <div class="bg-white overflow-hidden shadow-sm rounded-lg">
                <div class="p-6">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
</body>
</html>