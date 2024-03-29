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


        <header class="aside">
            <h1>
                <a href="{{ route('student_home') }}">
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
                <span class="user_name">{{ Auth::user()->name }}</span>
                <a href="/profil" class="user_profil">profil</a>
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
                <nav class="nav">
                    <h2 class="visually-hidden">Navigation</h2>

                    <ol>
                        @foreach($blocs as $b)
                        <li><a href="/?bloc={{$b->id}}" class="nav_link @if($b->id == $bloc_id) nav_focused @endif">{{$b->bloc}}</a></li>
                        @endforeach
                    </ol>
                </nav>

                <section class="feedback">
                    <h2>Votre commende</h2>


                    @if ($booksOrder)

                    <div class="order_box">
                        <p class="info">Il y a {{ $order->bookOrders->count() }} livre dans votre commande.</p>
                        <p class="prix">Prix :  {{ $order->total }}€</p>


                    </div>



                            <a href="{{ route('student_cart') }}" class="cta hcta">Voir ma commande</a>
                    @else
                        <p class="no_feedback_p">Vous n’avez pas encore ajouter de livre à votre commande.</p>
                    @endif
                </section>

                @if (Auth::user()->is_admin == 1)
                <div class="nav_admin_btn">
                    <a href="{{ route('admin') }}">Acceder a l'interface de commande</a>
                </div>
                @endif

            </div>

        </header>









        <!-- Injection du contenu -->

        <main class="main">
            @yield('content')
        </main>

        <script src="{{ asset('js/app.js') }}" defer></script>
        @livewireScripts
    </body>

</html>
