{{-- filepath: resources/views/roles/create.blade.php --}}
@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Crear nuevo rol</h1>
    <form method="POST" action="{{ route('roles.store') }}">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nombre del rol</label>
            <input type="text" name="name" id="name" class="form-control" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Guardar</button>
        <a href="{{ route('roles.index') }}" class="btn btn-secondary">Volver</a>
    </form>
</div>
@endsection