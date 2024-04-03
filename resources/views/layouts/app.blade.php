<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Task It</title>
    @yield('styles')
</head>
<body class="container bg-gray-100  mx-auto mt-10 mb-10 max-w-lg">
    <div>
        <h1 class="mb-4 text-2xl">@yield('title')</h1>
        <div>
            @if (session()->has('success'))
                <div class="mb-10 rounded border border-green-400 bg-green-100 px-4 py-3">{{ session('success') }}</div>
            @endif

            @yield('content')
        </div>
    </div>
</body>
</html>
