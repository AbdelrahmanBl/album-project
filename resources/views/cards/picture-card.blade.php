<div class="card p-0 m-2" style="width: 14rem;">
    <form action="{{ route('pictures.destroy', $picture->id) }}" method="POST" style="position: absolute;right:0.25rem;top:0.25rem;">
        @csrf
        @method('DELETE')

        <button class="btn btn-danger btn-sm">
            x
        </button>
    </form>

    <img src="{{ $picture->path }}" height="150" class="card-img-top" alt="...">

    <div class="card-body">
        <form action="{{ route('pictures.update', $picture->id) }}" method="POST"  class="card-text d-flex">
            @csrf
            @method('PATCH')

            <input type="text" name="name" value="{{ $picture->name }}" class="form-control w-6">

            <button class="btn btn-success btn-sm w-4">
                ✔
            </button>
        </form>
    </div>
</div>
