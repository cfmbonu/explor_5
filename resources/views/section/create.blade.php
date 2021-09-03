@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center ">
        <div class="col-md-8">
            <div class="card ">
                <div class="card-header">Create New Section</div>

                <div class="card-body">
                    <form action="/sections" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="title">Title</label>
                        <input name="title" type="text" class="form-control" id="title" aria-describedby="titleHelp" placeholder="Enter Title">
                        <small id="titleHelp" class="form-text text-muted">Give your section a meaningful title.</small>
                        @error('title')
                            <small class="text-danger">{{ $message }}</small>

                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="purpose">Goal/Purpose</label>
                        <input name="purpose" type="text" class="form-control" id="title" aria-describedby="titleHelp" placeholder="Enter Purpose">
                        <small id="purposeHelp" class="form-text text-muted">Provide some information of what you hope to achieve from this section.</small>

                        @error('purpose')
                            <small class="text-danger">{{ $message }}</small>

                        @enderror
                    </div>

                    <div class="form-group" >
                        {{-- @error('responses.' . $key . '.answer_id')
                            <small class="danger">{{ $message }}</small>
                        @enderror --}}
            
                        <label for="hasOptions">Does this section have options?</label>    
                        <ul class="list-group">
                        
                            {{-- Adding this labels help to easily tap and make a choice --}}
                            <label for="yes">
                                <li class="list-group-item">
            
                                    <input type="radio" name="hasOptions" id="yes" class="mr-2" value="Yes">
                                    
                                    {{ 'Yes' }}
                                    </li>
                            </label>
                        
                            <label for="no">
                                <li class="list-group-item">
            
                                    <input type="radio" name="hasOptions" id="no" class="mr-2" value="No">
                                    {{ 'No' }}
                                    </li>
                            </label>
                        </ul>
                        
                        @error('hasOptions')
                            <small class="text-danger">'Please select an option above.'</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Create Section</button>
                      
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
