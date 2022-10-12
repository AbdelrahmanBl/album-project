@if (session('status'))
    <div class="alert {{ session('status')['type'] }}" role="alert">
        {{ session('status')['message'] }}
    </div>
@endif
