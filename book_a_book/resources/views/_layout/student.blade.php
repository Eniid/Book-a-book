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
            <h1><img src="{{ asset('../img/logo.svg') }}" alt="Book a Book"></h1>

            <div class="profil">
                <img src="{{ asset('../img/avatar.jpg') }}" class="pp"  alt="">
                <span class="user_name">{{ Auth::user()->name }}</span>
                <a href="#" class="user_profil">profil</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                    @csrf
                    <input type="submit" class="deco" value="Deconexion">
                </form>
            </div>


            <input type="checkbox" id="nav" class="nav_input visually-hidden">
                <div class="nav_control">
                    <label for="nav" class="nav_lab"><span class="open_nav"><img src="{{ asset('../img/menu.png') }}" alt="open"></span><span class="close_nav"><img src="{{ asset('../img/x.png') }}" alt="close"></span></label>
                </div>
            <div class="mobile">
                <nav class="nav">
                    <ol>
                        @foreach($blocs as $b)
                        <li><a href="?bloc={{$b->id}}" class="nav_link @if($b->id == $bloc_id) nav_focused @endif">{{$b->bloc}}</a></li>

                        @endforeach
                    </ol>
                </nav>

                <section class="feedback">
                    <h2>Votre commende</h2>

                    @if ($booksOrder)

                        <ul>
                        @foreach ($order->books as $book)
                        <li>
                            x{{ $book->quantity }} -> {{ $book-> title }} ______ {{ $book->totalPrice }}€

                        </li>
                        @endforeach
                         </ul>

                         Total : {{ $order->total }}



                            <a href="/commande" class="cta hcta">Voir ma commande</a>
                    @else
                        <p class="no_feedback_p">Vous n’avez pas encore ajouter de livre à votre commande.</p>
                    @endif
                </section>
            </div>

        </header>









        <!-- Injection du contenu -->
        @yield('content')
        <script src="{{ asset('js/app.js') }}" defer></script>
        @livewireScripts
    </body>

</html>
