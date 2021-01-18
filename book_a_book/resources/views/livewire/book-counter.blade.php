<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <form action="/" method="post">
        @csrf
        
        <input type="hidden" value="coucou" name="book_id">
        <button class="add book_component_add"><img src="{{ asset('../img/add.svg') }}" alt=""></button>
    </form>
</div>
