<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add">
    Add New Chords For Song
</button>
<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <form method="post" action="{{ action('ChordsSongsController@store') }}" id="add" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="Title">Add Chords For Song</h5>
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
                                <option value="{{ $song->id }}">{{ $song->title }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="chord_id[]">Select Chord</label>
                        <select name="chord_id[]" class="form-control" id="chord_id[]">
                            <option value="">Select Chord</option>
                            @foreach ($chords as $chord)
                                <option value="{{ $chord->id }}">{{ $chord->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="field_wrapper">
                        <a href="javascript:void(0);" class="add_button" title="Add field"><img src="{!! asset('/storage/images/plus.svg') !!}"/></a>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close <i class="ion-ios-close"></i></button>
                    <button type="submit" class="btn btn-success">Create <i class="ion-ios-save"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        var maxField = 15; //Input fields increment limitation
        var addButton = $('.add_button'); //Add button selector
        var wrapper = $('.field_wrapper'); //Input field wrapper
        var fieldHTML = '<div> <select name="chord_id[]" class="form-control" id="chord_id[]">\n' +
            '                            <option value="">Select Chord</option>\n' +
            '                            @foreach ($chords as $chord)\n' +
            '                                <option value="{{ $chord->id }}">{{ $chord->name }}</option>\n' +
            '                            @endforeach\n' +
            '                        </select><a href="javascript:void(0);" class="remove_button"><img src="/storage/images/minus.svg"/></a></div>'; //New input field html
        var x = 1; //Initial field counter is 1

        //Once add button is clicked
        $(addButton).click(function(){
            //Check maximum number of input fields
            if(x < maxField){
                x++; //Increment field counter
                $(wrapper).append(fieldHTML); //Add field html
            }
        });

        //Once remove button is clicked
        $(wrapper).on('click', '.remove_button', function(e){
            e.preventDefault();
            $(this).parent('div').remove(); //Remove field html
            x--; //Decrement field counter
        });
    });
</script>
