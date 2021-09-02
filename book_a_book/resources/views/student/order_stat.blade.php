@extends('_layout.student')

<!-- Titre de la page -->



<!-- Contenu de la page -->

@section('content')



    <!-- Contenu de la page -->


        <section class="requierd_books">
            <h2>{{ $order->statu->status_display }}</h2>
            @if ($order->statu->id === 2)
                <p>Votre commande est en attente de Payement. Verser la somme de {{$order->total }}€ sur le compte de monsieur Spirlet : BE XXX XXX XXX </p>
            @endif
            @if ($order->statu->id === 3)
                <p>Votre payement à bien été recu! Vous receverez un mail pour vous informé de que celui-ci sera disponnible. </p>
            @endif
            @if ($order->statu->id === 4)
                <p>Votre livre est disponnible, vous pouvez aller le récupérer dans le bureau de Monsieur Spirler du Lundi au Vendredi de 10h à 12h</p>
            @endif
        </section>

        <section class="facultativ_books">
            <h2>Récaputulatif de ma commande</h2>
            // Ma commande! :D

            <div class="display_books">
                @foreach ($order->books as $book)
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
                    </div>
                </section>
                @endforeach
            </div>

        </section>
@endsection
