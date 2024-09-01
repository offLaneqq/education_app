<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Laravel Test</title>
</head>

<body class="bg-slate-100 dark:bg-slate-800">
    <x-navbar />
    
    <div class="max-w-6xl p-4 mx-auto">
        {{ $slot }}
    </div>
</body>

</html>