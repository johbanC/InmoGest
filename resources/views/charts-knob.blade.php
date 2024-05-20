@extends('layouts.master')
@section('title') Jquery Knob Chart @endsection
@section('body') <body data-sidebar="dark"> @endsection
    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') Jquery Knob Chart @endslot
    @slot('subtitle') Jquery Knob Chart @endslot
    @endcomponent

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Examples</h4>
                    <p class="card-title-desc">Nice, downward compatible, touchable, jQuery dial</p>

                    <div class="row text-center">
                        <div class="col-lg-4 text-center" dir="ltr">
                            <h5 class="font-size-16 mb-3">Disable display input</h5>
                            <input class="knob" data-width="150" data-fgcolor="#3c4ccf" data-displayinput="false" value="35">
                        </div>
                        <div class="col-lg-4 text-center" dir="ltr">
                            <h5 class="font-size-16 mb-3">Cursor mode</h5>
                            <input class="knob" data-width="150" data-cursor="true" data-fgcolor="#02a499" value="29">
                        </div>
                        <div class="col-lg-4 text-center" dir="ltr">
                            <h5 class="font-size-16 mb-3">Display previous value</h5>
                            <input class="knob" data-width="150" data-min="-100" data-fgcolor="#ffbb44" data-displayprevious="true" value="44">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 text-center" dir="ltr">
                            <h5 class="font-size-16 mb-3">Angle offset</h5>
                            <input class="knob" data-width="150" data-angleoffset="90" data-linecap="round" data-fgcolor="#ec4561" value="35">
                        </div>
                        <div class="col-lg-4 text-center" dir="ltr">
                            <h5 class="font-size-16 mb-3"> 5-digit values, step 1000</h5>
                            <input class="knob" data-width="150" data-min="-15000" data-displayprevious="true" data-max="15000" data-step="1000" value="-11000" data-fgcolor="#2a3142">
                        </div>
                        <div class="col-lg-4 text-center" dir="ltr">
                            <h5 class="font-size-16 mb-3">Angle offset and arc</h5>
                            <input class="knob" data-width="150" data-cursor="true" data-fgcolor="#f06292" value="29">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 text-center" dir="ltr">
                            <h5 class="font-size-16 mb-3">Readonly</h5>
                            <input class="knob" data-width="150" data-height="150" data-linecap=round data-fgColor="#38a4f8" value="80" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".1" />
                        </div>
                        <div class="col-lg-4 text-center" dir="ltr">
                            <h5 class="font-size-16 mb-3"> Angle offset and arc</h5>
                            <input class="knob" data-width="150" data-height="150" data-displayPrevious=true data-fgColor="#8d6e63" data-skin="tron" data-cursor=true value="75" data-thickness=".2" data-angleOffset=-125 data-angleArc=250 />

                        </div>
                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->


    @endsection
    @section('scripts')

    <script src="{{URL::asset('assets/libs/jquery-knob/jquery-knob.min.js')}}"></script>

    <script src="{{URL::asset('assets/js/pages/jquery-knob.init.js')}}"></script>

    <script src="{{URL::asset('assets/js/app.js')}}"></script>

    @endsection
