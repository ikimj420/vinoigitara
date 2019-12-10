<form action="/category/{!! $category->id !!}" method="post">
    @csrf
    @method("delete")
    <button class="btn btn-danger" type="submit">Delete Category</button>
</form>
