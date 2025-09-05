<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title>@yield('title','Laravel Blog')</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">
  <nav class="bg-white shadow mb-6">
    <div class="container mx-auto px-4 py-3 flex justify-between items-center">
      <a href="/" class="font-bold text-xl">MySocial</a>
      <div>
        @auth
          <span class="mr-4">{{ auth()->user()->name }}</span>
          <form method="POST" action="/logout" style="display:inline">@csrf<button class="px-3 py-1 bg-red-500 text-white rounded">Logout</button></form>
        @else
          <a href="/login" class="mr-3">Login</a>
          <a href="/register" class="px-3 py-1 bg-blue-500 text-white rounded">Register</a>
        @endauth
      </div>
    </div>
  </nav>
  <div class="container mx-auto px-4">
    @if(session('status'))<div class="bg-green-100 p-3 mb-4">{{ session('status') }}</div>@endif
    @yield('content')
  </div>
</body>
</html>
