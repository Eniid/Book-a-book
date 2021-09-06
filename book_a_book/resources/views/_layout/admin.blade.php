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



    <!-- ********** -->
    <!-- LA PAGE !! -->
    <!-- ********** -->
    <body>

        <!-- Menu de Navigation  -->
        <header class="aside">
            <h1 class="admin_log">
                <a href="/admin">
                    <img src="{{ asset('../img/logoadd.svg') }}" alt="Book a Book">
                </a>
            </h1>

            <div class="profil">
                <img src="
                @if (Auth::user()->img)
                /{{Auth::user()->img}}
                @else
                        {{'https://eu.ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&size=120&background=aa0202&color=ffffff'}}
                @endif
            " alt="" class="pp">
                <div class="user_infos">
                    <span class="user_name">{{ Auth::user()->name }}</span>
                    <a href="/admin/profil" class="user_profil">profil</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                        @csrf
                        <input type="submit" class="deco" value="Deconexion">
                    </form>
                </div>
            </div>


            <input type="checkbox" id="nav" class="nav_input visually-hidden">
            <div class="nav_control">
                <label for="nav" class="nav_lab"><span class="open_nav"><img src="{{ asset('../img/menu.png') }}" alt="open"></span><span class="close_nav"><img src="{{ asset('../img/x.png') }}" alt="close"></span></label>
            </div>

            <div class="mobile">
                <!-- Le Menu  -->
                <nav class="nav">
                    <h2 class="visually-hidden">Navigation</h2>
                    <ol>
                        <li><a href="/admin" class="nav_link
                            @if (Request::path() == 'admin')
                            nav_focused
                            @endif
                            ">Commandes</a>
                        </li>
                        <li><a href="/admin/stock" class="nav_link
                            @if (Request::path() == 'admin/stock')
                            nav_focused
                            @endif
                            ">Stokes</a>
                        </li>
                        <li><a href="/admin/books" class="nav_link
                            @if (Request::path() == 'admin/books')
                            nav_focused
                            @endif
                        ">Livres</a>
                        </li>
                    </ol>
                </nav>

                <!-- Les Feedbacks  -->
                <section class="feedback">
                    <h2>Statistiques</h2>
                    <p class="no_feedback_p"><b>{{ $inProcess }}</b> commendes sont en cours</p>
                    <p class="no_feedback_p"><b>{{ $orderd }}</b> en attente de payement</p>
                    <p class="no_feedback_p"><b>{{ $finished }}</b> cloturée</p>
                </section>

                <div class="nav_admin_btn">
                    <a href="{{ route('student_home') }}">Acceder a l'interface de commande</a>
                </div>
            </div>

        </header>


        <!-- Le contenu -->
        <main class="main">
            @yield('content')
        </main>

        <!-- JS -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        @livewireScripts

    </body>

</html>
