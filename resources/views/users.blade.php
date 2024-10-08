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
                        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este usuario?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
