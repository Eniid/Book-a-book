@extends('_layout.admin')


<!-- Titre de la page -->

@section('title')
{{ $user->name }} :
@endsection

<!-- Contenu de la page -->
@section('content')


<div class="profil-edit_box">
    <div class=" profil_form">
        <div class="profil_info_overall-box">

                @csrf

                <div class="profil-edit_box_avatar">
                    <img src="
                            @if ($user->img)
                            /{{ $user->img }}
                            @else
                                    {{'https://eu.ui-avatars.com/api/?name=' . urlencode($user->name) . '&size=120&background=aa0202&color=ffffff'}}
                            @endif
                        " alt="" class="pp_edit">
                </div>

                <div class="name_forprofil">
                    {{ $user->name }}
                </div>
                <div class="students_user_name_contener">
                    <p>{{$user->group}}</p>
                    <p>{{$user->email}}</p>
                </div>

                <form action="/student/com" method="post" class="profil_com">
                    @csrf
                    <input type="hidden" value="{{ $user->id }}" name="user_id">
                    <label for="com" class="">Commentaire</label>
                    <textarea name="com" id="com" class="form-control">{{ $user->commentaire }}</textarea>
                    <button class="cta hcta">Sauver</button>
                </form>






                <section class="profil_info_overall-box">
                    <h2>Comande en cours</h2>
                    <div>
                        @foreach($user->orders as $order)
                        <p title="{{ $order->created_at->toDateTimeString() }}">Création de la commande : {{ $order->created_at->diffForHumans() }}</p>
                        <p title="{{ $order->updated_at->toDateTimeString()}}">Changement de statu : {{ $order->updated_at->diffForHumans() }}</p>



                            @php
                            $AllInStock = true;

                            $price = 0;
                            @endphp


                            <div class="books_list">
                                @foreach ($order->books as $book)
                                {{-- <img src="
                                @if ($book->img)
                                    /{{$book->img}}
                                @else
                                    {{ asset('../img/book_cover.jpg') }}
                                @endif
                                    " alt="{{ $book->name }} cover" title="{{ $book->name }}" class="student-order-cover"> --}}



                                        <div class="book_around">
                                            <img src="
                                            @if ($book->img)
                                            /{{$book->img}}
                                            @else
                                            {{ asset('../img/book_cover.jpg') }}
                                            @endif
                                            " alt="{{ $book->title }} cover" title="{{ $book->name }}" class="student-order-cover book_profil">

                                            <div class="book_info">
                                                <p class="title">
                                                    {{ $book->title }}
                                                </p>
                                                <p class="info">
                                                    Price : {{ $book->school_price }}€
                                                </p>
                                                <p class="info">
                                                    Stock : {{ $book->stock }}
                                                </p>
                                            </div>
                                        </div>


                                        @php
                                            if($book->stock < $order->quantities[$book->id]){
                                                $AllInStock = false;
                                            }
                                            $price = $price + $book->school_price;
                                        @endphp

                                @endforeach
                            </div>




                            @if($order->statu_id == 1)
                                    <p class="student_no_order">L'étudiant n'a pas encore valider la commande</p>
                                    {{-- <form action="">
                                        <button class="cta hcta book_component_link">
                                            A payer
                                        </button>
                                    </form> --}}

                                @elseif($order->statu_id == 2)
                                    <p class="student_no_order">L'éduitant doit payer la somme de {{ $price }}€</p>
                                        <div class="">
                                            <label class="cta hcta" for="{{$user->name}}_pay">
                                                {{ $price }}€ Payer
                                            </label>
                                        </div>
                                        <input type="checkbox" class="valid_b visually-hidden" id="{{$user->name}}_pay" name="valid">
                                        <section class="valid_box">
                                            <div class="valid_box_in">
                                                <h3>Confirmation</h3>
                                                <p>{{$user->name}} à bien verser la somme de {{ $price }}€ pour sa commande.</p>

                                                <div class="flex">
                                                    <label for="{{$user->name}}_pay" class="cta f_btn">Annuler</label>
                                                    <form action="/order/payed" method="post">
                                                        @csrf
                                                        <input type="hidden" value="{{$user->id}}" name="user_id">
                                                        <button class="cta hcta f_btn">Confirmer la réception du payement</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </section>


                                @elseif($order->statu_id == 3)
                                    <p class="student_no_order">Payement en order. L'étudiant attand que sa commande soit disponnible</p>
                                    @if ($AllInStock )
                                        <div class="">
                                            <label class="cta hcta" for="{{$user->name}}_stock">
                                                Disponnible
                                            </label>
                                        </div>
                                        <input type="checkbox" class="valid_b visually-hidden" id="{{$user->name}}_stock" name="valid">
                                        <section class="valid_box">
                                            <div class="valid_box_in">
                                                <h3>Confirmation</h3>
                                                <p> Informer {{$user->name}} que sa commande est disponnible. Le stoque pour la valisation de cette commande est suffistant </p>

                                                <div class="flex">
                                                    <label for="{{$user->name}}_stock" class="cta f_btn">Annuler</label>
                                                    <form action="/order/avalible" method="post">
                                                        @csrf
                                                        <input type="hidden" value="{{$user->id}}" name="user_id">
                                                        <button class="cta hcta f_btn">Confirmer la disponibilitée</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </section>
                                    @else
                                        <div class="">
                                            <label class="cta_unactived" for="{{$user->name}}_stock">
                                                Disponnible
                                            </label>
                                        </div>
                                        <input type="checkbox" class="valid_b visually-hidden" id="{{$user->name}}_stock" name="valid">
                                        <section class="valid_box">
                                            <div class="valid_box_in">
                                                <h3>Stoque insuffiant</h3>
                                                <p> Les stoques disponnibles ne sont pas suffisant pour valider cette commande. </p>

                                                <div class="flex">
                                                    <label for="{{$user->name}}_stock" class="cta f_btn">Annuler</label>
                                                </div>
                                            </div>
                                        </section>
                                    @endif

                                @elseif($order->statu_id == 4)
                                    <p class="student_no_order">{{$user->name}} Doit Vennur recupérer sa commande</p>
                                    <div class="">
                                        <label class="cta hcta" for="{{$user->name}}_stock">
                                            Commande récupérée
                                        </label>
                                    </div>
                                    <input type="checkbox" class="valid_b visually-hidden" id="{{$user->name}}_stock" name="valid">
                                    <section class="valid_box">
                                        <div class="valid_box_in">
                                            <h3>Confirmation</h3>
                                            <p> Informer {{$user->name}} que sa commande est disponnible. Le stoque pour la valisation de cette commande est suffistant </p>

                                            <div class="flex">
                                                <label for="{{$user->name}}_stock" class="cta f_btn">Annuler</label>
                                                <form action="/order/finished" method="post">
                                                    @csrf
                                                    <input type="hidden" value="{{$user->id}}" name="user_id">
                                                    <button class="cta hcta f_btn">Confirmer la disponibilitée</button>
                                                </form>
                                            </div>
                                        </div>
                                    </section>


                                @elseif($order->statu_id == 5)
                                    <p class="student_no_order">{{$user->name}} Est en Ordre pour cette année! </p>

                                @endif

                                @if($order)
                                    {{-- A une commande --}}
                                @else
                                    <p class="student_no_order">{{$user->name}} N'ai pas de Commande en cours :D </p>
                                @endif

                        @endforeach
                    </div>
                </section>


                <section>
                    <h2>
                        Anciences commandes
                    </h2>
                   @foreach ($oldOrders as $order)
                        <section class="archived_order">
                            <h3>Commande de {{ $order->updated_at->year }}</h3>
                            <p>{{ $order->updated_at->toFormattedDateString() }}</p>
                            <div class="books_list">
                        @foreach ($order->books as $book)
                            <div>
                                <div class="book_around">
                                    <img src="
                                    @if ($book->img)
                                    /{{$book->img}}
                                    @else
                                    {{ asset('../img/book_cover.jpg') }}
                                    @endif
                                    " alt="{{ $book->title }} cover" title="{{ $book->name }}" class="student-order-cover book_profil">

                                    <div class="book_info">
                                        <p class="title">
                                            {{ $book->title }}
                                        </p>
                                        <p class="info">
                                            Price : {{ $book->school_price }}€
                                        </p>
                                        <p class="info">
                                            Stock : {{ $book->stock }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        </div>

                        @if ($order->statu_id == 1)
                            <p>Le commande n'avait pas été confirmée par {{ $user->name }}</p>

                        @endif

                        @if ($order->statu_id == 2)
                            <p>Le commande n'avait pas été payée par {{ $user->name }}</p>
                        @endif

                        @if ($order->statu_id == 3)
                            <p>Vous n'avez jamais rendu le Stoque Disponnible pour cette commande.</p>
                        @endif

                        @if ($order->statu_id == 4)
                           <p>Le commande à été payée par {{ $user->name }}, mais il n'es jamais venu la récupérée.</p>
                        @endif

                        @if ($order->statu_id == 5)
                            <p>La commande de cette année à été cloturée</p>
                        @endif

                        </section>
                   @endforeach






                </section>

        </div>
    </div>
</div>


@endsection
