<div>
    {{-- The whole world belongs to you --}}

    <section>
        <h2>Les Commandes</h2>
        <p>Ci-dessous se trouve toutes les commandes de l'année en cours.</p>
        <div class="search_bar_contener">
            <form action="#">
                <input wire:model.debounce.500ms="search" type="text" class="search_bar" placeholder="Rechercher étudient ou groupe">
                <button class="search_button"><img src="../img/search.svg" alt="" class="search"></button>
            </form>
        </div>


        <label for="stat">Trier par statu</label>
        <select wire:model="byStat" class="filter_contener" id="stat">
            <option value="">Tout</option>
            @foreach($status as $statu)
            <option value="{{$statu->status_id}}">{{$statu->status_display}}</option>
            @endforeach
        </select>


        @if($students->isEmpty())
        <div class="no_order">
            <p class="no_order_text">
                Il n'y aucuns étudients pour cette recherche.
            </p>
        </div>
        @endif


        {{-- Liste des étudients  --}}

        <div class="students">
            @foreach($students as $student)
                <div class="students_contener">
                    <img src="
                    @if ($student->img)
                    /{{$student->img}}
                    @else
                    {{'https://eu.ui-avatars.com/api/?name=' . urlencode($student->name) . '&size=120&background=aa0202&color=ffffff'}}
                    @endif
                    " alt="" class="pp students_pp">

                    <div class="student_view_contener">
                        <div class="students_user_name_contener">
                            <a href="/admin/student/{{$student->id}}" class="students_user_name">{{$student->name}}</a>
                            <p>{{$student->group}}</p>
                        </div>

                        @foreach ( $student->orders as $order)
                            <div class="student-order-contener">
                                @php
                                    $AllInStock = true;

                                    $price = 0;
                                @endphp

                                @foreach($order->books as $book)
                                    <div class="book_around">
                                        <img src="
                                        @if ($book->img)
                                        /{{$book->img}}
                                        @else
                                        {{ asset('../img/book_cover.jpg') }}
                                        @endif
                                        " alt="{{ $book->title }} cover" title="{{ $book->name }}" class="student-order-cover">

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

                            <div>
                                <div class="price_box">
                                    <span class="visually-hidden">Commande :</span> {{ $price }}€
                                </div>
                            </div>


                            @if($order->statu_id == 1)
                                <p class="order-list_order-stat">Commande en cours</p>
                                <p class="student_no_order">L'étudiant n'a pas encore valider la commande</p>
                            @elseif($order->statu_id == 2)
                                <p class="order-list_order-stat">Commande a payer</p>
                                <p class="student_no_order">L'éduitant doit payer la somme de {{ $price }}€</p>
                                <div class="order-btn_box">
                                    <label class="cta hcta" for="{{$student->name}}_pay">
                                        {{ $price }}€ Payer
                                    </label>
                                </div>
                                <input type="checkbox" class="valid_b visually-hidden" id="{{$student->name}}_pay" name="valid">
                                <section class="valid_box">
                                    <div class="valid_box_in">
                                        <h3>Confirmation</h3>
                                        <p>{{$student->name}} à bien verser la somme de {{ $price }}€ pour sa commande.</p>

                                        <div class="flex">
                                            <label for="{{$student->name}}_pay" class="cta f_btn">Annuler</label>
                                            <form action="/order/payed" method="post">
                                                @csrf
                                                <input type="hidden" value="{{$student->id}}" name="user_id">
                                                <button class="cta hcta f_btn">Confirmer la réception du payement</button>
                                            </form>
                                        </div>
                                    </div>
                                </section>
                            @elseif($order->statu_id == 3)
                                <p class="order-list_order-stat">Commande en attende de Stock</p>
                                <p class="student_no_order">Payement en order. L'étudiant attand que sa commande soit disponnible</p>
                                @if ($AllInStock )
                                    <div class="order-btn_box">
                                        <label class="cta hcta" for="{{$student->name}}_stock">
                                            Disponnible
                                        </label>
                                    </div>
                                    <input type="checkbox" class="valid_b visually-hidden" id="{{$student->name}}_stock" name="valid">
                                    <section class="valid_box">
                                        <div class="valid_box_in">
                                            <h3>Confirmation</h3>
                                            <p> Informer {{$student->name}} que sa commande est disponnible. Le stoque pour la valisation de cette commande est suffistant </p>

                                            <div class="flex">
                                                <label for="{{$student->name}}_stock" class="cta f_btn">Annuler</label>
                                                <form action="/order/avalible" method="post">
                                                    @csrf
                                                    <input type="hidden" value="{{$student->id}}" name="user_id">
                                                    <button class="cta hcta f_btn">Confirmer la disponibilitée</button>
                                                </form>
                                            </div>
                                        </div>
                                    </section>
                                @else
                                    <div class="order-btn_box">
                                        <label class="cta_unactived" for="{{$student->name}}_stock">
                                            Disponnible
                                        </label>
                                    </div>
                                    <input type="checkbox" class="valid_b visually-hidden" id="{{$student->name}}_stock" name="valid">
                                    <section class="valid_box">
                                        <div class="valid_box_in">
                                            <h3>Stoque insuffiant</h3>
                                            <p> Les stoques disponnibles ne sont pas suffisant pour valider cette commande. </p>

                                            <div class="flex">
                                                <label for="{{$student->name}}_stock" class="cta f_btn">Annuler</label>
                                            </div>
                                        </div>
                                    </section>
                                @endif

                            @elseif($order->statu_id == 4)
                                <p class="order-list_order-stat">Commande a récupérer</p>

                                <p class="student_no_order">{{$student->name}} Doit Vennur recupérer sa commande</p>
                                <div class="order-btn_box">
                                    <label class="cta hcta" for="{{$student->name}}_stock">
                                        Commande récupérée
                                    </label>
                                </div>
                                <input type="checkbox" class="valid_b visually-hidden" id="{{$student->name}}_stock" name="valid">
                                <section class="valid_box">
                                    <div class="valid_box_in">
                                        <h3>Confirmation</h3>
                                        <p> Informer {{$student->name}} que sa commande est disponnible. Le stoque pour la valisation de cette commande est suffistant </p>

                                        <div class="flex">
                                            <label for="{{$student->name}}_stock" class="cta f_btn">Annuler</label>
                                            <form action="/order/finished" method="post">
                                                @csrf
                                                <input type="hidden" value="{{$student->id}}" name="user_id">
                                                <button class="cta hcta f_btn">Confirmer la disponibilitée</button>
                                            </form>
                                        </div>
                                    </div>
                                </section>

                            @elseif($order->statu_id == 5)
                                <p class="order-list_order-stat">Commande finie</p>

                                <p class="student_no_order">{{$student->name}} Est en Ordre pour cette année! </p>
                            @else
                                <p>Pas de commande pour le moment</p>
                            @endif

                            @if($order)
                                {{-- A une commande --}}
                            @else
                                <p class="student_no_order">{{$student->name}} N'ai pas de Commande en cours :D </p>
                            @endif


                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>



        {{ $students->links() }}


        {{-- Une nouvelle année --}}

        <div>
            <label class="cta hcta new_year_btn" for="new_year">
                Commencer une nouvelle année
            </label>
            <input type="checkbox" class="valid_b visually-hidden" id="new_year" name="valid">
            <section class="valid_box">
                    <div class="valid_box_in">
                        <h3>Acction Irréversible!</h3>
                        <p>Attention! Cette action recommancera une nouvelle année et archivera TOUTES les commandes en cours.</p>

                        <div class="flex">
                            <label for="new_year" class="cta f_btn">Annuler</label>
                            <form action="/reset" method="post">
                                @csrf
                                <button class="cta hcta f_btn">archiver</button>
                            </form>
                        </div>
                    </div>
            </section>
        </div>
    </section>
</div>





