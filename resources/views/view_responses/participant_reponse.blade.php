@extends('layouts.app')

@section('content')
    
    <div class="container">

        <h1 class="align-items-center">Survey Results</h1>

        <div class="card m-4">
            <div class="card-header bg-primary text-white"><h2>Participant Details</h2></div>
            <div class="card-body ">
                <div class="row m-2">
                    <h4 class="font-weight-bold mr-5">Name</h4>
                    <h4 class="ml-5 text-secondary">{{ $data['participant']->name }}</h4>
                </div>
                <hr>
                <div class="row m-2">
                    <h4 class="font-weight-bold mr-5">Email</h4>
                    <h4 class="ml-5 text-secondary">{{ $data['participant']->email }}</h4>
                </div>
                <hr>
                <div class="row m-2"> 
                    <h4 class="font-weight-bold mr-5">Age</h4>
                    <h4 class="mr-3"></h4>
                    <h4 class="ml-5 text-secondary">{{ $data['participant']->age }}</h4>
                </div>
                <hr>
                <div class="row m-2">
                    <h4 class="font-weight-bold mr-4">Gender</h4>
                    <h4 class="ml-5 text-secondary">{{ $data['participant']->gender }}</h4>
                </div>
            </div>
        </div>

        <div class="card m-4">
            <div class="card-header bg-primary text-white"><h2>Sections</h2></div>
            @foreach ($data['sections'] as $section)
                <div class="card m-4 pd-4">
                    <div class="card-header bg-dark text-white">
                        <h3>{{ $section->title }}</h3>
                    </div>

                    <div class="card-body">
                        @foreach ($section['questions'] as $question)
                            <div class="card m-4">

                                <div class="card-header ">
                                    <h5>{{ $question->question }}</h5>
                                </div>
            
                                @if ($section->id == 1)
                                    <div class="card-body">
                                        <h4>Response:</h4>
                                        <h5 class="text-primary">

                                            {{-- We check the ids of the questions and add the response to each question accordingly --}}
                                            {{-- This is not the right thing to do at this point but will surely be improved in the future --}}   
                                            @if ($question->id == 1)
                                                {{ $question['response']->days_active }}
                                            @elseif($question->id == 2)
                                                {{ $question['response']->mins_active }}
                                            @else

                                                {{ $question['response']->activities }}
                                            @endif
                                        
                                        </h5> 
                                    
                                    </div>
                                @else
                                <div class="card-body">
                                    <h4>Response:</h4>
                                    <h5 class="text-primary">{{ $question['response']->choiceString }}</p> 
                                </div>
                                @endif
                            </div>

                        @endforeach
                    </div>

                </div>
                <hr>
            @endforeach
        </div>
    </div>

@endsection