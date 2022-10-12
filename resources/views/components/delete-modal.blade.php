<!-- Button trigger delete modal -->
<button type="button" class="btn btn-secondary w-100" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $album->id }}">
    Delete
</button>

<!-- Delete Modal -->
<div class="modal fade" id="deleteModal{{ $album->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $album->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel{{ $album->id }}">{{ $album->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('albums.destroy', $album->id) }}?REMOVE=1" method="POST">
                    @csrf
                    @method('DELETE')

                    <button class="btn btn-danger w-100">
                        {{ __('Delete all the pictures in the album') }}
                    </button>
                </form>

                <hr>

                @include('components.copy-modal')
            </div>
        </div>
    </div>
</div>
