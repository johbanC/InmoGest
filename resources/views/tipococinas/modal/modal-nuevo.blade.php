<div class="modal fade" id="modalCrearNuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form  id="formularioTipococina" method="POST" action="{{ route('tipococinas.store') }}">
            @csrf
        
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar nueva tipo de Cocina </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   
                    <section>
            <div class="row">
                <x-adminlte-input name="nombre" label="Nombre" placeholder="Nombre" fgroup-class="col-md-12"
                type="text" class="{{ $errors->has('nombre') ? 'is-invalid' : '' }}" value="{{ old('nombre') }}" id="input-nombre" autofocus/>
                @if ($errors->has('nombre'))
                <div class="invalid-feedback">{{ $errors->first('nombre') }}</div>
                @endif
            </div>
        </section>


                </div>
                <div class="modal-footer">
                    <x-adminlte-button class="btn-flat" type="submit" label="Crear" theme="success" icon="fas fa-lg fa-update" style="border-radius: 10px;" />
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </form>
    </div>
</div>