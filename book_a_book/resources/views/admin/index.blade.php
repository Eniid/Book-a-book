@extends('_layout.admin')

<!-- Titre de la page -->

@section('title')
Admin :
@endsection

<!-- Contenu de la page -->

@section('content')

        <div class="search_bar_contener">
            <form action="#">
                <input type="text" class="search_bar" placeholder="Rechercher un livre">
                <button class="search_button"><img src="../img/search.svg" alt="" class="search"></button>
            </form>
        </div>

        <div class="filter_contener">
        @foreach($blocs as $bloc)
            <a href="" class="filter_button">{{$bloc->bloc}}</a>
        @endforeach
        </div>

        <div>

            @if($books->isEmpty())
            <div class="no_order">
                <p class="no_order_text">
                    Il n'y aucunes commandes en cours.
                </p>
            </div>
            @endif

            @foreach($books as $book)

                <div>
                    <h1>{{ $book->title }}</h1>


                    @foreach($book->orders as $order)
                        {{ $order->user->name }}
                        {{ $order->statu->status }}
                    @endforeach
                </div>

            @endforeach



            <form action="">
                <button class="hcta cta form_cta">Commencer une nouvelle année</button>
            </form>

        </div>


@endsection
