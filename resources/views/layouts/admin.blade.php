<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - Satwiga Tour</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-100">
    <nav class="bg-white shadow-md">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <div class="flex items-center space-x-6">
                <a href="{{ route('admin.dashboard') }}" class="text-xl font-bold text-slate-800">Admin Panel</a>
                <div class="hidden md:flex space-x-4">
                    <a href="{{ route('admin.dashboard') }}"
                        class="text-sm font-medium text-slate-600 hover:text-indigo-600">Dashboard</a>
                    <a href="{{ route('admin.trips.index') }}"
                        class="text-sm font-medium text-slate-600 hover:text-indigo-600">Trips</a>
                </div>
            </div>
            <div>
                <a href="/" target="_blank" class="text-slate-600 hover:text-indigo-600">Lihat Situs</a>
            </div>
        </div>
    </nav>

    <main class="container mx-auto p-6">
        @yield('content')
    </main>
</body>

</html>
