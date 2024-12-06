<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
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
                    <a href="{{ route('fichastecnicas.index') }}" class=" waves-effect">
                        <i class="ti-receipt"></i>
                        <span>Ficha Tecnica</span>
                    </a>
                </li>


                <li class="menu-title">PROXIMAMENTE</li>

                <li>
                    <a href="{{ route('inventarios.index')}}" class="waves-effect" >
                        <i class="ti-home"></i>
                        <span class="badge rounded-pill bg-primary float-end">Muy Pronto</span>
                        <span>Inventario</span>
                    </a>
                </li>

                <li>
                    <a href="#" class="waves-effect" id="alert-button2">
                        <i class="fas fa-tools"></i><span class="badge rounded-pill bg-primary float-end">Muy Pronto</span>
                        <span>Reparaciones</span>
                    </a>
                </li>

                <li class="menu-title">CONFIGURACION</li>


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