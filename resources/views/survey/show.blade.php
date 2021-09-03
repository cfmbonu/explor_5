@extends('layouts.survey')


@section('surveyContent')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>{{ $data['section']->title }}</h1>

                <form action="/explor5/{{ $data['participant']->id }}/{{ $data['section']->id }}-{{ Str::slug($data['section']->title) }}" method="POST">
                @csrf

                @if ($data['section']->id == 4)
                        <strong>Over the next week, how confident are you that you can:</strong>
                @endif
                
                @foreach ($data['section']->questions as $key => $question)
                        <div class="card mt-4">
                            <div class="card-header bg-primary text-white"><strong class="mr-4">{{ $key + 1 }}</strong>{{ $question->question }}</div>

                            @if ($data['section']->id != 1)
                                <div class="card-body" >
                                    @error('responses.' . $key . '.answer_id')
                                        <small class="text-danger">Please provide a response here.</small>
                                    @enderror
                            
                                    <ul class="list-group">
                                        @foreach ($question->answers as $answer )
                                            <label for="answer{{ $answer->id }}">
                                        
                                                <li class="list-group-item">
                            
                                                    <input type="radio" name="responses[{{ $key }}][answer_id]" id="answer{{ $answer->id }}" 
                            
                                                        {{ (old('responses.' . $key . '.answer_id') == $answer->id) ? 'checked' : ''  }}
                                                        class="mr-2" value="{{ $answer->id }}">
                                                    {{ $answer->answer }}
                            
                                                    <input type="hidden" name="responses[{{ $key }}][question_id]" value="{{ $question->id }}">
                                                </li>
                                            </label>
                                        @endforeach
                                    </ul>
                                </div>
                            @else
                                <div class="card-body" >
                                    {{-- @error('responses.' . $key . '.answer_id')
                                        <small class="text-danger">Please provide a response here.</small>
                                    @enderror --}}

                            
                                    @if ($key == 0)
                                        <div class="col-md-7">
                                            @error('days_active')
                                                <small class="text-danger">Please enter the number of days.</small>
                                            @enderror

                                            <label for="days_active" id="days_active">
                                                <strong>Number of Days Active(days)</strong>
                                            </label>
                                
                                            <!-- Input of type 'number' -->
                                            <input type="number"
                                                id="days_active"
                                                name="days_active"
                                                min="0"
                                                placeholder="e.g 5" 
                                                value="{{ old('days_active') }}"/>
                                        </div>
                                        
                                    @elseif ($key == 1) 
                                        <div class="col-md-7">
                                            @error('mins_active')
                                                <small class="text-danger">Please provide the number of minutes.</small>
                                            @enderror

                                            <label for="mins_active" id="mins_active">
                                               <strong> Number of Mins Active(mins)</strong>
                                            </label>
                                
                                            <!-- Input of type 'number' -->
                                            <input type="number" 
                                                name="mins_active"
                                                id="mins_active"
                                                min="0"
                                                placeholder="e.g 120"
                                                value="{{ old('mins_active') }}" />
                                        </div>

                                    @else
                                        <div class="col-md-9">
                                            @error('activities')
                                                <small class="text-danger">Please enter at least one activity or enter "None".</small>
                                            @enderror

                                            <label for="activites">
                                                <strong>
                                                    List each activity using a comma e.g biking, swimming
                                                </strong>
                                            </label>
                                
                                            <!-- multi-line text input control -->
                                            <textarea name="activities" id="activities" rows="5" cols="30"></textarea>

                                        </div>
                                        
                                    @endif
                            
                                </div>
                            @endif

                        </div>
                @endforeach

                <div class="text-right">
                        <button class="btn btn-primary mt-4" type="submit">Next</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection