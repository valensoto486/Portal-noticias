@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Usuarios</h1>
    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary mb-3" style="background-color: #0dcaf0; color: white; border: none;">Volver al Dashboard</a>
    
    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="table-light">
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ implode(', ', $user->getRoleNames()->toArray()) }}</td>
                    <td class="text-center">
                        <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-warning btn-sm" style="background-color: #0dcaf0; color: white; border: none;">Editar</a>
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display:inline;" id="delete-form-{{ $user->id }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger btn-sm" onclick="confirmarEliminacion(event, {{ $user->id }})">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
    function confirmarEliminacion(event, userId) {
        event.preventDefault(); // Evitar el envío del formulario inmediato
        const form = document.getElementById(`delete-form-${userId}`);
        const confirmacion = confirm("¿Estás seguro de eliminar este usuario?");
        if (confirmacion) {
            form.submit(); // Enviar el formulario si el usuario acepta
        }
    }
</script>
@endsection
