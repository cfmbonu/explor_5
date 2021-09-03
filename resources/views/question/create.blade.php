@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create New Question</div>

                <div class="card-body">
                    <form action="/sections/{{ $section->id }}/questions" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="question">Question</label>

                        <input name="question[question]" type="text" class="form-control" 
                            id="question" aria-describedby="questionHelp" placeholder="Enter Question" value="{{ old('question.question') }}">

                        <small id="questionHelp" class="form-text text-muted">Be straightforward with your questions.</small>

                        @error('question.question')
                            <small class="text-danger">{{ $message }}</small>

                        @enderror
                    </div>

                    @if ($section->hasOptions == 'Yes')
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
                    @endif

                    <button type="submit" class="btn btn-primary">Add Question</button>

                      
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
