<form action="{{ route('albums.destroy', $album->id) }}" method="POST" class="d-flex row align-items-center justify-content-between mt-2">
    @csrf
    @method('DELETE')

    <div class="col-5">
        <select required class="form-control" name="to_album" >
            <option value="">{{ __('Select Album') }}</option>
            @foreach ($albums as $copyAlbum)
                @if ($copyAlbum != $album)
                    <option value="{{ $copyAlbum->id }}">{{ $copyAlbum->name }}</option>
                @endif
            @endforeach
        </select>
    </div>

    <div class="col-7">
        <button class="btn btn-secondary w-8">
            {{ __('Delete & Move Pics another album') }}
        </button>
    </div>
</form>
