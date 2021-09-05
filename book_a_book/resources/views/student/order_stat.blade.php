@extends('_layout.student_valid')

<!-- Titre de la page -->

@section('title')
Commande :
@endsection

<!-- Contenu de la page -->

@section('content')

    <!-- Contenu de la page -->


        <section class="requierd_books">
            <h2> Ma commande</h2>
            <p class="myorder_status">{{ $order->statu->status_display }}</p>

            @if ($order->statu->id === 2)
                <p class="comande-stat_info_t">Merci pour votre confiance !</p>
                <p class="comande-stat_info">Votre commande est en attente de Payement. Vous pouvez versser la somme de <span>{{$order->total}}€</span> sur le compte de {{ $admin->name}}  <span>{{ $admin->be }}</span>. N'oubliez pas de présier en communication votre <span>Nom</span> et <span>classe</span> (ceux utiliser sur l'application), afin que nous puissions vous identifier.</p>
            @endif
            @if ($order->statu->id === 3)
                <p class="comande-stat_info_t">Votre payement à bien été recu!</p>
                <p class="comande-stat_info">Vous receverez un mail dés que votre commande sera disponnible, pour vous informer de la marche à suivre.</p>
            @endif
            @if ($order->statu->id === 4)
                <p class="comande-stat_info_t">Votre livre est disponnible, vous pouvez aller le récupérer </p>
                <p class="comande-stat_info">Infos de récuperation : {{ $admin->visit_time }} </p>

            @endif
            @if ($order->statu->id === 5)
            <p class="comande-stat_info_t">Tout est en ordre, à l'année prochaine! </p>
            <p class="comande-stat_info">Bonne étude! </p>

        @endif


            <section class="facultativ_books">
                <h3>Récaputulatif de ma commande</h3>

                <div class="display_books">
                    @foreach ($order_display->books as $book)
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
