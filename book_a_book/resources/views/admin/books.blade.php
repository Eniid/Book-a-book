@extends('_layout.layout')

<!-- Titre de la page -->

@section('title')
Livres | 
@endsection

<!-- Contenu de la page -->

@section('content')
    <header class="aside">
        <h1><img src="{{ asset('../img/logo.svg') }}" alt=""></h1>

        <div class="profil">
            <img src="{{ asset('../img/avatar.jpg') }}" class="pp"  alt="">
            <span class="user_name">Xavier Spirler</span>
            <a href="#" class="user_profil">profil</a>
        </div>

        <nav class="nav">
            <ol>
                <li><a href="Bac 1" class="nav_link">Dashbord</a></li>
                <li><a href="Bac 1" class="nav_link">Etudients</a></li>
                <li><a href="Bac 1" class="nav_link nav_focused">Livres</a></li>
            </ol>
        </nav>

        <section class="feedback">
            <h2>Statistiques</h2>
            <p class="no_feedback_p"><b>10</b> commendes sont en cours</p>
            <p class="no_feedback_p"><b>10</b> on été payer</p>
        </section>
    </header>

    <main class="main">
        <div class="search_bar_contener">
            <form action="#">
                <input type="text" class="search_bar" placeholder="Rechercher un livre">
                <button class="search_button"><img src="../img/search.svg" alt="" class="search"></button>
            </form>
        </div> 

        <div class="filter_contener">
        @foreach($blocs as $bloc)
            <a href="#" class="filter_button">{{$bloc->bloc}}</a>
        @endforeach
        </div>

        <div class="display_books">



@foreach($books as $book)
    <section class="book_component_store">
        <div class="book_component_img_contener">
            <img src="{{ asset('../img/book_cover.jpg') }}" alt="">
        </div>
        <div class="book_component_img">
            <h3 class="book_title">{{$book->title}}</h3>
            <span class="book_autor">{{$book->author}}</span> | 
            <span class="book_edition">{{$book->edition}}</span>
            <p class="book_shcool_info">Le livre est [obligatoir/facultatif] pour le coure de {{$book->class}} du proffesseur {{$book->teacher}}.</p>
            <span class="price">{{$book->school_price}}</span ><span class="old_price">{{$book->store_price}}</span>
            <a href="{{$book->link}}" class="cta hcta book_component_link">Voir sur Amazone</a>
                <a class="add book_component_add" href="#"><img src="{{ asset('../img/edit.svg') }}" alt="" class="edit_book"></a>

        </div>
    </section>
@endforeach
</div>

<div class="add_new_book">
    <form action="">
                @csrf
                <input type="hidden" value="book_id">
                <button class="add new_book_button book_component_add"><img src="{{ asset('../img/add.svg') }}" alt=""></button>

            </form>
</div>




    </main>
    
@endsection
