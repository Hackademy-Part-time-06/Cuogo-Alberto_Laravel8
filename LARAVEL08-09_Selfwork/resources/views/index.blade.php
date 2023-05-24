<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ALL BOOKS</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>
<body>
    <h1>ALL BOOKS</h1>

    <h3 class="mt-3">Indice:</h3>

    <ul>
        @foreach ($books as $book)
            <li>{{ $book['title'] }} - {{ $book['author'] }} | {{ $book['year'] }} | {{ $book['pages'] }} Pagine</li>
        @endforeach
    </ul>
    
</body>
</html>