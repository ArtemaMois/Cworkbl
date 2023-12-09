<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <title>Notes</title>
    @vite(['/resources/css/main.css',
    '/resources/css/layots/create.css',
    '/resources/css/layots/update.css' ])
</head>
<body>
    <main>
        @include('components.navbar')
        <div class="menu">
            @include('components.sidebar')
        </div>
        <div class="content">
            @yield('content')
        </div>
    </main>
</body>
</html>
