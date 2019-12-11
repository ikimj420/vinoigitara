<form action="/song/{!! $song->id !!}" method="post">
    @csrf
    @method("delete")
    <button class="btn btn-danger" type="submit">Delete Song</button>
</form>
