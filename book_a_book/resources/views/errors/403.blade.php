@extends('_layout.error')

<!-- Titre de la page -->

@section('title')
ERROR :
@endsection

<!-- Contenu de la page -->

@section('content')


<div class="error_box">
    <div>
        <div class="the404">403</div>
        <div>
            <p>Oups... Vous n'avez pas acces à cette page</p>
            <a href="/" class="cta hcta">Retour à l'acceuil</a>
        </div>
    </div>
</div>


@endsection
