@extends('layouts.app')

@section('page-css')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('home') }}">{{ __('Albums') }}</a> > {{ __('Edit') }}
                </div>

                <div class="card-body">
                    @include('components.alert')

                    <form action="{{ route('albums.update', $album->id) }}" id="update-form" method="POST" class="container">
                        @csrf
                        @method('PATCH')

                        <div class="row">
                            <div class="col-sm p-0">
                                <label class="col-2" for="">
                                    {{ __('Album Name') }}
                                </label>
                                <input class="form-control col-9" name="name" required value="{{ old('name') ?? $album->name }}" type="text">
                                @include('components.error', ['field' => 'name'])
                            </div>
                        </div>
                    </form>

                    <form action="{{ route('upload.store') }}" method="POST" class="dropzone mt-4" id="my-dropzone" enctype="multipart/form-data">
                        @csrf

                        <input type="file" name="file" multiple  class="d-none">
                    </form>

                    <div class="row m-1">
                        <button type="button" onclick="$('#update-form').submit()" class="btn btn-success mt-2" style="width: 10rem">
                            {{ __('Edit') }}
                        </button>
                    </div>

                    <hr>

                    <div class="row mt-2">
                    @forelse ($album->pictures as $picture)
                        @include('cards.picture-card')
                    @empty
                        <p>
                            {{ __('No Pictures Exists !') }}
                        </p>
                    @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-scripts')
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

    <script>
        Dropzone.autoDiscover = false;

        let myDropzone = new Dropzone("#my-dropzone", {
            addRemoveLinks: true,
            acceptedFiles: 'image/*',
            init: function() {
                this.on("complete", function(res) {
                    let data = JSON.parse(res.xhr.response)
                    addImageToForm(data.id)
                });
            }
        })

        function addImageToForm(id) {
            $("#update-form").append(`
                <input type="hidden" name="uploaded[]" value="${id}" />
            `)
        }
    </script>
@endsection
