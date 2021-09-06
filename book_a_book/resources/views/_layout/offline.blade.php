<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">


            <!-- Informations sur le site  -->
            <meta name="description" content="Book a book est un site crée pour les commandes de livre de la HEPL section infographie">
            <meta name="keywords" content="livres, hepl, commandes, infographie">
            <meta name="author" content="Enid">


            <!-- Flavicon  -->

            <link rel="apple-touch-icon" sizes="57x57" href="/flav/apple-icon-57x57.png">
            <link rel="apple-touch-icon" sizes="60x60" href="/flav/apple-icon-60x60.png">
            <link rel="apple-touch-icon" sizes="72x72" href="/flav/apple-icon-72x72.png">
            <link rel="apple-touch-icon" sizes="76x76" href="/flav/apple-icon-76x76.png">
            <link rel="apple-touch-icon" sizes="114x114" href="/flav/apple-icon-114x114.png">
            <link rel="apple-touch-icon" sizes="120x120" href="/flav/apple-icon-120x120.png">
            <link rel="apple-touch-icon" sizes="144x144" href="/flav/apple-icon-144x144.png">
            <link rel="apple-touch-icon" sizes="152x152" href="/flav/apple-icon-152x152.png">
            <link rel="apple-touch-icon" sizes="180x180" href="/flav/apple-icon-180x180.png">
            <link rel="icon" type="image/png" sizes="192x192"  href="/flav/android-icon-192x192.png">
            <link rel="icon" type="image/png" sizes="32x32" href="/flav/favicon-32x32.png">
            <link rel="icon" type="image/png" sizes="96x96" href="/flav/favicon-96x96.png">
            <link rel="icon" type="image/png" sizes="16x16" href="/flav/favicon-16x16.png">
            <link rel="manifest" href="/flav/manifest.json">
            <meta name="msapplication-TileColor" content="#ffffff">
            <meta name="msapplication-TileImage" content="/flav/ms-icon-144x144.png">
            <meta name="theme-color" content="#ffffff">


                <!-- To run web application in full-screen -->
                <meta name="apple-mobile-web-app-capable" content="yes">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- CSS -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- *Injection du titre de la page* -->
        <title>@yield('title') Book a book</title>
        @livewireStyles
    </head>

    <body>


        <!-- Menu de Navigation  -->



        <!-- Injection du contenu -->
        @yield('content')
        <script src="{{ asset('js/app.js') }}" defer></script>
        @livewireScripts
    </body>

</html>
