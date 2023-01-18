@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    </div>
            </div>
        
            <div class="col-md-12">
                <div class="card text-center">
                    <a class="btn btn-block btn-success" href="{{ route('students.index') }}">Dashboard Students</a>
             
            </div>
        </div>
    </div>
</div>
@endsection
