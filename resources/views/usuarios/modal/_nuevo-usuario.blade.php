  <style>
/* Igualar el ancho del contenedor */
.iti {
    width: 100%;
}

/* Igualar el alto y el padding del input con Bootstrap */
.iti input.form-control, .iti input[type="tel"] {
    height: 40px; /* igual que los otros campos */
    padding-left: 48px !important; /* espacio para el selector de país */
    font-size: 1rem;
    border-radius: 0.375rem;
    border: 1px solid #ced4da;
    background-color: #fff;
}

/* Ajustar el selector de país */
.iti__flag-container {
    height: 40px;
}

/* Centrar la bandera verticalmente */
.iti__selected-flag {
    height: 100%;
    display: flex;
    align-items: center;
    padding-left: 8px;
    padding-right: 8px;
}
</style>
  
  <!-- Modal para crear usuario -->
  <div class="modal fade" id="modalNuevoUsuario" tabindex="-1" aria-labelledby="modalNuevoUsuarioLabel" aria-hidden="true">
      <div class="modal-dialog">
          <form method="POST" action="{{ route('usuarios.registrar.store') }}" id="formNuevoUsuario">
              @csrf
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="modalNuevoUsuarioLabel">Crear Nuevo Usuario</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                  </div>
                  <div class="modal-body">
                      <div class="mb-3">
                          <label for="name" class="form-label">Nombe</label>
                          <input type="text" class="form-control" name="name" id="name" required>
                      </div>
                      <div class="mb-3">
                          <label for="email" class="form-label">Correo electrónico</label>
                          <input type="email" class="form-control" name="email" id="email" required>
                      </div>
                      <div class="mb-3">
                          <label for="celular" class="form-label">Celular</label>
                          <input id="celular" name="celular" type="tel" class="form-control" required />
                          <x-input-error :messages="$errors->get('celular')" class="mt-2" />
                      </div>
                      <div class="mb-3">
                          <label for="password" class="form-label">Contraseña</label>
                          <div class="input-group">
                              <input type="text" class="form-control" name="password" id="password" required>
                              <button type="button" class="btn btn-outline-secondary" id="btnGenerarPassword"
                                  title="Generar contraseña">
                                  <i class="fa fa-random"></i>
                              </button>
                              <button type="button" class="btn btn-outline-secondary" id="btnMostrarPassword"
                                  title="Mostrar/Ocultar contraseña">
                                  <i class="fa fa-eye"></i>
                              </button>
                              <button type="button" class="btn btn-outline-secondary" id="btnCopiarPassword"
                                  title="Copiar contraseña">
                                  <i class="fa fa-copy"></i>
                              </button>
                          </div>
                          <small class="text-muted">La contraseña generada se mostrará aquí para que puedas copiarla y
                              enviarla al usuario.</small>
                      </div>
                      <div class="mb-3">
                          <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                          <input type="text" class="form-control" name="password_confirmation"
                              id="password_confirmation" required>
                      </div>
                      <div class="mb-3">
                          <label for="rol" class="form-label">Rol</label>
                          <select name="rol" id="rol" class="form-select" required>
                              <option value="">Seleccione un rol</option>
                              @foreach ($roles as $rol)
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


  <!-- Scripts para intl-tel-input (al final del archivo Blade, antes de </body>) -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.min.css" />
  <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.min.js"></script>
  <script>
      document.addEventListener("DOMContentLoaded", function() {
          const input = document.querySelector("#celular");
          const iti = window.intlTelInput(input, {
              initialCountry: "auto",
              geoIpLookup: function(callback) {
                  fetch('https://ipinfo.io/json?token=YOUR_TOKEN_AQUI')
                      .then((resp) => resp.json())
                      .then((resp) => callback(resp.country))
                      .catch(() => callback('co'));
              },
              utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/utils.js"
          });

          // Al enviar el formulario, reemplaza el valor del input por el número internacional
          input.form.addEventListener('submit', function(e) {
              input.value = iti.getNumber();
          });
      });
  </script>
