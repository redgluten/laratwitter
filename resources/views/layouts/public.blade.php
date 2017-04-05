<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Plateforme de microblogging">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}" media="screen" title="no title">

    <title>Twitter | @yield('title')</title>

    <style type="text/css">
        .public-layout {
            padding-top: 8rem;
        }
    </style>
</head>
<body class="public-layout">

    <!-- Main navigation -->
    @include('partials/_nav')

    @yield('content')

    <!-- Scripts -->
    <script src="/js/app.js"></script>
</body>
</html>
