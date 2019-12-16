<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#update">
    Update Band
</button>
<!-- Modal -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form method="post" action="/band-artist/{!! $band_artist->id !!}" id="update" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="modal-header">
                    <h5 class="modal-title" id="Title">Update Band</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="category_id">Select Category</label>
                        <select name="category_id" class="form-control" id="category_id">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                @isset($band_artist->category_id)
                                    @if($category->id == $band_artist->category_id)<option value="{{ $category->id }} " selected >{{ $category->name }}@continue</option>
                                    @endif
                                @endisset
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-form-label">Name</label>
                        <input type="text" name="name" class="form-control" required value="{!! $band_artist->name !!}">
                    </div>
                    <div class="form-group">
                        <label for="year_start" class="col-form-label">year_start</label>
                        <input type="text" name="year_start" class="form-control" value="{!! $band_artist->year_start !!}">
                    </div>
                    <div class="form-group">
                        <label for="year_end" class="col-form-label">year_end</label>
                        <input type="text" name="year_end" class="form-control" value="{!! $band_artist->year_end !!}">
                    </div>
                    <div class="form-group">
                        <label for="albums" class="col-form-label">Albums</label>
                        <textarea name="albums" id="albums" class="form-control">{!! $band_artist->albums !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="desc" class="col-form-label">Description</label>
                        <textarea name="desc" id="desc" class="form-control">{!! $band_artist->desc !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="pics" class="col-form-label">Cover Image</label>
                        <input type="file" name="pics" class="form-control">
                        @if(!empty($band_artist->pics))
                            <div class="image-wrap">
                                <img src="{!! $band_artist->bandPics() !!}" alt="{!! $band_artist->name !!}" class="rounded img-fluid image image-2 image-full" style="width: 15%;">
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
<script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'albums' );
    CKEDITOR.replace( 'desc' );
</script>
