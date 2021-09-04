@extends('_layout.student_valid')

<!-- Titre de la page -->


<!-- Contenu de la page -->

@section('content')

    <!-- Contenu de la page -->


        <section class="requierd_books">
            <h2> Ma commande : {{ $order->statu->status_display }}</h2>
            @if ($order->statu->id === 2)
                <p class="comande-stat_info_t">Merci pour votre commande !</p>
                <p class="comande-stat_info">Votre commande est en attente de Payement. Verser la somme de <span>{{$order->total }}€</span> sur le compte de {{ $admin->name}}  <span>{{ $admin->be }}</span> avec en communication <span>Nom</span>, <span>prénom</span> et <span>classe.</span></p>
            @endif
            @if ($order->statu->id === 3)
                <p class="comande-stat_info">Votre payement à bien été recu! Vous receverez un mail pour vous informé de que celui-ci sera disponnible. </p>
            @endif
            @if ($order->statu->id === 4)
                <p class="comande-stat_info">Votre livre est disponnible, vous pouvez aller le récupérer </p>

                <p class="comande-stat_info">Infos de récuperation : {{ $admin->be }} </p>

            @endif


            <section class="facultativ_books">
                <h3>Récaputulatif de ma commande</h3>

                <div class="display_books">
                    @foreach ($order->books as $book)
                    <section class="book_component_store">
                        <div class="book_component_img_contener">
                            <img src="
                            @if ($book->img)
                                /{{$book->img}}
                            @else
                                {{ asset('../img/book_cover.jpg') }}
                            @endif
                            " alt="">
                        </div>
                        <div class="book_component_img">
                            <h4 class="book_title h3like">{{$book->title}}</h4>
                            <span class="book_autor">{{$book->author}}</span> |
                            <span class="book_edition">{{$book->edition}}</span>
                            <p class="book_shcool_info">Le livre est facultatif pour le coure de {{$book->class}} du proffesseur {{$book->teacher}}..</p>
                            <span class="price">{{$book->school_price}}€</span ><span class="old_price">{{$book->store_price}}€</span>
                        </div>
                    </section>
                    @endforeach
                </div>

            </section>
        </section>
@endsection
