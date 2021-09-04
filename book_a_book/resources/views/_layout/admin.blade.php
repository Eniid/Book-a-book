<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
                    <p class="no_feedback_p"><b>10</b> on été payer</p>
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
