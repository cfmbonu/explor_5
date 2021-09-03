@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-8 ">
            <div class="card ">
                <div class="card-header bg-primary text-white">{{ $section->title }}</div>

                <div class="card-body ">
                    <a class="btn btn-primary" href="/home">Home</a>

                    <a class="btn btn-primary" href="/sections/{{ $section->id }}/questions/create">Add New Question</a>

                    <a class="btn btn-primary" href="/explor5/{{ $section->id }}-{{ Str::slug($section->title) }}">Take Section</a>
                </div>
            </div>

            @foreach ($section->questions as $question)
                <div class="card mt-4">
                    <div class="card-header bg-primary text-white font-weight-bold">{{ $question->question }}</div>

                    <div class="card-body" >
                        <ul class="list-group">
                            @foreach ($question->answers as $answer )
                                <li class="list-group-item d-flex justify-content-between">
                                    {{-- {{ $answer->answer }} --}}

                                   <div> {{ $answer->answer }}</div>

                                  {{-- For future addition of percentage of responses for each question choice --}}

                                   {{-- @if ($question->responses->count())
                                        <div> {{ intval(($answer->responses->count() * 100) / $question->responses->count()) }}%</div>
                                   @endif --}}
                                   
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    {{-- Delete Button for a Question --}}
                    <div class="card-footer ">
                        <form action="/sections/{{ $section->id }}/questions/{{ $question->id }}" method="POST">
                            @method('DELETE')
                            @csrf
                                <button type="submit" class="btn btn-sm btn-outline-danger">Delete Question</button>

                                <div>
                                    <small>Note: Deleting this question will delete all the responses attached to it.</small>

                                </div>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
