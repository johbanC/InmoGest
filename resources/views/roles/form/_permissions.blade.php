<div class="col-lg-10">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h4 class="mb-0">Permisos para el rol: <strong>{{ $role->name }}</strong></h4>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('roles.permisos.update', $role->id) }}">
                @csrf

                @php
                    // Agrupar permisos por área (última palabra)
                    $permisosAgrupados = $permissions->groupBy(function($permiso) {
                        $partes = explode(' ', $permiso->name);
                        return end($partes);
                    });
                @endphp

                <div class="row">
                    @foreach ($permisosAgrupados as $area => $permisos)
                        <div class="col-12 mb-2">
                            <h5 class="mt-3">{{ ucfirst($area) }}</h5>
                            <hr>
                        </div>
                        @foreach ($permisos as $permiso)
                            <div class="col-md-4 mb-2">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="permissions[]"
                                        value="{{ $permiso->name }}" id="permiso_{{ $permiso->id }}"
                                        {{ $role->hasPermissionTo($permiso->name) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="permiso_{{ $permiso->id }}">
                                        {{ ucfirst($permiso->name) }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary">Guardar permisos</button>
                    <a href="{{ route('roles.index') }}" class="btn btn-secondary">Volver</a>
                </div>
            </form>
        </div>
    </div>
</div>