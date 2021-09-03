@extends('layouts.app')


@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
          

          <label for="emailSearch" class="text-center"><h2 >Enter the participant email address to perform a search.</h2></label>


          <div class="d-flex p-2 justify-content-center">

            <form action="/responses/search">
              
              <input class="p-2 m-2" type="text " placeholder="Search.." name="emailSearch">
              
              <button class="btn btn-primary" type="submit">Search</button>

              <a class="btn btn-primary" href="/responses/show/all">Show All</a>



            </form>
          </div>
          @error('emailSearch')
            <small class="text-danger d-flex justify-content-center">Please enter an email address to perform your search.</small>
          @enderror

          <div class="card mt-4">
            <div class="card-header  bg-primary text-white">
              <div class="row justify-content-between p-3">
                <div >
                  Search Results
                </div>
  
                <div>
                  <a class="btn btn-light" href="/responses/generate_report/all">Download All Reports</a>
                </div>
              </div>
            
            </div>

            <div class="card-body">

              @if (isset($participantsFound) )

                @foreach ( $participantsFound  as $key => $participant )

                  <div class="col">
                    <div class="card-body row justify-content-sm-between">

                      <div>
                        <div>
                          <strong class="mr-4">
                            {{ $key + 1 }}
                          </strong>
                        
                          <strong>{{ $participant->name }}</strong>
                        </div>
                        
                      </div>
  
                      <div>
                        <a class="btn btn-primary" href="/responses/show/{{ $participant->id }}">View Response</a>
                      </div>
                    </div>

                    <div class="card-body row justify-content-sm-between">
                      <div>
                        <p class="font-italic text-secondary">Recorded: {{ $participant->created_at->format('Y-m-d') }}</p>
                      </div>

                      <div>
                        <a class="btn btn-primary" href="/responses/generate_report/{{ $participant->id }}">Download Report</a>
                      </div>
                    </div>

                    
                  </div>

                  <hr>
                @endforeach

                
              @endif


            </div>
        </div>
        </div>
    </div>
</div>
@endsection
