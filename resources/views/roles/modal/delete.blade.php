<form action="/role/{!! $role->id !!}" method="post">
    @csrf
    @method("delete")
    <button class="btn btn-danger" type="submit">Delete Role</button>
</form>
