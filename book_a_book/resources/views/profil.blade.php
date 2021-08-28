

@if (Auth::user()->is_admin === 1)
    @extends('_layout.student')
@else
    @extends('_layout.student')
@endif


<!-- Titre de la page -->



<!-- Contenu de la page -->
@section('content')




@endsection
