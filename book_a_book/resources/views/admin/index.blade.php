@extends('_layout.layout')

<!-- Titre de la page -->

@section('title')
register
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
                <li><a href="Bac 1" class="nav_link nav_focused">Dashbord</a></li>
                <li><a href="Bac 1" class="nav_link">Etudients</a></li>
                <li><a href="Bac 1" class="nav_link">Livres</a></li>
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
            <a href="" class="filter_button">{{$bloc->bloc}}</a>
        @endforeach
        </div>

        <div class="no_order">
            <p class="no_order_text">
                Il n'y aucunes commandes en cours.
            </p>


            </form>

            <form action="">
                <button class="hcta cta form_cta">Commencer une nouvelle année</button>
            </form>
            
        </div>

    </main>
    
@endsection
