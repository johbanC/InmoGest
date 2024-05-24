    {{-- Custom --}}
    <x-adminlte-modal id="modalCustom" title="Account Policy" size="lg" theme="teal"
    icon="fas fa-bell" v-centered static-backdrop scrollable>
    <div style="height:800px;">

        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Tipo de cocinas</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>

            </div>

            <div class="card-body" style="display: block;">
                <form id="formularioTipococina" method="POST" action="{{ route('tipococinas.store') }}" >
                    @csrf


                    <section>

                        

                        <div class="row">

                            <x-adminlte-input name="nombre" label="Nombre" placeholder="Nombre" fgroup-class="col-md-12"
                            type="text" class="{{ $errors->has('nombre') ? 'is-invalid' : '' }}" value="{{ old('nombre') }}" id="input-nombre" autofocus/>
                            @if ($errors->has('nombre'))
                            <div class="invalid-feedback">{{ $errors->first('nombre') }}</div>
                            @endif

                        </div>

                    </section>

                    <div style="text-align: center; padding-top: 50px; padding-bottom: 50px;">
                        <x-adminlte-button id="botonGuardar" class="btn-flat" type="submit" label="Guardar" theme="success" icon="fas fa-lg fa-save" style="border-radius: 10px;" />
                        <x-adminlte-button class="btn-flat" label="Cancelar" theme="danger" icon="fas fa-lg fa-arrow-left" onclick="window.history.back()"  style="border-radius: 10px;" />
                    </div>

                </form>

                


            </div>


        </div>
        
    </div>
    <x-slot name="footerSlot">
        <x-adminlte-button class="mr-auto" theme="success" label="Accept"/>
        <x-adminlte-button theme="danger" label="Dismiss" data-dismiss="modal"/>
    </x-slot>
</x-adminlte-modal>