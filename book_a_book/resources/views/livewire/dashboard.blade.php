<div>
    {{-- To attain knowledge, add things every day; To attain wisdom, subtract things every day. --}}




    <section>
        <h2>Vision des stoques </h2>

        <div class="search_bar_contener">
            <form action="#">
                <input wire:model.debounce.500ms="search" type="text" class="search_bar" placeholder="Rechercher un livre">
                <button class="search_button"><img src="../img/search.svg" alt="" class="search"></button>
            </form>
        </div>


        <label for="bloc">Trier par bloc</label>
        <select wire:model="byBloc" class="filter_contener" id="bloc">
            <option value="">Tout les blocs</option>
            @foreach($blocs as $bloc)
                <option value="{{$bloc->id}}">{{$bloc->bloc}}</option>
            @endforeach
        </select>

        @if($books->isEmpty())
        <div class="no_order">
            <p class="no_order_text">
                Il n'y aucunes livres correspondant.
            </p>
        </div>
        @endif







        <div class="display_books display_book-admin">

            @foreach($books as $book)
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
                    <h3>{{ $book->title }}</h3>
                    <div class="students_user_name_contener">
                        <p>Stock : {{ $book->stock }} | Commandes : {{ $book->orders_count }}</p>
                        @if ($book->stock >= $book->orders_count)
                            <p class="good">Le stoque est suffisant</p>
                        @else
                            <p class="alert">Il manque {{$book->orders_count - $book->stock }} exemplaires</p>
                        @endif
                    </div>

                    <div class="ordered_by">
                        @foreach($book->orders as $order)
                            {{-- @if($order->statu->id < 4) --}}
                                <div class="buyerprofil_box">
                                    <a href="http://localhost:8887/admin/student/{{$order->user->id}}">
                                        <img src="
                                        @if ($order->user->img)
                                        /{{$order->user->img}}
                                        @else
                                                {{'https://eu.ui-avatars.com/api/?name=' . urlencode($order->user->name) . '&size=120&background=aa0202&color=ffffff'}}
                                        @endif
                                        " alt="" class="buyer_pp">
                                    </a>

                                    <div class="buyerprofil_toggle">
                                        <p>{{ $order->user->name }}</p>
                                        <p class="group">{{ $order->user->group }}</p>
                                        @if ($order->statu->id == 3)
                                            <p class="good">payer</p>
                                        @else
                                            <p class="alert">Impayer</p>
                                        @endif
                                    </div>
                                </div>
                            {{-- @endif --}}

                    @endforeach



                    <label class="add book_component_add" for="edit_stock_{{ $book->id}}">
                            <img src="{{ asset('../img/edit.svg') }}" alt="" class="edit_book">
                    </label>
                    <input type="checkbox" class="valid_b visually-hidden" id="edit_stock_{{ $book->id }}" name="valid">
                    <section class="valid_box">
                        <div class="valid_box_in">
                            <h4 class="h3like">Motifier le stoque</h4>
                            <form action="/stock/edit" method="post">
                                @csrf
                                <label for="{{ $book->id }}_stoque">Votre Stoque</label>
                                <input type="text" id="{{ $book->id }}_stoque" name="stock" class="form-input" value="{{ $book->stock }}">
                                <input type="hidden" name="book_id" value="{{ $book->id }}">
                                <div class="flex">
                                    <label for="edit_stock_{{ $book->id }}" class="cta f_btn">Annuler</label>
                                    <button class="cta hcta f_btn">Modifier</button>
                                </div>
                            </form>

                        </div>
                    </section>




                    </div>
                </div>
            </section>



        @endforeach

        </div>


        {{ $books->links() }}








    </section>
</div>
