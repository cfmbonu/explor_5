@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a href="/sections/create" class="btn btn-primary mt-4 mb-2">Create New Section</a>

                    <a href="/responses/show" class="btn btn-primary mt-4 mb-2">View Responses</a>

                    <a class="btn btn-primary mt-4 mb-2" href="/explor5">Preview Survey</a>

                    <a class="btn btn-primary mt-4 mb-2" href="/responses/generate_report/all">Generate Reports</a>

                    {{-- <a class="btn btn-dark" href="/explor5/{{ $section->id }}-{{ Str::slug($section->title) }}">Take Survey</a> --}}

                </div>
            </div>

            <div class="card mt-4">
                <div class="card-header bg-primary text-white">
                    <div>
                        <legend>My Sections</legend>
                    </div>

                    <div>
                        <small class="font-weight-bold">Survey Url</small>

                        <p>
                            <a href="{{ url('/explor5') }}" class="text-white">
                                {{ url('/explor5') }}
                            
                            </a>
                        </p>
                    </div>
                </div>

                <div class="card-body">

                    <ul class="list-group">
                        @foreach ($sections as $section)
                            <li class="list-group-item">
                                {{-- Let's you edit a section --}}
                                <a href="{{ $section->path() }}">{{ $section->title }}</a>

                                <div class="mt-2">

                                    {{-- Let's you take the survey section --}}
                                    
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
