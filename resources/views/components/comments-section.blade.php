<div class="container mx-4">
    <h3>Comentarios</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @foreach($notice->comments as $comment)
        <div class="card mb-2">
            <div class="card-body">
                <h5 class="card-title">{{ $comment->user->name }}</h5>
                <p class="card-text">{{ $comment->body }}</p>
                <p class="text-muted">{{ $comment->created_at->diffForHumans() }}</p>
            </div>
        </div>
    @endforeach 

    @auth
        <h4>Deja un comentario</h4>
        <form action="{{ route('comments.store', $notice->id) }}" method="POST">
            @csrf
            <div class="form-group rounded">
                <textarea name="body" class="form-control" rows="4" required></textarea>
            </div>
            <button type="submit" class="px-lg-3 py-1 py-lg-1 my-3 btn btn-info rounded">Comentar</button>
        </form>
    @endauth

    @guest
        <p>Por favor <a href="{{ route('login') }}">inicia sesión</a> para comentar.</p>
    @endguest
</div>
