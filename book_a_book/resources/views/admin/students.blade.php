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
                    <li><a href="/admin" class="nav_link">Dashbord</a></li>
                    <li><a href="/admin/students" class="nav_link nav_focused">Etudients</a></li>
                    <li><a href="/admin/books" class="nav_link">Livres</a></li>
                </ol>
            </nav>

            <section class="feedback">
                <h2>Statistiques</h2>
                <p class="no_feedback_p"><b>10</b> commendes sont en cours</p>
                <p class="no_feedback_p"><b>10</b> on été payer</p>
            </section>
        </div>
    </header>



    <livewire:students />





    </main>
    
@endsection
