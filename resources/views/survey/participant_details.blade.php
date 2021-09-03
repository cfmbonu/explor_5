@extends('layouts.survey')

@section('surveyContent')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form action="/explor5/participant_details/save" method="POST">
                    @csrf

                    <div class="card mt-4">
                        <div class="card-header bg-primary text-white">Your Information</div>
                
                        <div class="card-body">
                
                            <div class="form-group">
                                <label for="name">Your Name</label>
                                <input name="name" type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Enter Name">
                                <small id="nameHelp" class="form-text text-muted">Please enter your name here.</small>
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                
                            <div class="form-group" >
                                <label for="email">Your Email</label>
                                <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter Email">
                                <small id="emailHelp" class="form-text text-muted">Please, input your email address. This field is optional.</small>
                
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                
                                @enderror
                            </div>
                
                            <div class="form-group">
                                <label for="age">Age</label>
                                <input name="age" type="number" min="1" class="form-control" id="age" aria-describedby="ageHelp" placeholder="Enter Age">
                                <small id="ageHelp" class="form-text text-muted">Please, input your age.</small>
                
                                @error('age')
                                    <small class="text-danger">{{ $message }}</small>
                
                                @enderror
                            </div>
                
                            <div class="form-group" >
                
                                <label for="gender">Gender</label>    
                                <ul class="list-group">
                                
                                    {{-- Adding this labels help to easily tap and make a choice --}}
                                    <label for="female">
                                        <li class="list-group-item">
                
                                            <input type="radio" name="gender" id="female" class="mr-2" value="Female">
                                            
                                            {{ 'Female' }}
                                            </li>
                                    </label>
                                
                                    <label for="male">
                                        <li class="list-group-item">
                
                                            <input type="radio" name="gender" id="male" class="mr-2" value="Male">
                                            {{ 'Male' }}
                                            </li>
                                    </label>

                                    @error('gender')
                                        <small class="text-danger">{{ 'Please select a gender' }}</small>
                                    @enderror
                
                                </ul>

                                <div class="d-flex align-content-end">
                                    <button class="btn btn-primary" type="submit">Start Survey</button>

                                </div>


                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
