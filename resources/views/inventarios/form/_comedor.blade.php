<div class="row">
    <div class="col-md-12">
        <div class="collapse multi-collapse" id="comedor">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Comedor</h3>
                    <p class="card-title-desc">Carga toda la informacion de la sala del inmueble</p>

                    <div class="table-responsive">
                        <table class="table table-sm m-0">
                            <thead>
                                <tr>
                                    <th>DESCRIPCION</th>
                                    <th>CANT</th>
                                    <th>MATERIAL</th>
                                    <th>ESTADO</th>
                                    <th>OBSERVACIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">PUERTA</th>
                                    <td>
                                        <input type="text" name="cant" class="form-control {{ $errors->has('cant') ? 'is-invalid' : '' }}" id="input-cant" placeholder="CANT" value="{{ old('cant') }}" required autofocus>
                                        @if ($errors->has('cant'))
                                        <div class="invalid-feedback">{{ $errors->first('cant') }}</div>
                                        @endif
                                    </td>
                                    <td>
                                        <input type="text" name="material" class="form-control {{ $errors->has('material') ? 'is-invalid' : '' }}" id="input-material" placeholder="Material" value="{{ old('material') }}" required autofocus>
                                        @if ($errors->has('material'))
                                        <div class="invalid-feedback">{{ $errors->first('material') }}</div>
                                        @endif
                                    </td>

                                    <td>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected="">Estado</option>
                                            <option value="1">Bueno</option>
                                            <option value="2">Malo</option>
                                            <option value="3">Regular</option>
                                        </select>
                                    </td>

                                    <td>
                                        <input type="text" name="observaciones" class="form-control {{ $errors->has('observaciones') ? 'is-invalid' : '' }}" id="input-observaciones" placeholder="Observaciones" value="{{ old('observaciones') }}" required autofocus>
                                        @if ($errors->has('observaciones'))
                                        <div class="invalid-feedback">{{ $errors->first('observaciones') }}</div>
                                        @endif
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row">CHAPA</th>
                                    <td>
                                        <input type="text" name="cant" class="form-control {{ $errors->has('cant') ? 'is-invalid' : '' }}" id="input-cant" placeholder="CANT" value="{{ old('cant') }}" required autofocus>
                                        @if ($errors->has('cant'))
                                        <div class="invalid-feedback">{{ $errors->first('cant') }}</div>
                                        @endif
                                    </td>
                                    <td>
                                        <input type="text" name="material" class="form-control {{ $errors->has('material') ? 'is-invalid' : '' }}" id="input-material" placeholder="Material" value="{{ old('material') }}" required autofocus>
                                        @if ($errors->has('material'))
                                        <div class="invalid-feedback">{{ $errors->first('material') }}</div>
                                        @endif
                                    </td>

                                    <td>
                                     <select class="form-select" aria-label="Default select example">
                                        <option selected="">Estado</option>
                                        <option value="1">Bueno</option>
                                        <option value="2">Malo</option>
                                        <option value="3">Regular</option>
                                    </select>
                                </td>

                                <td>
                                    <input type="text" name="observaciones" class="form-control {{ $errors->has('observaciones') ? 'is-invalid' : '' }}" id="input-observaciones" placeholder="Observaciones" value="{{ old('observaciones') }}" required autofocus>
                                    @if ($errors->has('observaciones'))
                                    <div class="invalid-feedback">{{ $errors->first('observaciones') }}</div>
                                    @endif
                                </td>
                            </tr>

                            <tr>
                                <th scope="row">VENTANA</th>
                                <td>
                                    <input type="text" name="cant" class="form-control {{ $errors->has('cant') ? 'is-invalid' : '' }}" id="input-cant" placeholder="CANT" value="{{ old('cant') }}" required autofocus>
                                    @if ($errors->has('cant'))
                                    <div class="invalid-feedback">{{ $errors->first('cant') }}</div>
                                    @endif
                                </td>
                                <td>
                                    <input type="text" name="material" class="form-control {{ $errors->has('material') ? 'is-invalid' : '' }}" id="input-material" placeholder="Material" value="{{ old('material') }}" required autofocus>
                                    @if ($errors->has('material'))
                                    <div class="invalid-feedback">{{ $errors->first('material') }}</div>
                                    @endif
                                </td>
                                <td>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected="">Estado</option>
                                        <option value="1">Bueno</option>
                                        <option value="2">Malo</option>
                                        <option value="3">Regular</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="observaciones" class="form-control {{ $errors->has('observaciones') ? 'is-invalid' : '' }}" id="input-observaciones" placeholder="Observaciones" value="{{ old('observaciones') }}" required autofocus>
                                    @if ($errors->has('observaciones'))
                                    <div class="invalid-feedback">{{ $errors->first('observaciones') }}</div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">VIDRIO</th>
                                <td>
                                    <input type="text" name="cant" class="form-control {{ $errors->has('cant') ? 'is-invalid' : '' }}" id="input-cant" placeholder="CANT" value="{{ old('cant') }}" required autofocus>
                                    @if ($errors->has('cant'))
                                    <div class="invalid-feedback">{{ $errors->first('cant') }}</div>
                                    @endif
                                </td>
                                <td>
                                    <input type="text" name="material" class="form-control {{ $errors->has('material') ? 'is-invalid' : '' }}" id="input-material" placeholder="Material" value="{{ old('material') }}" required autofocus>
                                    @if ($errors->has('material'))
                                    <div class="invalid-feedback">{{ $errors->first('material') }}</div>
                                    @endif
                                </td>
                                <td>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected="">Estado</option>
                                        <option value="1">Bueno</option>
                                        <option value="2">Malo</option>
                                        <option value="3">Regular</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="observaciones" class="form-control {{ $errors->has('observaciones') ? 'is-invalid' : '' }}" id="input-observaciones" placeholder="Observaciones" value="{{ old('observaciones') }}" required autofocus>
                                    @if ($errors->has('observaciones'))
                                    <div class="invalid-feedback">{{ $errors->first('observaciones') }}</div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">PERSIANA</th>
                                <td>
                                    <input type="text" name="cant" class="form-control {{ $errors->has('cant') ? 'is-invalid' : '' }}" id="input-cant" placeholder="CANT" value="{{ old('cant') }}" required autofocus>
                                    @if ($errors->has('cant'))
                                    <div class="invalid-feedback">{{ $errors->first('cant') }}</div>
                                    @endif
                                </td>
                                <td>
                                    <input type="text" name="material" class="form-control {{ $errors->has('material') ? 'is-invalid' : '' }}" id="input-material" placeholder="Material" value="{{ old('material') }}" required autofocus>
                                    @if ($errors->has('material'))
                                    <div class="invalid-feedback">{{ $errors->first('material') }}</div>
                                    @endif
                                </td>
                                <td>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected="">Estado</option>
                                        <option value="1">Bueno</option>
                                        <option value="2">Malo</option>
                                        <option value="3">Regular</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="observaciones" class="form-control {{ $errors->has('observaciones') ? 'is-invalid' : '' }}" id="input-observaciones" placeholder="Observaciones" value="{{ old('observaciones') }}" required autofocus>
                                    @if ($errors->has('observaciones'))
                                    <div class="invalid-feedback">{{ $errors->first('observaciones') }}</div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">CORTINA VERTICAL</th>
                                <td>
                                    <input type="text" name="cant" class="form-control {{ $errors->has('cant') ? 'is-invalid' : '' }}" id="input-cant" placeholder="CANT" value="{{ old('cant') }}" required autofocus>
                                    @if ($errors->has('cant'))
                                    <div class="invalid-feedback">{{ $errors->first('cant') }}</div>
                                    @endif
                                </td>
                                <td>
                                    <input type="text" name="material" class="form-control {{ $errors->has('material') ? 'is-invalid' : '' }}" id="input-material" placeholder="Material" value="{{ old('material') }}" required autofocus>
                                    @if ($errors->has('material'))
                                    <div class="invalid-feedback">{{ $errors->first('material') }}</div>
                                    @endif
                                </td>
                                <td>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected="">Estado</option>
                                        <option value="1">Bueno</option>
                                        <option value="2">Malo</option>
                                        <option value="3">Regular</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="observaciones" class="form-control {{ $errors->has('observaciones') ? 'is-invalid' : '' }}" id="input-observaciones" placeholder="Observaciones" value="{{ old('observaciones') }}" required autofocus>
                                    @if ($errors->has('observaciones'))
                                    <div class="invalid-feedback">{{ $errors->first('observaciones') }}</div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">LAMPARA</th>
                                <td>
                                    <input type="text" name="cant" class="form-control {{ $errors->has('cant') ? 'is-invalid' : '' }}" id="input-cant" placeholder="CANT" value="{{ old('cant') }}" required autofocus>
                                    @if ($errors->has('cant'))
                                    <div class="invalid-feedback">{{ $errors->first('cant') }}</div>
                                    @endif
                                </td>
                                <td>
                                    <input type="text" name="material" class="form-control {{ $errors->has('material') ? 'is-invalid' : '' }}" id="input-material" placeholder="Material" value="{{ old('material') }}" required autofocus>
                                    @if ($errors->has('material'))
                                    <div class="invalid-feedback">{{ $errors->first('material') }}</div>
                                    @endif
                                </td>
                                <td>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected="">Estado</option>
                                        <option value="1">Bueno</option>
                                        <option value="2">Malo</option>
                                        <option value="3">Regular</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="observaciones" class="form-control {{ $errors->has('observaciones') ? 'is-invalid' : '' }}" id="input-observaciones" placeholder="Observaciones" value="{{ old('observaciones') }}" required autofocus>
                                    @if ($errors->has('observaciones'))
                                    <div class="invalid-feedback">{{ $errors->first('observaciones') }}</div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">PLAFONES</th>
                                <td>
                                    <input type="text" name="cant" class="form-control {{ $errors->has('cant') ? 'is-invalid' : '' }}" id="input-cant" placeholder="CANT" value="{{ old('cant') }}" required autofocus>
                                    @if ($errors->has('cant'))
                                    <div class="invalid-feedback">{{ $errors->first('cant') }}</div>
                                    @endif
                                </td>
                                <td>
                                    <input type="text" name="material" class="form-control {{ $errors->has('material') ? 'is-invalid' : '' }}" id="input-material" placeholder="Material" value="{{ old('material') }}" required autofocus>
                                    @if ($errors->has('material'))
                                    <div class="invalid-feedback">{{ $errors->first('material') }}</div>
                                    @endif
                                </td>
                                <td>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected="">Estado</option>
                                        <option value="1">Bueno</option>
                                        <option value="2">Malo</option>
                                        <option value="3">Regular</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="observaciones" class="form-control {{ $errors->has('observaciones') ? 'is-invalid' : '' }}" id="input-observaciones" placeholder="Observaciones" value="{{ old('observaciones') }}" required autofocus>
                                    @if ($errors->has('observaciones'))
                                    <div class="invalid-feedback">{{ $errors->first('observaciones') }}</div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">TOMAS ELECTRICOS</th>
                                <td>
                                    <input type="text" name="cant" class="form-control {{ $errors->has('cant') ? 'is-invalid' : '' }}" id="input-cant" placeholder="CANT" value="{{ old('cant') }}" required autofocus>
                                    @if ($errors->has('cant'))
                                    <div class="invalid-feedback">{{ $errors->first('cant') }}</div>
                                    @endif
                                </td>
                                <td>
                                    <input type="text" name="material" class="form-control {{ $errors->has('material') ? 'is-invalid' : '' }}" id="input-material" placeholder="Material" value="{{ old('material') }}" required autofocus>
                                    @if ($errors->has('material'))
                                    <div class="invalid-feedback">{{ $errors->first('material') }}</div>
                                    @endif
                                </td>
                                <td>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected="">Estado</option>
                                        <option value="1">Bueno</option>
                                        <option value="2">Malo</option>
                                        <option value="3">Regular</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="observaciones" class="form-control {{ $errors->has('observaciones') ? 'is-invalid' : '' }}" id="input-observaciones" placeholder="Observaciones" value="{{ old('observaciones') }}" required autofocus>
                                    @if ($errors->has('observaciones'))
                                    <div class="invalid-feedback">{{ $errors->first('observaciones') }}</div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">SUICHES</th>
                                <td>
                                    <input type="text" name="cant" class="form-control {{ $errors->has('cant') ? 'is-invalid' : '' }}" id="input-cant" placeholder="CANT" value="{{ old('cant') }}" required autofocus>
                                    @if ($errors->has('cant'))
                                    <div class="invalid-feedback">{{ $errors->first('cant') }}</div>
                                    @endif
                                </td>
                                <td>
                                    <input type="text" name="material" class="form-control {{ $errors->has('material') ? 'is-invalid' : '' }}" id="input-material" placeholder="Material" value="{{ old('material') }}" required autofocus>
                                    @if ($errors->has('material'))
                                    <div class="invalid-feedback">{{ $errors->first('material') }}</div>
                                    @endif
                                </td>
                                <td>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected="">Estado</option>
                                        <option value="1">Bueno</option>
                                        <option value="2">Malo</option>
                                        <option value="3">Regular</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="observaciones" class="form-control {{ $errors->has('observaciones') ? 'is-invalid' : '' }}" id="input-observaciones" placeholder="Observaciones" value="{{ old('observaciones') }}" required autofocus>
                                    @if ($errors->has('observaciones'))
                                    <div class="invalid-feedback">{{ $errors->first('observaciones') }}</div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">TOMA TELEFONO</th>
                                <td>
                                    <input type="text" name="cant" class="form-control {{ $errors->has('cant') ? 'is-invalid' : '' }}" id="input-cant" placeholder="CANT" value="{{ old('cant') }}" required autofocus>
                                    @if ($errors->has('cant'))
                                    <div class="invalid-feedback">{{ $errors->first('cant') }}</div>
                                    @endif
                                </td>
                                <td>
                                    <input type="text" name="material" class="form-control {{ $errors->has('material') ? 'is-invalid' : '' }}" id="input-material" placeholder="Material" value="{{ old('material') }}" required autofocus>
                                    @if ($errors->has('material'))
                                    <div class="invalid-feedback">{{ $errors->first('material') }}</div>
                                    @endif
                                </td>
                                <td>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected="">Estado</option>
                                        <option value="1">Bueno</option>
                                        <option value="2">Malo</option>
                                        <option value="3">Regular</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="observaciones" class="form-control {{ $errors->has('observaciones') ? 'is-invalid' : '' }}" id="input-observaciones" placeholder="Observaciones" value="{{ old('observaciones') }}" required autofocus>
                                    @if ($errors->has('observaciones'))
                                    <div class="invalid-feedback">{{ $errors->first('observaciones') }}</div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">TOMA PARABOLICA</th>
                                <td>
                                    <input type="text" name="cant" class="form-control {{ $errors->has('cant') ? 'is-invalid' : '' }}" id="input-cant" placeholder="CANT" value="{{ old('cant') }}" required autofocus>
                                    @if ($errors->has('cant'))
                                    <div class="invalid-feedback">{{ $errors->first('cant') }}</div>
                                    @endif
                                </td>
                                <td>
                                    <input type="text" name="material" class="form-control {{ $errors->has('material') ? 'is-invalid' : '' }}" id="input-material" placeholder="Material" value="{{ old('material') }}" required autofocus>
                                    @if ($errors->has('material'))
                                    <div class="invalid-feedback">{{ $errors->first('material') }}</div>
                                    @endif
                                </td>
                                <td>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected="">Estado</option>
                                        <option value="1">Bueno</option>
                                        <option value="2">Malo</option>
                                        <option value="3">Regular</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="observaciones" class="form-control {{ $errors->has('observaciones') ? 'is-invalid' : '' }}" id="input-observaciones" placeholder="Observaciones" value="{{ old('observaciones') }}" required autofocus>
                                    @if ($errors->has('observaciones'))
                                    <div class="invalid-feedback">{{ $errors->first('observaciones') }}</div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">ESTANTERIA</th>
                                <td>
                                    <input type="text" name="cant" class="form-control {{ $errors->has('cant') ? 'is-invalid' : '' }}" id="input-cant" placeholder="CANT" value="{{ old('cant') }}" required autofocus>
                                    @if ($errors->has('cant'))
                                    <div class="invalid-feedback">{{ $errors->first('cant') }}</div>
                                    @endif
                                </td>
                                <td>
                                    <input type="text" name="material" class="form-control {{ $errors->has('material') ? 'is-invalid' : '' }}" id="input-material" placeholder="Material" value="{{ old('material') }}" required autofocus>
                                    @if ($errors->has('material'))
                                    <div class="invalid-feedback">{{ $errors->first('material') }}</div>
                                    @endif
                                </td>
                                <td>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected="">Estado</option>
                                        <option value="1">Bueno</option>
                                        <option value="2">Malo</option>
                                        <option value="3">Regular</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="observaciones" class="form-control {{ $errors->has('observaciones') ? 'is-invalid' : '' }}" id="input-observaciones" placeholder="Observaciones" value="{{ old('observaciones') }}" required autofocus>
                                    @if ($errors->has('observaciones'))
                                    <div class="invalid-feedback">{{ $errors->first('observaciones') }}</div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">PISO</th>
                                <td>
                                    <input type="text" name="cant" class="form-control {{ $errors->has('cant') ? 'is-invalid' : '' }}" id="input-cant" placeholder="CANT" value="{{ old('cant') }}" required autofocus>
                                    @if ($errors->has('cant'))
                                    <div class="invalid-feedback">{{ $errors->first('cant') }}</div>
                                    @endif
                                </td>
                                <td>
                                    <input type="text" name="material" class="form-control {{ $errors->has('material') ? 'is-invalid' : '' }}" id="input-material" placeholder="Material" value="{{ old('material') }}" required autofocus>
                                    @if ($errors->has('material'))
                                    <div class="invalid-feedback">{{ $errors->first('material') }}</div>
                                    @endif
                                </td>
                                <td>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected="">Estado</option>
                                        <option value="1">Bueno</option>
                                        <option value="2">Malo</option>
                                        <option value="3">Regular</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="observaciones" class="form-control {{ $errors->has('observaciones') ? 'is-invalid' : '' }}" id="input-observaciones" placeholder="Observaciones" value="{{ old('observaciones') }}" required autofocus>
                                    @if ($errors->has('observaciones'))
                                    <div class="invalid-feedback">{{ $errors->first('observaciones') }}</div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">PARED</th>
                                <td>
                                    <input type="text" name="cant" class="form-control {{ $errors->has('cant') ? 'is-invalid' : '' }}" id="input-cant" placeholder="CANT" value="{{ old('cant') }}" required autofocus>
                                    @if ($errors->has('cant'))
                                    <div class="invalid-feedback">{{ $errors->first('cant') }}</div>
                                    @endif
                                </td>
                                <td>
                                    <input type="text" name="material" class="form-control {{ $errors->has('material') ? 'is-invalid' : '' }}" id="input-material" placeholder="Material" value="{{ old('material') }}" required autofocus>
                                    @if ($errors->has('material'))
                                    <div class="invalid-feedback">{{ $errors->first('material') }}</div>
                                    @endif
                                </td>
                                <td>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected="">Estado</option>
                                        <option value="1">Bueno</option>
                                        <option value="2">Malo</option>
                                        <option value="3">Regular</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="observaciones" class="form-control {{ $errors->has('observaciones') ? 'is-invalid' : '' }}" id="input-observaciones" placeholder="Observaciones" value="{{ old('observaciones') }}" required autofocus>
                                    @if ($errors->has('observaciones'))
                                    <div class="invalid-feedback">{{ $errors->first('observaciones') }}</div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">ZOCALO</th>
                                <td>
                                    <input type="text" name="cant" class="form-control {{ $errors->has('cant') ? 'is-invalid' : '' }}" id="input-cant" placeholder="CANT" value="{{ old('cant') }}" required autofocus>
                                    @if ($errors->has('cant'))
                                    <div class="invalid-feedback">{{ $errors->first('cant') }}</div>
                                    @endif
                                </td>
                                <td>
                                    <input type="text" name="material" class="form-control {{ $errors->has('material') ? 'is-invalid' : '' }}" id="input-material" placeholder="Material" value="{{ old('material') }}" required autofocus>
                                    @if ($errors->has('material'))
                                    <div class="invalid-feedback">{{ $errors->first('material') }}</div>
                                    @endif
                                </td>
                                <td>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected="">Estado</option>
                                        <option value="1">Bueno</option>
                                        <option value="2">Malo</option>
                                        <option value="3">Regular</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="observaciones" class="form-control {{ $errors->has('observaciones') ? 'is-invalid' : '' }}" id="input-observaciones" placeholder="Observaciones" value="{{ old('observaciones') }}" required autofocus>
                                    @if ($errors->has('observaciones'))
                                    <div class="invalid-feedback">{{ $errors->first('observaciones') }}</div>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">PINTURA</th>
                                <td>
                                    <input type="text" name="cant" class="form-control {{ $errors->has('cant') ? 'is-invalid' : '' }}" id="input-cant" placeholder="CANT" value="{{ old('cant') }}" required autofocus>
                                    @if ($errors->has('cant'))
                                    <div class="invalid-feedback">{{ $errors->first('cant') }}</div>
                                    @endif
                                </td>
                                <td>
                                    <input type="text" name="material" class="form-control {{ $errors->has('material') ? 'is-invalid' : '' }}" id="input-material" placeholder="Material" value="{{ old('material') }}" required autofocus>
                                    @if ($errors->has('material'))
                                    <div class="invalid-feedback">{{ $errors->first('material') }}</div>
                                    @endif
                                </td>
                                <td>
                                    <select class="form-select" aria-label="Default select example">
                                        <option selected="">Estado</option>
                                        <option value="1">Bueno</option>
                                        <option value="2">Malo</option>
                                        <option value="3">Regular</option>
                                    </select>
                                </td>
                                <td>
                                    <input type="text" name="observaciones" class="form-control {{ $errors->has('observaciones') ? 'is-invalid' : '' }}" id="input-observaciones" placeholder="Observaciones" value="{{ old('observaciones') }}" required autofocus>
                                    @if ($errors->has('observaciones'))
                                    <div class="invalid-feedback">{{ $errors->first('observaciones') }}</div>
                                    @endif
                                </td>
                            </tr>

                        </tbody>
                    </table>
                    <!-- end table -->
                </div>

            </div>
        </div>
    </div>
</div>
</div>