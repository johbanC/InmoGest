<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Main</li>

                <li>
                    <a href="index" class="waves-effect">
                        <i class="ti-home"></i><span class="badge rounded-pill bg-primary float-end">1</span>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="/fichastecnicas" class=" waves-effect">
                        <i class="ti-receipt"></i>
                        <span>Ficha Tecnica</span>
                    </a>
                </li>


                <li class="menu-title">PROXIMAMENTE</li>

                <li>
                    <a href="inventario" class="waves-effect">
                        <i class="ti-home"></i><span class="badge rounded-pill bg-primary float-end">Muy Pronto</span>
                        <span>Inventario</span>
                    </a>
                </li>

                <li>
                    <a href="reparaciones" class="waves-effect">
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