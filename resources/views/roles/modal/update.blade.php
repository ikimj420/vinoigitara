<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#update">
    Update Role
</button>
<!-- Modal -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form method="post" action="/role/{!! $role->id !!}" id="update" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="modal-header">
                    <h5 class="modal-title" id="Title">Update Role</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="userLevel" class="col-form-label">User Level</label>
                        <input type="text" name="userLevel" class="form-control" required value="{!! $role->userLevel !!}">
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
