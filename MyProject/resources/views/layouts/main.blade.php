<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WPU Blog | {{ $title }}</title>
    <link rel="stylesheet" href="/assets/bootstrap/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/login.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
</head>
<body>
    @include('partials.navbar')
    
    <div class="container">
        @yield('container')
    </div>  
    
    
    <script src="/assets/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>