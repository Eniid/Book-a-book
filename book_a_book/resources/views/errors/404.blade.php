@extends('_layout.error')

<!-- Titre de la page -->

@section('title')
ERROR :
@endsection

<!-- Contenu de la page -->

@section('content')


<div class="error_box">
    <div>
        <div class="the404">404</div>
        <div>
            <p>Cette page n'existe pas</p>
            <a href="/" class="cta hcta">Retour à l'acceuil</a>
        </div>
    </div>
</div>


@endsection
