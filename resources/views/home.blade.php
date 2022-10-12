@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Albums') }}</div>

                <div class="card-body">
                    @include('components.alert')

                    <div>
                        <a href="{{ route('albums.create') }}" class="btn btn-primary">
                            {{ __('Create') }}
                        </a>
                    </div>

                    <hr>

                    <div class="d-flex flex-wrap">
                        @forelse ($albums as $album)
                            @include('cards.album-card')
                        @empty
                            {{ __('No Albums Exists !') }}
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
