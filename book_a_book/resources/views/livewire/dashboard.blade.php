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
                <img src="{{ asset('../img/book_cover.jpg') }}" alt="">
            </div>


            <div class="dash_ins">
                <div class="title_box">
                    <h2>{{ $book->title }}</h2>
                    <div class="stock">
                        <p> Nombre de commandes : //CEDRIC//                            </p>
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


                        <div class="cta">

                            {{ $order->statu->status_display }}
                        </div>
                    </div>
                    @endforeach
                </div>

            </div>
        </section>

        @endforeach
        {{ $books->links() }}



        <form action="" class="cta_end">
            <button class="hcta cta form_cta">Commencer une nouvelle année</button>
        </form>

    </div>
</div>
