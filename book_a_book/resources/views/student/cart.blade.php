@extends('_layout.student')

<!-- Titre de la page -->

@section('title')
Pannier :
@endsection


<!-- Contenu de la page -->

@section('content')




    <!-- Contenu de la page -->


        <section class="requierd_books">
            <h2>Votre commande</h2>


            <div class="display_books">
                @foreach ($order_display->books as $book )

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
@endsection
