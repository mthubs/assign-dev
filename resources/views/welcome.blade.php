<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Task Distribution</title>


        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div class="container mt-5">
        <h1>Task Distribution Plan</h1>
        <p>Total weeks required to complete all tasks: <strong>{{ $weeks }} weeks</strong></p>
    </div>
    </body>
</html>
