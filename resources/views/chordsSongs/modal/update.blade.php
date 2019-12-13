@forelse($chordsSongs as $chordsSong)
@empty
@endforelse
<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#update">
    Update Chords For Song
</button>
<!-- Modal -->
<div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form method="post" action="/chordsSong/{!! $chordsSong->song_id !!}" id="update" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="modal-header">
                    <h5 class="modal-title" id="Title">Update Chords For Song</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="song_id">Select Song</label>
                        <select name="song_id" class="form-control" id="song_id">
                            <option value="">Select Song</option>
                            @foreach ($songs as $song)
                                @isset($chordsSong->song_id)
                                    @if($song->id == $chordsSong->song_id)<option value="{{ $song->id }} " selected >{{ $song->title }}@continue</option>
                                    @endif
                                @endisset
                                <option value="{{ $song->id }}">{{ $song->title }}</option>
                            @endforeach
                        </select>
                    </div>
                @foreach($chordsSongs as $chordsSong)
                <!-- Chord Id Field -->
                    <div class="form-group">
                        <label for="chord_id">Select Chord</label>
                        <div class="clearfix"></div>
                        <select name="{{$chordsSong->id}}chord_id" class="form-control">
                            <option value="">Select Chord</option>
                            @foreach ($chords as $chord)
                                @isset($chordsSong->chord_id)
                                    @if($chord->id == $chordsSong->chord_id)<option value="{{ $chord->id }} " selected >{{ $chord->name }}@continue</option>
                                    @endif
                                    <option value="{{ $chord->id }}">{{ $chord->name }}</option>
                                @endisset
                            @endforeach
                        </select>
                    </div>
                @endforeach
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close <i class="ion-ios-close"></i></button>
                    <button type="submit" class="btn btn-success">Update <i class="ion-ios-save"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
