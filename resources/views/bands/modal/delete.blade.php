<form action="/band-artist/{!! $band_artist->id !!}" method="post">
    @csrf
    @method("delete")
    <button class="btn btn-danger" type="submit">Delete Band</button>
</form>
