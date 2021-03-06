<div>
    {{-- The whole world belongs to you --}}

    <main class="main">
        <div class="search_bar_contener">
            <form action="#">
                <input wire:model.debounce.500ms="search" type="text" class="search_bar" placeholder="Rechercher étudient ou groupe">
                <button class="search_button"><img src="../img/search.svg" alt="" class="search"></button>
            </form>
        </div> 


        <div class="students">
            @foreach($students as $student)
            <div class="students_contener">
                <img src="{{ asset('../img/avatar.jpg') }}" class="pp students_pp"  alt="">
                <div class="student_view_contener">
                    <div class="students_user_name_contener">
                        <a href="#" class="students_user_name">{{$student->name}}</a>
                        <p>{{$student->group}}</p>
                    </div>
                    <p>Commande</p>

                    @if($student->order->statu_id == 4)
                            <p class="student_finished_order">{{$student->name}} a fini sa commande de cette année</p>
                        @endif
                        @if($student->order->statu_id == 5)
                            <p class="student_no_order">{{$student->name}} n'a pas de commande en cours</p>
                        @endif
                        <div class="student-order-contener">


                            @foreach($student->order->books as $book)
                                <div>
                                <img src="{{ asset('../img/book_cover.jpg') }}" alt="" class="student-order-cover">
                                </div>
                            @endforeach

                        @if(!$student->order->books)
                        @endif
                        </div>

                        @if($student->order->statu_id == 1)
                            <p class="student_no_order">La commande doit être payé</p>

                            <form action="">
                                <button class="cta hcta book_component_link">
                                    A payer
                                </button>
                            </form>
                        @endif


                        @if($student->order->statu_id == 2)
                            <p class="student_no_order">En attente de Stoque</p>
                        @endif

                        @if($student->order->statu_id == 3)
                            <p class="student_no_order">Doit venir récupérer la commande</p>

                            <form action="">
                                <button class="cta hcta book_component_link">
                                    A récupèrer
                                </button>
                            </form>
                        @endif


    
                </div>
            </div>

            
            @endforeach
        </div>



        {{ $students->links() }}
</div>





