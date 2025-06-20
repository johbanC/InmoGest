<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">


    <div data-simplebar class="h-100">


        <!--- Sidemenu -->
        <div id="sidebar-menu">
            Bienvenido, <strong>{{ auth()->user()->name }}</strong>
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main</li>

                <li>
                    <a href="/index" class="waves-effect">
                        <i class="ti-home"></i><span class="badge rounded-pill bg-primary float-end">1</span>
                        <span>Dashboard</span>
                    </a>
                </li>


                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="fas fa-users"></i>
                        <span>Clientes</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                        {{-- @can('menú propietarios')  
                            <li>
                                <a href="{{ route('propietarios.index') }}" class=" waves-effect">
                                    <i class="fas fa-house-user"></i>
                                    <span>Propietarios</span>
                                </a>
                            </li>
                        @endcan --}}



                        @can('menú propietarios')
                            <li>
                                <a href="{{ route('propietarios.index') }}" class=" waves-effect">
                                    <i class="fas fa-house-user"></i>
                                    <span>Propietarios</span>
                                </a>
                            </li>
                        @elsecan('menu propietarios')
                            <li>
                                <a href="{{ route('propietarios.index') }}" class=" waves-effect">
                                    <i class="fas fa-house-user"></i>
                                    <span>Propietarios</span>
                                </a>
                            </li>
                        @endcan




                        @can('menu inquilinos')
                            <li>
                                <a href="{{ route('inquilinos.index') }}" class=" waves-effect">
                                    <i class="fas fa-user"></i>
                                    <span>inquilinos</span>
                                </a>
                            </li>
                        @endcan

                        @can('menu fiadores')
                            <li>
                                <a href="{{ route('fiadores.index') }}" class=" waves-effect">
                                    <i class="mdi mdi-account-cash-outline"></i>
                                    <span>Fiador</span>
                                </a>
                            </li>
                        @endcan
                    </ul>
                </li>

                @can('menu ficha tecnica')
                    <li>
                        <a href="{{ route('fichastecnicas.index') }}" class=" waves-effect">
                            <i class="ti-receipt"></i>
                            <span>Ficha Tecnica</span>
                        </a>
                    </li>
                @endcan

                @can('menu inventario')
                    <li>
                        <a href="{{ route('inventarios.index') }}" class="waves-effect">
                            <i class="ti-home"></i>
                            <span class="badge rounded-pill bg-primary float-end">Beta</span>
                            <span>Inventario</span>
                        </a>
                    </li>
                @endcan


                <li class="menu-title">PROXIMAMENTE</li>


                <li>
                    <a href="#" class="waves-effect" id="alert-button2">
                        <i class="fas fa-tools"></i><span class="badge rounded-pill bg-primary float-end">Muy
                            Pronto</span>
                        <span>Reparaciones</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="waves-effect" id="alert-button2">
                        <i class="fas fa-dollar-sign"></i><span class="badge rounded-pill bg-primary float-end">Muy
                            Pronto</span>
                        <span>Pagos</span>
                    </a>
                </li>

                <li class="menu-title">CONFIGURACION</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="ti-settings"></i>
                        <span>Configuracion</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                        <li>
                            <a href="{{ route('tipodocumentos.index') }}" class="waves-effect">
                                <i class="ti-layout-cta-left"></i>
                                <span>Tipo de documento</span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('tiposinmuebles.index') }}" class="waves-effect">
                                <i class="fas fa-home"></i>
                                <span>Tipo de inmuebles</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('tipostransaccions.index') }}" class="waves-effect">
                                <i class="fas fa-exchange-alt "></i>
                                <span>Tipo de transacciones</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('calentadors.index') }}" class="waves-effect">
                                <i class="fas fa-thermometer-half"></i>
                                <span>Tipo de calentador</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('tipococinas.index') }}" class="waves-effect">
                                <i class="fas fa-utensils"></i>
                                <span>Tipo de cocina</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('tipoporterias.index') }}" class="waves-effect">
                                <i class="fas fa-door-open"></i>
                                <span>Tipo de portería</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">

                        <i class="fas fa-users-cog"></i>
                        <span>Usuarios</span>
                    </a>
                    <ul class="sub-menu mm-collapse" aria-expanded="false">
                        <li>
                            <a href="{{ route('usuarios.index') }}" class="waves-effect">
                                <i class="ti-user"></i>
                                <span>Usuarios</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ route('roles.index') }}" class="waves-effect">
                                <i class="fas fa-user-lock"></i>
                                <span>Roles</span>
                            </a>
                        </li>
                    </ul>
                </li>


                <li class="mt-3">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn btn-link text-danger w-100 text-start"
                            style="font-weight:bold;">
                            <i class="fas fa-power-off"></i> Cerrar sesión
                        </button>
                    </form>
                </li>



            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/metismenu"></script>

<script>
    $(document).ready(function() {
        $("#side-menu").metisMenu();

        $("#vertical-menu-btn").on("click", function(event) {
            event.preventDefault();
            $("body").toggleClass("sidebar-enable");
            if ($(window).width() >= 992) {
                $("body").toggleClass("vertical-collpsed");
            } else {
                $("body").removeClass("vertical-collpsed");
            }
        });
    });
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
    // Seleccionamos los botones por sus id
    const alertButton1 = document.getElementById('alert-button1');
    const alertButton2 = document.getElementById('alert-button2');

    // Función para mostrar la alerta
    function showAlert() {
        Swal.fire("Disponible muy pronto!");
    }

    // Agregamos controladores de eventos para el clic en ambos botones
    alertButton1.addEventListener('click', showAlert);
    alertButton2.addEventListener('click', showAlert);
</script>
