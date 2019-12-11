<form action="/chord/{!! $chord->id !!}" method="post">
    @csrf
    @method("delete")
    <button class="btn btn-danger" type="submit">Delete Chord</button>
</form>
