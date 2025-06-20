<!-- Modal content for the above example -->
<div class="modal fade bs-example-modal-lg" id="modalNuevoRol" tabindex="-1" role="dialog" aria-labelledby="modalNuevoRol"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form id="FormularioNuevoRol" method="POST" action="{{ route('roles.store') }}">
            @csrf

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar nueva tipo de Cocina </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre del rol</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Guardar</button>
                    <a href="{{ route('roles.index') }}" class="btn btn-secondary">Volver</a>
                </div>
            </div>
        </form>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
