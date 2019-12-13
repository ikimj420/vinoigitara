@forelse($chordsSongs as $chordsSong)
    @empty
@endforelse
    <form action="/chordsSong/{!! $chordsSong->song_id !!}" method="post">
        @csrf
        @method("delete")
        <button class="btn btn-danger" type="submit">Delete All Chords For Song</button>
    </form>

