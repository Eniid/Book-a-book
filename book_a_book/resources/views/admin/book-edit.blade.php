@extends('_layout.admin')

<!-- Titre de la page -->

@section('title')
Editer livre :
@endsection

<!-- Contenu de la page -->

@section('content')


    <div class="book_edit">
        <form action="/admin/books" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
                <label for="title" class="visually-hidden">Titre</label>
                <input type="text" name="title" id="title" onkeypress="this.style.width = ((this.value.length + 1) * 20) + 'px'" class="edit_book_title" value="{{$book->title}}">
                <img src="{{ asset('../img/edit_black.svg') }}" alt="" class="edit_black">

                <div class="book_from_contener">
                    <div class="cover_contener">
                        <img src="
                        @if ($book->img)
                            /{{$book->img}}
                        @else
                            {{ asset('../img/book_cover.jpg') }}
                        @endif
                        " title="{{ $book->name }}" class="student-order-cover">
                    <input type="file" name="img" id="img" class="cover_edit" >
                    <img src="{{ asset('../img/edit_black.svg') }}" alt="" class="edit_pic">
                    </div>
                    <div class="main_form">



                    <fieldset class="book_edit_book_info">

                        <label for="auth" class="">Auteur</label>
                        <input type="text" name="auth" id="auth" class="form-control " value="{{$book->author}}">

                        <label for="edition" class="">Edition</label>
                        <input type="text" name="edition" id="edition" class="form-control " value="{{$book->edition}}">

                        <label for="isbn" class="isbn">ISBN</label>
                        <input type="text" name="isbn" id="title" class="form-control " value="{{$book->isbn}}">

                        <label for="link" class="isbn">Liens vers Amazone</label>
                        <input type="text" name="link" id="link" class="form-control " value="{{$book->link}}">


                        <label for="requ" class="isbn">Obligatoire</label>
                        <input type="checkbox" name="requ" id="requ" class="form-control"  value="1"
                            @if ($book->required)
                            checked
                            @endif>


                    </fieldset>

                    <fieldset class="book_edit_scool_info">
                        <label for="class" class="">Classe</label>
                        <input type="text" name="class" id="class" class="" value="titre">

                        <label for="prof" class="">Professeur</label>
                        <input type="text" name="prof" id="prof" class="edit_book_input" value="auter">

                        <label for="bloc" class="">Bloc</label>
                        <select id="bloc" name='bloc'>
                            @foreach($blocs as $bloc)
                            <option value="{{$bloc -> id}}" >{{$bloc -> bloc}}</option>
                            @endforeach
                        </select>


                        <label for="school_price">Prix</label>
                        <input type="number" name="school_price" id="school_price" class="form-control" value="{{$book->school_price}}">

                        <label for="store_price">Prix d'origine</label>
                        <input type="number" name="store_price" id="store_price" class="form-control" value="{{$book->store_price}}">

                        <label for="stock">Nombre de livre en Stoque</label>
                        <input type="number" name="stock" id="stock" class="form-control" class="stock" value="{{$book->stock}}">

                        <input type="hidden" value="{{$book->id}}" name="book_id">

                    </fieldset>

                    </div>

                </div>
                <div class="form_btn-box">
                    <input type="submit" name="" id="" class="hcta cta form_cta book_cta" value="Sauvgarder">
                </div>

            </form>



        @if($book->orders->isEmpty())
        <label class="cta hcta" for="del" class="cta form_cta supr_book_form">
            Supprimer
        </label>
        <input type="checkbox" class="valid_b visually-hidden" id="del" name="valid">
        <section class="valid_box">
            <div class="valid_box_in">
                <h3>Acction Irréversible!</h3>
                <p>Cette acction va supprimer le livre définitivement.</p>

                <div class="flex">
                    <label for="del" class="cta f_btn">Annuler</label>
                    <form action="/admin/del/book" method="post">
                        @csrf
                        <input type="hidden" value="{{$book->id}}" name="del_id">
                        <button class="cta hcta f_btn">Suprimer</button>
                    </form>
                </div>
            </div>
        </section>
        @else
        <label for="del" class="cta_unactived">
            Supprimer
        </label>
        <input type="checkbox" class="valid_b visually-hidden" id="del" name="valid">
        <section class="valid_box">
            <div class="valid_box_in">
                <h3>Supression impossible ! </h3>
                <p>Il y a des commandes en cours pour se livre, il est donc impossible pour le moment de le supprimer.</p>
                <label for="del" class="cta f_btn">Annuler</label>
            </div>
        </section>
        @endif






    </main>

@endsection
