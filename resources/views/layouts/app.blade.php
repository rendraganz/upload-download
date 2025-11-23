<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen">

    <nav class="bg-gray-800 text-white p-4 shadow">
        <div class="container mx-auto">
            <a href="{{ route('file.index') }}" class="text-lg font-semibold hover:text-gray-300">
                File Manager
            </a>
        </div>
    </nav>

    <div class="container mx-auto mt-8 p-6">
        @yield('content')
    </div>

</body>
</html>
