@extends('layouts.master')

@section('title')
    Usuarios
@endsection

@section('css')
    <!-- DataTables CSS -->
    <link href="{{ asset('assets/libs/datatables/dataTables.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
    <!-- Toastr CSS -->
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <!-- DataTables Buttons CSS -->
    <link href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css" rel="stylesheet">
@endsection

@section('body')

    <body data-sidebar="dark">
    @endsection

    @section('content')
        @component('components.breadcrumb')
            @slot('page_title')
                Usuarios
            @endslot
            @slot('subtitle')
                Tables
            @endslot
        @endcomponent

        @include('layouts.notificaciones')

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('status') == 2 or session('status') == 4)
            <div class="alert alert-danger">
                Hubo un error al guardar.
                @if (session('error'))
                    <br>
                    <small>{{ session('error') }}</small>
                @endif
            </div>
        @endif

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-end align-items-center">
                            <div class="card-tools">
                                <a href="{{ route('register') }}">
                                    <button type="button" class="btn btn-success waves-effect waves-light">
                                        <i class="fa fa-plus"></i> Nuevo Usuario
                                    </button>
                                </a>

                                <!-- Botón para abrir el modal -->
                                <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal"
                                    data-bs-target="#modalNuevoUsuario">
                                    <i class="fa fa-plus"></i> Nuevo Usuario
                                </button>
                                @include('usuarios.modal._nuevo-usuario')

                                {{-- Si usas modal para crear usuarios, inclúyelo aquí --}}
                                {{-- @include('usuarios.modal.modal-nuevo') --}}

                                {{-- Botón para exportar a Excel --}}
                                {{-- Si usas modal para crear usuarios, inclúyelo aquí --}}
                                {{-- @include('usuarios.modal.modal-nuevo') --}}
                            </div>
                        </div>
                        <br>
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Nro</th>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Roles</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($usuarios as $index => $usuario)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $usuario->name }}</td>
                                        <td>{{ $usuario->email }}</td>
                                        <td>
                                            @foreach ($usuario->getRoleNames() as $rol)
                                                <span class="badge bg-info">{{ $rol }}</span>
                                            @endforeach
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    id="dropdownMenuButton{{ $usuario->id }}" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    Acciones
                                                    <i class="mdi mdi-chevron-down"></i>
                                                </button>
                                                <div class="dropdown-menu"
                                                    aria-labelledby="dropdownMenuButton{{ $usuario->id }}">
                                                    <a class="dropdown-item"
                                                        href="{{ route('usuarios.show', $usuario->id) }}">
                                                        <i class="fa fa-eye"></i> Ver Detalles
                                                    </a>
                                                    <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#modalRol{{ $usuario->id }}">
                                                        <i class="fa fa-user-shield"></i> Asignar Rol
                                                    </button>
                                                    <a class="dropdown-item"
                                                        href="{{ route('usuarios.edit', $usuario->id) }}">
                                                        <i class="fa fa-pen"></i> Editar
                                                    </a>
                                                    <form action="{{ route('usuarios.destroy', $usuario->id) }}"
                                                        method="POST" style="display:inline;"
                                                        id="formDelete{{ $usuario->id }}">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="button" class="dropdown-item text-danger"
                                                            onclick="eliminar({{ $usuario->id }})">
                                                            <i class="fa fa-trash"></i> Eliminar
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    {{-- Si usas modal para editar usuarios, inclúyelo aquí --}}
                                    {{-- @include('usuarios.modal.modal-edit', ['usuario' => $usuario]) --}}
                                @endforeach
                                {{-- Modal para asignar rol --}}
                                <div class="modal fade" id="modalRol{{ $usuario->id }}" tabindex="-1"
                                    aria-labelledby="modalRolLabel{{ $usuario->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form method="POST" action="{{ route('usuarios.asignarRol', $usuario->id) }}">
                                            @csrf
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalRolLabel{{ $usuario->id }}">Asignar
                                                        Rol a {{ $usuario->name }}</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Cerrar"></button>
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
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Cancelar</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endsection







    @section('scripts')
        <!-- Toastr JS -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
        <!-- Required datatable js -->
        <script src="{{ asset('assets/libs/datatables/dataTables.min.js') }}"></script>
        <!-- DataTables Buttons js -->
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <!-- Sweet Alerts js -->
        <script src="{{ asset('assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
        <!-- Sweet alert init js-->
        <script src="{{ asset('assets/js/pages/sweet-alerts.init.js') }}"></script>
        <!-- App js -->
        <script src="{{ asset('assets/js/app.js') }}"></script>

        <script>
            function eliminar(id) {
                Swal.fire({
                    title: '¿Estás seguro?',
                    text: "¡No podrás revertir esto!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, eliminarlo!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById("formDelete" + id).submit();
                    }
                });
            }

            $(document).ready(function() {
                if ($.fn.dataTable.isDataTable('#datatable-buttons')) {
                    $('#datatable-buttons').DataTable().destroy();
                }
                $('#datatable-buttons').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                });
            });

            setTimeout(function() {
                var alert = document.querySelector('.alert');
                if (alert) {
                    var alertInstance = bootstrap.Alert.getOrCreateInstance(alert);
                    alertInstance.close();
                }
            }, 3000);
        </script>

        <script>
            // Generar contraseña aleatoria
            document.getElementById('btnGenerarPassword').addEventListener('click', function() {
                function generarPassword(longitud = 10) {
                    const caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789!@#$%&*';
                    let password = '';
                    for (let i = 0; i < longitud; i++) {
                        password += caracteres.charAt(Math.floor(Math.random() * caracteres.length));
                    }
                    return password;
                }
                const nuevaPassword = generarPassword();
                document.getElementById('password').value = nuevaPassword;
                document.getElementById('password_confirmation').value = nuevaPassword;
            });

            // Mostrar/ocultar contraseña
            document.getElementById('btnMostrarPassword').addEventListener('click', function() {
                const passwordInput = document.getElementById('password');
                const confirmInput = document.getElementById('password_confirmation');
                if (passwordInput.type === "text") {
                    passwordInput.type = "password";
                    confirmInput.type = "password";
                    this.innerHTML = '<i class="fa fa-eye"></i>';
                } else {
                    passwordInput.type = "text";
                    confirmInput.type = "text";
                    this.innerHTML = '<i class="fa fa-eye-slash"></i>';
                }
            });

            // Copiar contraseña al portapapeles
            document.getElementById('btnCopiarPassword').addEventListener('click', function() {
                const passwordInput = document.getElementById('password');
                passwordInput.select();
                passwordInput.setSelectionRange(0, 99999); // Para móviles
                document.execCommand('copy');
                // Opcional: notificación visual
                this.innerHTML = '<i class="fa fa-check text-success"></i>';
                setTimeout(() => {
                    this.innerHTML = '<i class="fa fa-copy"></i>';
                }, 1000);
            });
        </script>
    @endsection
