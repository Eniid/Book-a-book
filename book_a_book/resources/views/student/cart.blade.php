@extends('_layout.student')

<!-- Titre de la page -->



<!-- Contenu de la page -->

@section('content')


    <header class="aside">
        <h1><img src="{{ asset('../img/logo.svg') }}" alt=""></h1>

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







    <!-- Contenu de la page -->


    <main class="main">
        <section class="requierd_books">
            <h2>Votre commande</h2>


            <div class="display_books">
                @foreach ($order->books as $book )

                <section class="book_component_store">
                    <div class="book_component_img_contener">
                        <img src="{{ asset('../img/book_cover.jpg') }}" alt="">
                    </div>
                    <div class="book_component_img">
                        <h3 class="book_title">{{$book->title}}</h3>
                        <span class="book_autor">{{$book->author}}</span> |
                        <span class="book_edition">{{$book->edition}}</span>
                        <p class="book_shcool_info">Le livre est facultatif pour le coure de {{$book->class}} du proffesseur {{$book->teacher}}..</p>
                        <span class="price">{{$book->school_price}}€</span ><span class="old_price">{{$book->store_price}}€</span>

                        <form action="/del" method="post">
                            @csrf
                            <input type="hidden" value="{{$book->id}}" name="book_id">

                            <button href="#" class="cta hcta book_component_link">X</button>
                        </form>
                    </div>
                </section>
                @endforeach
            </div>


                <label class="cta" for="valid" >
                    Valider ma commande
                </label>
                <input type="checkbox" class="valid_b visually-hidden" id="valid" name="valid">

            <section class="valid_box">
                <div class="valid_box_in">
                    <h3>Action irréversivle</h3>
                    <p>Cette acction est irréversible, êtes vous sur de vouloir passer votre commende ?</p>

                    <div class="flex">
                        <label for="valid" class="cta f_btn">Continuer d'éditer</label>
                        <form action="/valid" method="post">
                            @csrf
                            <button class="cta hcta f_btn">Valider ma Commande</button>
                        </form>
                    </div>
                </div>
            </section>


        </section>
    </main>
@endsection
