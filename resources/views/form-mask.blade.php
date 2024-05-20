@extends('layouts.master')
@section('title') Form Mask @endsection
@section('body') <body data-sidebar="dark"> @endsection
    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') Form Mask @endslot
    @slot('subtitle') Forms @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-4">Example</h4>
                    <form>
                        <div class="row">
                            <div class="col-lg-6">
                                <div>
                                    <div class="mb-4">
                                        <label class="form-label" for="input-date1">Date Style 1</label>
                                        <input id="input-date1" class="form-control input-mask" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="dd/mm/yyyy">
                                        <span class="text-muted">e.g "dd/mm/yyyy"</span>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="input-date2">Date Style 2</label>
                                        <input id="input-date2" class="form-control input-mask" data-inputmask="'alias': 'datetime'" data-inputmask-inputformat="mm/dd/yyyy">
                                        <span class="text-muted">e.g "mm/dd/yyyy"</span>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="input-datetime">Date time</label>
                                        <input id="input-datetime" class="form-control input-mask" data-inputmask="'alias': 'datetime'">
                                        <span class="text-muted">e.g "yyyy-mm-dd'T'HH:MM:ss"</span>
                                    </div>
                                    <div class="mb-0">
                                        <label class="form-label" for="input-currency">Currency:</label>
                                        <input id="input-currency" class="form-control input-mask text-start" data-inputmask="'alias': 'numeric', 'groupSeparator': ',', 'digits': 2, 'digitsOptional': false, 'prefix': '$ ', 'placeholder': '0'">
                                        <span class="text-muted">e.g "$ 0.00"</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="mt-4 mt-lg-0">
                                    <div class="mb-4">
                                        <label class="form-label" for="input-repeat">repeat:</label>
                                        <input id="input-repeat" class="form-control input-mask" data-inputmask="'mask': '9', 'repeat': 10, 'greedy' : false">
                                        <span class="text-muted">e.g "9999999999"</span>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="input-mask">Mask</label>
                                        <input id="input-mask" class="form-control input-mask" data-inputmask="'mask': '99-9999999'">
                                        <span class="text-muted">e.g "99-9999999"</span>
                                    </div>
                                    <div class="mb-4">
                                        <label class="form-label" for="input-ip">IP address</label>
                                        <input id="input-ip" class="form-control input-mask" data-inputmask="'alias': 'ip'">
                                        <span class="text-muted">e.g "99.99.99.99"</span>

                                    </div>
                                    <div class="mb-0">
                                        <label class="form-label" for="input-email">Email address::</label>
                                        <input id="input-email" class="form-control input-mask" data-inputmask="'alias': 'email'">
                                        <span class="text-muted">_@_._</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    @endsection
    @section('scripts')

    <!-- form mask -->
    <script src="{{URL::asset('assets/libs/inputmask/inputmask.min.js')}}"></script>

    <!-- form mask init -->
    <script src="{{URL::asset('assets/js/pages/form-mask.init.js')}}"></script>

    <script src="{{URL::asset('assets/js/app.js')}}"></script>

    @endsection
