@extends('adminlte::page')

@section('title', 'Nuevo tipo de inmueble')

@section('content_header')
<script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.1.0/imask.min.js"></script>

@stop

@section('content')

{{-- @dump($errors->all()) --}}
<br>

<div class="card card-outline card-primary">
	<div class="card-header">
		<h3 class="card-title">Calentador</h3>
		<div class="card-tools">
			<button type="button" class="btn btn-tool" data-card-widget="collapse">
				<i class="fas fa-minus"></i>
			</button>
		</div>

	</div>

	<div class="card-body" style="display: block;">
        <form id="formularioCalentador" method="POST" action="{{ route('calentadors.store') }}" >
            @csrf


            @include('calentadors.form._calentador')

            <div style="text-align: center; padding-top: 50px; padding-bottom: 50px;">
    <x-adminlte-button id="botonGuardar" class="btn-flat" type="submit" label="Guardar" theme="success" icon="fas fa-lg fa-save" style="border-radius: 10px;" />
    <x-adminlte-button class="btn-flat" label="Cancelar" theme="danger" icon="fas fa-lg fa-arrow-left" onclick="window.history.back()"  style="border-radius: 10px;" />
</div>

        </form>

        


    </div>


</div>





<br>
@stop



@section('footer')

<strong>Copyright © 2024 <a href="#">InmoGest</a>.</strong>
Todos los derechos reservados.
<div class="float-right d-none d-sm-inline-block">
    <b>Version</b> 1.0.0 Beta
</div>

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">

<style type="text/css">
	tr td .form-group {
		margin-bottom: 0px;
	}
</style>
@stop

@section('js')

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var formulario = document.getElementById("formularioCalentador");
        var botonGuardar = document.getElementById("botonGuardar");
        
        formulario.addEventListener("submit", function() {
            // Deshabilitar el botón después de enviar el formulario
            botonGuardar.disabled = true;
            // Cambiar el texto del botón a "Guardando..."
            botonGuardar.innerHTML = 'Guardando...';
        });
    });
</script>



@stop