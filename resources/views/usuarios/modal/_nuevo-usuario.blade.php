  <!-- Modal para crear usuario -->
<div class="modal fade" id="modalNuevoUsuario" tabindex="-1" aria-labelledby="modalNuevoUsuarioLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form method="POST" action="{{ route('usuarios.registrar.store') }}">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalNuevoUsuarioLabel">Crear Nuevo Usuario</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" name="email" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="password" id="password" required>
                            <button type="button" class="btn btn-outline-secondary" id="btnGenerarPassword" title="Generar contraseña">
                                <i class="fa fa-random"></i>
                            </button>
                            <button type="button" class="btn btn-outline-secondary" id="btnMostrarPassword" title="Mostrar/Ocultar contraseña">
                                <i class="fa fa-eye"></i>
                            </button>
                            <button type="button" class="btn btn-outline-secondary" id="btnCopiarPassword" title="Copiar contraseña">
                                <i class="fa fa-copy"></i>
                            </button>
                        </div>
                        <small class="text-muted">La contraseña generada se mostrará aquí para que puedas copiarla y enviarla al usuario.</small>
                    </div>
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                        <input type="text" class="form-control" name="password_confirmation" id="password_confirmation" required>
                    </div>
                    <div class="mb-3">
                        <label for="rol" class="form-label">Rol</label>
                        <select name="rol" id="rol" class="form-select" required>
                            <option value="">Seleccione un rol</option>
                            @foreach($roles as $rol)
                                <option value="{{ $rol->name }}">{{ $rol->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Crear Usuario</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </form>
    </div>
</div>