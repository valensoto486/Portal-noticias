@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Contenido</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.content.update', $forum) }}" method="POST" onsubmit="return confirmUpdate('{{ $forum->title }}')">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" class="form-control" name="title" value="{{ old('title', $forum->title) }}" required>
        </div>

        <div class="form-group">
            <label for="description">Descripción</label>
            <textarea class="form-control" name="description" rows="3" required>{{ old('description', $forum->description) }}</textarea>
        </div>

        <div class="form-group">
            <label for="content">Contenido</label>
            <textarea class="form-control" name="content" rows="5" required>{{ old('content', $forum->content) }}</textarea>
        </div>

        <div class="form-group">
            <label for="author">Autor</label>
            <input type="text" class="form-control" name="author" value="{{ old('author', $forum->author) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('admin.content') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<script>
    function confirmUpdate(contentTitle) {
        return confirm(`¿Desea actualizar el contenido titulado "${contentTitle}"?`);
    }
</script>
@endsection
