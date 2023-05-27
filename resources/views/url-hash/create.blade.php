@extends('layouts.app')

@section('content')
    
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create URL') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('urls.store') }}" novalidate>
                            @csrf

                            <div class="form-group">
                                <label for="url">{{ __('URL') }}</label>
                                <input id="url" type="url" class="form-control @error('url') is-invalid @enderror" name="url" value="{{ old('url') }}" required autofocus>

                                @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="click_limit">{{ __('Click Limit') }}</label>
                                <input id="click_limit" type="number" class="form-control @error('click_limit') is-invalid @enderror" name="click_limit" value="{{ old('click_limit') }}" required>

                                @error('click_limit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="days_limit">{{ __('Days Limit') }}</label>
                                <input id="days_limit" type="number" class="form-control @error('days_limit') is-invalid @enderror" name="days_limit" value="{{ old('days_limit') }}" required>

                                @error('days_limit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">
                                {{ __('Create') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection