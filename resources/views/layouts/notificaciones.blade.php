@if(session('status') == 1)
<div class="alert alert-success alert-dismissible fade show" role="alert">
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	<strong>¡Bien hecho!</strong> Guardado con éxito.
</div>
@endif

@if(session('status') == 2)
<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	<strong>¡Oh no!</strong> Hubo un error al guardar. Inténtalo de nuevo.
</div>
@endif

@if(session('status') == 3)
<div class="alert alert-success alert-dismissible fade show" role="alert">
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	<strong>¡Bien hecho!</strong> Editado con éxito.
</div>
@endif

@if(session('status') == 4)
<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	<strong>¡Oh no!</strong> Hubo un error al editado. Inténtalo de nuevo.
</div>
@endif

@if(session('status') == 5)
<div class="alert alert-success alert-dismissible fade show" role="alert">
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	<strong>¡Bien hecho!</strong> Eliminado con éxito.
</div>
@endif

@if(session('status') == 6)
<div class="alert alert-danger alert-dismissible fade show mb-0" role="alert">
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	<strong>¡Oh no!</strong> Hubo un error al eliminar. Inténtalo de nuevo.
</div>
@endif