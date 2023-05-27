@extends('layouts.app')

@section('content')
        <div class="card">
            <div class="card-header">{{ __('URL Listing') }}     
                <a class="btn btn-primary nav-link float-right" href="{{ route('urls.create') }}">{{ __('Add Hash Url') }}</a>
            </div>

            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>{{ __('Original Url') }}</th>
                            <th>{{ __('Hash Url') }}</th>
                            <th>{{ __('Click Limit') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($urls as $url)
                            <tr>
                           
                                <td>{{ !empty($url->original_url) ? $url->original_url : '' }}</td>
                                <td> <a href="{{ url('/').'/'.$url->hashed_url }}" target="_blank"> {{ !empty($url->hashed_url) ? url('/').'/'.$url->hashed_url : '' }}</a></td>
                                <td>{{ $url->click_limit }}</td>
                                <td>
                                    <form action="{{ route('urls.destroy', $url->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">{{ __('Delete') }}</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
@endsection