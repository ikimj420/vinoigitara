<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#update">
    Update Song
</button>
<!-- Modal -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form method="post" action="/song/{!! $song->id !!}" id="update" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="modal-header">
                    <h5 class="modal-title" id="Title">Update Song</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="band_id">Select Band</label>
                        <select name="band_id" class="form-control" id="band_id">
                            <option value="">Select Band</option>
                            @foreach ($bands as $band)
                                @isset($song->band_id)
                                    @if($band->id == $song->band_id)<option value="{{ $band->id }} " selected >{{ $band->name }}@continue</option>
                                    @endif
                                @endisset
                                <option value="{{ $band->id }}">{{ $band->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title" class="col-form-label">Title</label>
                        <input type="text" name="title" class="form-control" required value="{!! $song->title !!}">
                    </div>
                    <div class="form-group">
                        <label for="video" class="col-form-label">Video</label>
                        <input type="text" name="video" class="form-control" value="{!! $song->video !!}">
                    </div>
                    <div class="form-group">
                        <label for="song" class="col-form-label">Song</label>
                        <textarea name="song" id="song" class="form-control">{!! $song->song !!}</textarea>
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
<script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'song' );
</script>
