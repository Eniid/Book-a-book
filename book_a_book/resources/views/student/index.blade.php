@extends('_layout.student')

<!-- Titre de la page -->



<!-- Contenu de la page -->

@section('content')
    <!-- Contenu de la page -->

    @if(intval($bloc->books->where('required', 1)->count()) >= 1)
        <section class="requierd_books">
            <h2>Obligatoire</h2>
            <p>Les livres obligatoires sont des livres que vous devez nécessairement vous procurer pour vos cours. Cela dit, rien ne vous empêche de vous les procurer par cous même. </p>

            <div class="display_books">
                @foreach($bloc->books as $book)
                    @if($book->required == 1)
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
                                <h3 class="book_title">{{$book->title}}</h3>
                                <span class="book_autor">{{$book->author}}</span> |
                                <span class="book_edition">{{$book->edition}}</span>
                                <p class="book_shcool_info">Le livre est obligatoir pour le coure de {{$book->class}} du proffesseur {{$book->teacher}}.</p>
                                <span class="price">{{$book->school_price}}€</span ><span class="old_price">{{$book->store_price}}€</span>
                                <a href="{{$book->link}}" class="cta book_component_link">Voir sur Amazone</a>
                                <div class="add book_component_add flex">
                                    <form action="/moins" method="post">
                                        @csrf
                                        @if($order)
                                            <input type="hidden" value="{{$order->id}}" name="order_id">
                                        @endif

                                        <input type="hidden" value="{{$book->id}}" name="book_id">
                                        <button class="order_btn
                                        @if($booksOrder && $booksOrder->where('book_id', $book->id)->count())
                                        active
                                        @endif
                                        "><img src="{{ asset('../img/moins.svg') }}" alt=""></button>

                                    </form>

                                    <div class="order-book_number">
                                        @if($booksOrder)
                                        {{ $booksOrder->where('book_id', $book->id)->count() }}
                                        @else
                                        0
                                        @endif
                                    </div>

                                    <form action="/plus" method="post">
                                        @csrf

                                        @if($order)
                                            <input type="hidden" value="{{$order->id}}" name="order_id">
                                        @endif
                                        <input type="hidden" value="{{$book->id}}" name="book_id">
                                        <button class="order_btn active"><img src="{{ asset('../img/add.svg') }}" alt=""></button>

                                    </form>
                                </div>

                            </div>
                        </section>
                    @endif
                @endforeach
            </div>
        </section>
    @endif


    @if(intval($bloc->books->where('required', 0)->count()) >= 1)
        <section class="facultativ_books">
            <h2>Facultative</h2>
            <p>Livres conseillée par vos professeur, mais pas obligatoires. </p>
            <div class="display_books">
                @foreach($bloc->books as $book)
                    @if($book->required == 0)
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
                            <h3 class="book_title">{{$book->title}}</h3>
                            <span class="book_autor">{{$book->author}}</span> |
                            <span class="book_edition">{{$book->edition}}</span>
                            <p class="book_shcool_info">Le livre est facultatif pour le coure de {{$book->class}} du proffesseur {{$book->teacher}}..</p>
                            <span class="price">{{$book->school_price}}€</span ><span class="old_price">{{$book->store_price}}€</span>
                            <a href="#" class="cta book_component_link">Voir sur Amazone</a>

                            <div class="add book_component_add flex">
                                <form action="/moins?bloc={{ $bloc_id }}" method="post">
                                    @csrf
                                    @if($order)
                                        <input type="hidden" value="{{$order->id}}" name="order_id">
                                    @endif

                                    <input type="hidden" value="{{$book->id}}" name="book_id">
                                    <button class="order_btn
                                    @if($booksOrder && $booksOrder->where('book_id', $book->id)->count())
                                        active
                                    @endif
                                    "><img src="{{ asset('../img/moins.svg') }}" alt=""></button>

                                </form>

                                <div class="order-book_number">
                                    @if($booksOrder)
                                    {{ $booksOrder->where('book_id', $book->id)->count() }}
                                    @else
                                    0
                                    @endif
                                </div>

                                <form action="/plus?bloc={{ $bloc_id }}" method="post">
                                    @csrf

                                    @if($order)
                                        <input type="hidden" value="{{$order->id}}" name="order_id">
                                    @endif
                                    <input type="hidden" value="{{$book->id}}" name="book_id">
                                    <button class="order_btn active"><img src="{{ asset('../img/add.svg') }}" alt=""></button>

                                </form>
                            </div>

                        </div>
                    </section>
                    @endif
                @endforeach
            </div>

        </section>
    @endif


@endsection
