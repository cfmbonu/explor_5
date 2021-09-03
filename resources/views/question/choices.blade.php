@section('choices')
    <div class="form-group">
        <fieldset>
            <legend>Choices</legend>

            <small id="choicesHelp" class="form-text text-muted">Give choices that give you the most insight into the question.</small>


            <div>
                <div class="form-group">
                    <label for="answer1">Choice 1</label>
                    <input name="answers[][answer]" 
                        type="text" 
                        class="form-control"
                        id="answer1" 
                        aria-describedby="choicesHelp" 
                        placeholder="Enter Choice 1"
                        value="{{ old('answers.0.answer') }}">

                    @error('answers.0.answer')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>

            <div>
                <div class="form-group">
                    <label for="answer2">Choice 2</label>
                    <input name="answers[][answer]" type="text" 
                        class="form-control" 
                        id="answer2" 
                        aria-describedby="choicesHelp" 
                        placeholder="Enter Choice 2"
                        value="{{ old('answers.1.answer') }}">

                    @error('answers.1.answer')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
            </div>
        </fieldset>
    </div>
@endsection