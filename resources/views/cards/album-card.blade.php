<div class="card m-1" style="width: 14rem;">
        @if ($album->logo)
            <img src="{{ $album->logo }}" height="150" class="card-img-top" alt="Logo">
        @endif
        <div class="card-body">
        <h5 class="card-title">{{ $album->name }}</h5>
        <h6>
            <p>{{ __('Pictures Count') }} : {{$album->pictures_count}}</p>
        </h6>
        <div class="d-flex justify-content-between">
            <a href="{{ route('albums.edit', $album->id) }}" class="btn btn-primary" style="width: 49%">
                {{ __('Edit') }}
            </a>
            <div style="width: 49%">
                @if ($album->pictures()->count() > 0)
                    @include('components.delete-modal')
                @else
                    <form action="{{ route('albums.destroy', $album->id) }}" method="POST">
                        @csrf
                        @method('DELETE')

                        <button class="btn btn-danger w-100">
                            {{ __('Delete') }}
                        </button>
                    </form>
                @endif
            </div>

        </div>
    </div>
</div>
