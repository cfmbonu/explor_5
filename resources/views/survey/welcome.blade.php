@extends('layouts.survey')

@section('surveyContent')
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-8 text-center mt-5">

            <div>
                <h1 class="font-weight-bold display-1 mt-5">Explor-5</h1>
            </div>
        
            <div>
                <h2 class="display-4">Welcome to the Explor-5 Survey</h2>
        
                <p class="display-5">When you're ready to start the survey, click the button below and you will be redirected to the survey page.</p>
        
                <div>
                    {{-- <button class="btn btn-primary mt-4" type="submit">Get Started</button> --}}

                    <a href="/explor5/participant_details" class="btn btn-primary px-3">Get Started</a>

                    </div>
        
            </div>
        </div>


    </div>
</div>
@endsection
