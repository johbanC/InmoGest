@extends('adminlte::page')

@section('title', 'Editar tipo inmubele')

@section('content_header')
<script src="https://cdnjs.cloudflare.com/ajax/libs/imask/6.1.0/imask.min.js"></script>

@stop

@section('content')

<!-- @dump($errors->all()) -->
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
		<form action="{{ route('calentadors.update', $calentador) }}" method="POST">
			@csrf
			@method('PUT')





			@include('calentadors.form._calentador-edit')


			<div style="text-align: center;">

				<x-adminlte-button class="btn-flat" type="submit" label="Actualizar" theme="success" icon="fas fa-lg fa-update" style="width: 20%; border-radius: 10px;" />

				<x-adminlte-button class="btn-flat" label="Cancelar" theme="danger" icon="fas fa-lg fa-arrow-left" onclick="window.history.back()"  style="width: 20%; border-radius: 10px;" />
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


@stop



