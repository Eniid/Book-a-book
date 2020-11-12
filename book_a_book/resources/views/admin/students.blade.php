@extends('_layout.layout')

<!-- Titre de la page -->

@section('title')
Étudiants | 
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
                <li><a href="Bac 1" class="nav_link nav_focused">Etudients</a></li>
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
                <input type="text" class="search_bar" placeholder="Rechercher un étudient">
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
                    <p>Commande 2020/2021</p>
                    <p class="student_no_order">{{$student->name}} n'a pas de commande en cours</p>
                    
                </div>
            </div>
            
            @endforeach
        </div>





    </main>
    
@endsection
