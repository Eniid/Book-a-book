@extends('_layout.layout')

<!-- Titre de la page -->

@section('title')
Editer om du livre | 
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
                    <li><a href="/admin/students" class="nav_link">Etudients</a></li>
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


    <main class="main">
    <div class="book_edit">
    <form action="/admin/books" method="post" enctype="multipart/form-data">
        @csrf
            <label for="title" class="visually-hidden">Titre</label>
            <input type="text" name="title" id="title" value="{{ old('title') }}" onkeypress="this.style.width = ((this.value.length + 1) * 20) + 'px'" class="edit_book_title" placeholder="Ajouter un titre">
            <img src="{{ asset('../img/edit_black.svg') }}" alt="" class="edit_black">

            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <div class="book_from_contener">
                <div class="cover_contener">
                <img src="{{ asset('../img/book_cover.jpg') }}" alt="">
                <input type="file" name="img" id="img" class="cover_edit" >
                <img src="{{ asset('../img/edit_black.svg') }}" alt="" class="edit_pic">
                </div>
                <div class="main_form">
                    


                <fieldset class="book_edit_book_info">

                    <label for="auth" class="">Auteur</label>
                    <input type="text" name="auth" id="auth" class="form-control " placeholder="ex : George R.R. Martin" value="{{ old('auth') }}">
                    @error('auth')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <label for="edition" class="">Edition</label>
                    <input type="text" name="edition" id="edition" class="form-control " placeholder="ex : Galillimar" value="{{ old('edition') }}">
                    @error('edition')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <label for="isbn" class="isbn">ISBN</label>
                    <input type="text" name="isbn" id="title" class="form-control " placeholder="ex : je sais pas à quoi ça resemble" value="{{ old('isbn') }}">
                    @error('isbn')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror


                    <label for="link" class="isbn">Liens vers Amazone</label>
                    <input type="text" name="link" id="link" class="form-control " placeholder="ex : http://amazone.com" value="{{ old('link') }}">
                    @error('link')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="requ" class="isbn">Obligatoire</label>
                    <input type="checkbox" name="requ" id="requ" class="form-control"  value="{{ old('requ') }}">


                </fieldset>

                <fieldset class="book_edit_scool_info">
                    <label for="class" class="">Classe</label>
                    <input type="text" name="class" id="class" class="" placeholder="ex : Typographie et misse en page" value="{{ old('class') }}">
                    @error('class')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="prof" class="">Professeur</label>
                    <input type="text" name="prof" id="prof" class="edit_book_input" placeholder="ex : Xavier Spirlet" value="{{ old('prof') }}">
                    @error('prof')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="bloc" class="">Bloc</label>
                    <select id="bloc" name='bloc'>
                        @foreach($blocs as $bloc)
                        <option value="{{$bloc -> id}}" >{{$bloc -> bloc}}</option>
                        @endforeach
                    </select>
                    @error('bloc')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="school_price">Prix</label>
                    <input type="text" name="school_price" id="school_price" class="form-control" placeholder="ex : 15,30" value="{{ old('school_price') }}">
                    @error('school_price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="store_price">Prix d'origine</label>
                    <input type="text" name="store_price" id="store_price" class="form-control" placeholder="ex : 15,90" value="{{ old('store_price') }}">
                    @error('store_price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <label for="stock">Nombre de livre en Stoque</label>
                    <input type="text" name="stock" id="stock" class="form-control" class="stock" placeholder="ex : 3" value="{{ old('stock') }}">
                    @error('stock')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                </fieldset>

                </div>

            </div>
                <input type="submit" name="" id="" class="hcta cta form_cta book_cta" value="Sauvgarder">
            
        </form>

    </div>






    </main>
    
@endsection
