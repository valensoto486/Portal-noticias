<!-- resources/views/admin/notifications/index.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Notificaciones</h1>
    @if($notifications->isEmpty())
        <p>No tienes notificaciones pendientes.</p>
    @else
        <ul class="list-group">
            @foreach($notifications as $notification)
                <li class="list-group-item">
                    <strong>{{ $notification->type == 'comment' ? 'Nuevo Comentario:' : 'Nueva Noticia:' }}</strong>
                    <p>{{ $notification->message }}</p>
                    <small>Fecha: {{ $notification->created_at->format('d/m/Y H:i') }}</small>
                </li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
