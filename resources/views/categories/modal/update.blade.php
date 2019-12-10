<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#update">
    Update Category
</button>
<!-- Modal -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form method="post" action="/category/{!! $category->id !!}" id="update" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="modal-header">
                    <h5 class="modal-title" id="Title">Update Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name" class="col-form-label">Name</label>
                        <input type="text" name="name" class="form-control" required value="{!! $category->name !!}">
                    </div>
                    <div class="form-group">
                        <label for="desc" class="col-form-label">Description</label>
                        <input type="text" name="desc" class="form-control" required value="{!! $category->desc !!}">
                    </div>
                    <div class="form-group">
                        <label for="pics" class="col-form-label">Cover Image</label>
                        <input type="file" name="pics" class="form-control">
                        @if(!empty($category->pics))
                            <div class="image-wrap">
                                <img src="{!! $category->categoryPics() !!}" alt="{!! $category->name !!}" class="rounded img-fluid image image-2 image-full" style="width: 15%;">
                            </div>
                        @endif
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close <i class="ion-ios-close"></i></button>
                    <button type="submit" class="btn btn-success">Update <i class="ion-ios-save"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
