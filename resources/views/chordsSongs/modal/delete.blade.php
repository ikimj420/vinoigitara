<form action="/chordsSong/{!! $chordsSong->id !!}" method="post">
    @csrf
    @method("delete")
    <button class="btn btn-danger" type="submit">Delete All Chords For Song</button>
</form>
