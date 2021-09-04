<div>
    {{-- The whole world belongs to you --}}

        <div class="search_bar_contener">
            <form action="#">
                <input wire:model.debounce.500ms="search" type="text" class="search_bar" placeholder="Rechercher un livre">
                <button class="search_button"><img src="../img/search.svg" alt="" class="search"></button>
            </form>
        </div>

        <label for="bloc">Trier par bloc :</label>
        <select wire:model="byBloc" class="filter_contener">
            <option value="">Tout les blocs</option>
            @foreach($blocs as $bloc)
                <option value="{{$bloc->id}}">{{$bloc->bloc}}</option>
            @endforeach
        </select>


        <section>
            <h2>Les livres</h2>
            @if($books->isEmpty())
            <div class="no_order">
                <p class="no_order_text">
                    Il n'y aucuns livres pour cette recherche.
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
                            <h3 class="book_title">{{$book->title}}</h3>
                            <span class="book_autor">{{$book->author}}</span> |
                            <span class="book_edition">{{$book->edition}}</span>
                            <p class="book_shcool_info">Le livre est
                                @if ($book->required == 1)
                                    obligatoir
                                @else
                                    facultatif
                                @endif

                                pour le coure de {{$book->class}} du proffesseur {{$book->teacher}}.</p>
                            <span class="price">{{$book->school_price}}€</span ><span class="old_price">{{$book->store_price}}€</span>
                            <a class="add book_component_add" href="/admin/books/edit/{{$book->id}}"><img src="{{ asset('../img/edit.svg') }}" alt="" class="edit_book"></a>
                        </div>
                    </section>
                @endforeach
            </div>

            {{ $books->links() }}


            <div class="add_new_book">
                <a href="/admin/books/new" class="add new_book_button book_component_add"><img src="{{ asset('../img/add.svg') }}" alt="" class="add_book_button"></a>
            </div>
        </section>



</div>
