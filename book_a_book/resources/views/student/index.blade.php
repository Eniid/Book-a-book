@extends('_layout.layout')

<!-- Titre de la page -->



<!-- Contenu de la page -->

@section('content')


    <header class="aside">
        <h1><img src="{{ asset('../img/logo.svg') }}" alt=""></h1>

        <div class="profil">
            <img src="{{ asset('../img/avatar.jpg') }}" class="pp"  alt="">
            <span class="user_name">{{ Auth::user()->name }}</span>
            <a href="#" class="user_profil">profil</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" >
                @csrf
                <input type="submit" class="deco" value="Deconexion">
            </form>
        </div>


        <input type="checkbox" id="nav" class="nav_input visually-hidden">
            <div class="nav_control">
                <label for="nav" class="nav_lab"><span class="open_nav"><img src="{{ asset('../img/menu.png') }}" alt="open"></span><span class="close_nav"><img src="{{ asset('../img/x.png') }}" alt="close"></span></label>
            </div>
        <div class="mobile">
            <nav class="nav">
                <ol>
                    @foreach($blocs as $b)
                    <li><a href="?bloc={{$b->id}}" class="nav_link @if($b->id == $bloc_id) nav_focused @endif">{{$b->bloc}}</a></li>
                        
                    @endforeach
                </ol>
            </nav>

            <section class="feedback">
                <h2>Votre commende</h2>
                <p class="no_feedback_p">Vous n’avez pas encore ajouter de livre à votre commande.</p>
            </section>
        </div>

    </header>







    <!-- Contenu de la page -->


    <main class="main">
        <section class="requierd_books">
            <h2>Obligatoire</h2>
            <p>Les livres obligatoires sont des livres que vous devez nécessairement vous procurer pour vos cours. Cela dit, rien ne vous empêche de vous les procurer par cous même. </p>
            


            <div class="display_books">


                @foreach($bloc->books as $book)
                    @if($book->required == 1)
                    <section class="book_component_store">
                        <div class="book_component_img_contener">
                            <img src="{{ asset('../img/book_cover.jpg') }}" alt="">
                        </div>
                        <div class="book_component_img">
                            <h3 class="book_title">{{$book->title}}</h3>
                            <span class="book_autor">{{$book->author}}</span> | 
                            <span class="book_edition">{{$book->edition}}</span>
                            <p class="book_shcool_info">Le livre est obligatoir pour le coure de {{$book->class}} du proffesseur {{$book->teacher}}.</p>
                            <span class="price">{{$book->school_price}}</span ><span class="old_price">{{$book->store_price}}</span>
                            <a href="{{$book->link}}" class="cta hcta book_component_link">Voir sur Amazone</a>
                            <form action="/" method="post">
                                @csrf
                                <input type="hidden" value="{{$book->id}}" name="book_id">
                                <button class="add book_component_add"><img src="{{ asset('../img/add.svg') }}" alt=""></button>

                            </form>
                        </div>
                    </section>
                    @endif
                @endforeach
            </div>
            
            
        </section>

        <section class="facultativ_books">
            
        <h2>Facultative</h2>
            <p>Livres conseillée par vos professeur, mais pas obligatoires. </p>
            
            <div class="display_books">

                @foreach($bloc->books as $book)
                    @if($book->required == 0)
                    <section class="book_component_store">
                        <div class="book_component_img_contener">
                            <img src="{{ asset('../img/book_cover.jpg') }}" alt="">
                        </div>
                        <div class="book_component_img">
                            <h3 class="book_title">{{$book->title}}</h3>
                            <span class="book_autor">{{$book->author}}</span> | 
                            <span class="book_edition">{{$book->edition}}</span>
                            <p class="book_shcool_info">Le livre est facultatif pour le coure de [nom du cours] du proffesseur [nom du professeur].</p>
                            <span class="price">15.00€</span ><span class="old_price">15.00€</span>
                            <a href="#" class="cta hcta book_component_link">Voir sur Amazone</a>
                            <form action="/" method="post">
                                @csrf
                                <input type="hidden" value="{{$book->id}}" name="book_id">
                                <button class="add book_component_add"><img src="{{ asset('../img/add.svg') }}" alt=""></button>

                            </form>
                        </div>
                    </section>
                    @endif
                @endforeach
            </div>

        </section>
    </main>
@endsection
