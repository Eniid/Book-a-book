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

    <body>

        <!-- Menu de Navigation  -->


        <header class="aside">
            <h1>
                <a href="/commande-en-cours">
                    <img src="{{ asset('../img/logo.svg') }}" alt="Book a Book">
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
                <span class="user_name">Xavier Spirler</span>
                <a href="/profil" class="user_profil">profil</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                    @csrf
                    <input type="submit" class="deco" value="Deconexion">
                </form>
            </div>
            </div>


            @if (Auth::user()->is_admin == 1)
            <div class="nav_admin_btn">
                <a href="{{ route('admin') }}">Acceder a l'interface de commande</a>
            </div>
            @endif


        </header>









        <!-- Injection du contenu -->

        <main class="main">
            @yield('content')
        </main>

        <script src="{{ asset('js/app.js') }}" defer></script>
        @livewireScripts
    </body>

</html>
