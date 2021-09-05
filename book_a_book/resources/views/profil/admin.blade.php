
   @php
            $layout = '_layout.student';

        if (Auth::user()->is_admin == 1){
            $layout = '_layout.admin';
       }
   @endphp


   @extends($layout)


   <!-- Titre de la page -->
   @section('title')
   Profil :
   @endsection


   <!-- Contenu de la page -->
   @section('content')


   <div class="profil-edit_box">
       <form action="/admin/profil" method="post" class="main_form profil_form" enctype="multipart/form-data">
           <div class="">

                   @csrf
                   <label class="profil-edit_box_avatar" for="profil">
                       <img src="
                           @if (Auth::user()->img)
                               /{{Auth::user()->img}}
                           @else
                                       {{'https://eu.ui-avatars.com/api/?name=' . urlencode(Auth::user()->name) . '&size=120&background=aa0202&color=ffffff'}}
                           @endif
                           " alt="" class="pp_edit">
                   </label>
                   <input type="file" name="profil" id="profil" class="profil_pic_edit">
                   @error('profil')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
                   @enderror

                   <label for="name" class="">Nom</label>
                   <input type="text" name="name" id="name" class="form-control" value="{{Auth::user()->name}}">
                   @error('name')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
                   @enderror


                   <label for="group" class="">Groupe</label>
                   <input type="text" name="group" id="group" class="form-control" value="{{Auth::user()->group}}">
                   @error('group')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
                   @enderror

                   <label for="mail" class="">Email</label>
                   <input type="text" name="mail" id="mail" class="form-control" value="{{Auth::user()->email}}">
                   @error('mail')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
                   @enderror

                   <label for="password" class="">Nouveau mot de Passe</label>
                   <input type="text" name="password" id="password" class="form-control">
                   @error('password')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
                   @enderror

                   <label for="password_confirmation" class="">Confirmer le mot de passe</label>
                   <input type="text" name="password_confirmation" id="password_confirmation" class="form-control">
                   @error('password_confirmation')
                   <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                   </span>
                   @enderror



                   @if (Auth::user()->is_admin == 1)
                   <label for="be" class="">Compte en Banc Pour les Payrements</label>
                   <input type="text" name="be" id="be" class="form-control" value="{{Auth::user()->be}}" >

                   <label for="dispo" class="">Heure de Disponibilités</label>
                   <textarea name="dispo" id="dispo" class="form-control">{{ Auth::user()->visit_time }}</textarea>
                   @endif


                   <button class="hcta cta form_cta">
                       Modifier mon Profil
                   </button>

           </div>
       </form>
   </div>


   @endsection
