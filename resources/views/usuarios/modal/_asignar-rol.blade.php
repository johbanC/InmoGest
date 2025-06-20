 {{-- Modal para asignar rol --}}
 <div class="modal fade" id="modalRol{{ $usuario->id }}" tabindex="-1" aria-labelledby="modalRolLabel{{ $usuario->id }}"
     aria-hidden="true">
     <div class="modal-dialog">
         <form method="POST" action="{{ route('usuarios.asignarRol', $usuario->id) }}">
             @csrf
             <div class="modal-content">
                 <div class="modal-header">
                     <h5 class="modal-title" id="modalRolLabel{{ $usuario->id }}">Asignar
                         Rol a {{ $usuario->name }}</h5>
                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                 </div>
                 <div class="modal-body">
                     <div class="mb-3">
                         <label for="rol" class="form-label">Rol</label>
                         <select name="rol" id="rol" class="form-select" required>
                             <option value="">Seleccione un rol</option>
                             @foreach ($roles as $rol)
                                 <option value="{{ $rol->name }}"
                                     {{ $usuario->hasRole($rol->name) ? 'selected' : '' }}>
                                     {{ $rol->name }}
                                 </option>
                             @endforeach
                         </select>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="submit" class="btn btn-primary">Guardar</button>
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                 </div>
             </div>
         </form>
     </div>
 </div>
