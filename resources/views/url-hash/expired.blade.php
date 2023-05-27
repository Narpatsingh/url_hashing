@extends('layouts.app')

@section('content')
        <div class="card">
            <div class="card-header">{{ __('Expired URL') }}</div>

            <div class="card-body">
                <div class="alert alert-danger">
                    <h4 class="alert-heading">{{ __('This URL has expired.') }}</h4>
                    <p>{{ __('Sorry, the URL you are trying to access has expired.') }}</p>
                </div>
                <a href="{{ url()->previous() }}" class="btn btn-primary center">{{ __('Go Back') }}</a>
            </div>
        </div>
@endsection