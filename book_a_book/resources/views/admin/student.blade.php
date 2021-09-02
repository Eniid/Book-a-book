@extends('_layout.admin')


<!-- Titre de la page -->



<!-- Contenu de la page -->
@section('content')


<div class="profil-edit_box">
    <form action="/profil" method="post" class="main_form profil_form">
        <div class="">

                @csrf

                <div class="profil-edit_box_avatar" for="profil">
                    <img src="
                            @if ($user->img)
                            /{{ $user->img }}
                            @else
                                    {{'https://eu.ui-avatars.com/api/?name=' . urlencode($user->name) . '&size=120&background=aa0202&color=ffffff'}}
                            @endif
                        " alt="" class="pp_edit">
                </div>


                {{ $user->name }}


                // Mes anciennes commandes icic!

        </div>
    </form>
</div>


@endsection
