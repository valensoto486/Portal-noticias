@extends('layouts.app')

@section('content')
@vite('resources/css/dashboard.css') 
<div class="container">
    <h1>Editar Comentario</h1>

    <form action="{{ route('admin.comments.update', $comment) }}" method="POST" onsubmit="return confirmUpdate('{{ $comment->body }}')">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="body">Comentario</label>
            <textarea name="body" class="form-control" rows="4" required>{{ $comment->body }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Actualizar Comentario</button>
    </form>
</div>
@include('components.footer')

<script>
    function confirmUpdate(commentBody) {
        return confirm(`¿Desea actualizar el comentario: "${commentBody}"?`);
    }
</script>
@endsection
