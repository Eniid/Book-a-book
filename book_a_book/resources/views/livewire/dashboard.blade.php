<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}


    <div class="search_bar_contener">
        <form action="#">
            <input wire:model.debounce.500ms="search" type="text" class="search_bar" placeholder="Rechercher un livre">
            <button class="search_button"><img src="../img/search.svg" alt="" class="search"></button>
        </form>
    </div>


    <label for="bloc">Trier par bloc</label>
    <select wire:model="byBloc" class="filter_contener">
        <option value="">Tout les blocs</option>
        @foreach($blocs as $bloc)
            <option value="{{$bloc->id}}">{{$bloc->bloc}}</option>
        @endforeach
    </select>

    <div>

        @if($books->isEmpty())
        <div class="no_order">
            <p class="no_order_text">
                Il n'y aucunes commandes en cours pour cette recherche.
            </p>
        </div>
        @endif




        @foreach($books as $book)

        <section class="book_from_contener">

            <div class="cover_contener">
                <img src="
                        @if ($book->img)
                            /{{$book->img}}
                        @else
                            {{ asset('../img/book_cover.jpg') }}
                        @endif
                        " alt="">
            </div>


            <div class="dash_ins">
                <div class="title_box">
                    <h2>{{ $book->title }}</h2>
                    <div class="stock">
                        <p> Nombre de commandes : {{ $book->orders_count }}                          </p>
                        <p>Stock : {{ $book->stock }}</p>
                    </div>
                </div>

                <div class="users">
                    @foreach($book->orders as $order)
                    <div class="user">
                    <img src="
                    @if ($order->user->img)
                    /{{$order->user->img}}
                    @else
                            {{'https://eu.ui-avatars.com/api/?name=' . urlencode($order->user->name) . '&size=120&background=aa0202&color=ffffff'}}
                    @endif
                    " alt="" class="pp_edit">

                        <p>{{ $order->user->name }}</p>
                        <p class="group">{{ $order->user->group }}</p>


                                @if ($order->statu->status == 'cart')
                                <div class="cta_unactived">
                                    Commende en pannier
                                </div>
                            @elseif ($order->statu->status == 'ordered')
                                <label class="cta hcta" for="order{{$order->user->id}}{{$book->id}}">
                                    Marqué comme payer
                                </label>
                                <input type="checkbox" class="valid_b visually-hidden" id="order{{$order->user->id}}{{$book->id}}" name="valid">
                                <section class="valid_box">
                                    <div class="valid_box_in">
                                        <h3>Marquer comme payer</h3>
                                        <p>Cette action irrébersible valide que vous avez recu la totalitée du payement de {{ $order->user->name }} qui s'élève à //CEDRIC// </p>

                                        <div class="flex">
                                            <label for="order{{$order->user->id}}{{$book->id}}" class="cta f_btn">Annuler</label>
                                            <form action="/order/payed" method="post">
                                                @csrf
                                                <input type="hidden" value="{{ $order->id }}" name="user_id">
                                                <button class="cta hcta f_btn">Marquer comme payer</button>
                                            </form>
                                        </div>
                                    </div>
                                </section>




                            @elseif ($order->statu->status == 'payed')
                                <div class="cta htca hcta">
                                    Marqué comme disponnible
                                </div>
                            @elseif ($order->statu->status == 'available')
                                <div class="cta_unactived">
                                    Récupèrer
                                </div>
                            @endif

                    </div>
                    @endforeach
                </div>

            </div>
        </section>

        @endforeach
        {{ $books->links() }}








    </div>
</div>
