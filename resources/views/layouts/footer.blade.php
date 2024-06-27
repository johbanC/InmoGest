
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                © {{ date('Y') }} InmoGest<span class="d-none d-sm-inline-block"> - Fabricado con <i class="mdi mdi-heart text-danger"></i> por EnDigitalWeb.</span>
            </div>
        </div>
    </div>
</footer>

<script>
    $(document).ready(function() {
        // Función para controlar la apertura y cierre del menú desplegable
        const toggleDropdown = function() {
            const userDropdown = $('#page-header-user-dropdown');
            const userMenu = userDropdown.next('.dropdown-menu');
            
            // Alternar clase 'show' en el menú desplegable
            userMenu.toggleClass('show');
            
            // Alternar atributo 'aria-expanded' en el botón del usuario
            const isExpanded = userDropdown.attr('aria-expanded') === 'true';
            userDropdown.attr('aria-expanded', !isExpanded);
        };

        // Detectar clic en el botón del usuario para alternar el menú
        $('#page-header-user-dropdown').on('click', function(event) {
            event.preventDefault();
            toggleDropdown();
        });

        // Detectar clic fuera del menú para cerrarlo
        $(document).on('click', function(event) {
            const userDropdown = $('#page-header-user-dropdown');
            const userMenu = userDropdown.next('.dropdown-menu');
            
            // Verificar si se hizo clic fuera del área del dropdown
            if (!userDropdown.is(event.target) && !userMenu.is(event.target) && userMenu.has(event.target).length === 0) {
                userMenu.removeClass('show');
                userDropdown.attr('aria-expanded', 'false');
            }
        });
    });
</script>
