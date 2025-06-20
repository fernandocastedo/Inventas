@extends('layouts.dashboard')

@section('content')
<div class="container">
    <h2>Editar Usuario</h2>
    <form action="{{ route('users.update', $user->user_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña (dejar vacío para no cambiar)</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">Rol</label>
            <select name="role" id="role" class="form-control" required>
                <option value="admin" @if($user->role=='admin') selected @endif>Admin</option>
                <option value="user" @if($user->role=='user') selected @endif>Usuario</option>
                <option value="manager" @if($user->role=='manager') selected @endif>Manager</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Estado</label>
            <select name="status" id="status" class="form-control" required>
                <option value="active" @if($user->status=='active') selected @endif>Activo</option>
                <option value="inactive" @if($user->status=='inactive') selected @endif>Inactivo</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success">Actualizar</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection 