@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('home') }}">{{ __('Albums') }}</a> > {{ __('Create') }}
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form action="{{ route('albums.store') }}" method="POST" class="container">
                        @csrf

                        <div class="row">
                            <div class="col-sm p-0">
                                <label class="col-2" for="">
                                    {{ __('Album Name') }}
                                </label>
                                <input class="form-control col-9" name="name" type="text">
                            </div>
                        </div>

                        <div class="row">
                            <button class="btn btn-success mt-2" style="width: 10rem">
                                {{ __('Create') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
