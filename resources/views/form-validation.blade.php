@extends('layouts.master')
@section('title') Form Validation @endsection
@section('body') <body data-sidebar="dark"> @endsection
    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') Form Validation @endslot
    @slot('subtitle') Forms @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Validation type</h4>
                    <p class="card-title-desc">Parsley is a javascript form validation
                        library. It helps you provide your users with feedback on their form
                        submission before sending it to your server.</p>
                    <form class="row g-3 needs-validation" novalidate>
                        <div class="col-md-4">
                            <label for="validationCustom01" class="form-label">First name</label>
                            <input type="text" class="form-control" id="validationCustom01" placeholder="Mark" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-md-4">
                            <label for="validationCustom02" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="validationCustom02" placeholder="Otto" required>
                            <div class="valid-feedback">
                                Looks good!
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-md-4">
                            <label for="validationCustomUsername" class="form-label">Username</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="inputGroupPrepend">@</span>
                                <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required>
                                <div class="invalid-feedback">
                                    Please choose a username.
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-md-6">
                            <label for="validationCustom03" class="form-label">City</label>
                            <input type="text" class="form-control" id="validationCustom03" required>
                            <div class="invalid-feedback">
                                Please provide a valid city.
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-md-3">
                            <label for="validationCustom04" class="form-label">State</label>
                            <select class="form-select" id="validationCustom04" required>
                                <option selected disabled value="">Choose...</option>
                                <option>...</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid state.
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-md-3">
                            <label for="validationCustom05" class="form-label">Zip</label>
                            <input type="text" class="form-control" id="validationCustom05" required>
                            <div class="invalid-feedback">
                                Please provide a valid zip.
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck1" required>
                                <label class="form-check-label" for="invalidCheck1">
                                    Agree to terms and conditions
                                </label>
                                <div class="invalid-feedback">
                                    You must agree before submitting.
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Submit form</button>
                        </div>
                        <!-- end col -->
                    </form><!-- end form -->
                </div><!-- end cardbody -->
            </div><!-- end card -->
        </div>
        <!-- end col -->
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Validation type</h4>
                    <p class="card-title-desc">Parsley is a javascript form validation
                        library. It helps you provide your users with feedback on their form
                        submission before sending it to your server.</p>
                    <form class="row g-3 needs-validation" novalidate>
                        <div class="col-md-4 position-relative">
                            <label for="validationTooltip01" class="form-label">First name</label>
                            <input type="text" class="form-control" id="validationTooltip01" value="Mark" required>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 position-relative">
                            <label for="validationTooltip02" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="validationTooltip02" value="Otto" required>
                            <div class="valid-tooltip">
                                Looks good!
                            </div>
                        </div>
                        <div class="col-md-4 position-relative">
                            <label for="validationTooltipUsername" class="form-label">Username</label>
                            <div class="input-group has-validation">
                                <span class="input-group-text" id="validationTooltipUsernamePrepend">@</span>
                                <input type="text" class="form-control" id="validationTooltipUsername" aria-describedby="validationTooltipUsernamePrepend" required>
                                <div class="invalid-tooltip">
                                    Please choose a unique and valid username.
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 position-relative">
                            <label for="validationTooltip03" class="form-label">City</label>
                            <input type="text" class="form-control" id="validationTooltip03" required>
                            <div class="invalid-tooltip">
                                Please provide a valid city.
                            </div>
                        </div>
                        <div class="col-md-3 position-relative">
                            <label for="validationTooltip04" class="form-label">State</label>
                            <select class="form-select" id="validationTooltip04" required>
                                <option selected disabled value="">Choose...</option>
                                <option>...</option>
                            </select>
                            <div class="invalid-tooltip">
                                Please select a valid state.
                            </div>
                        </div>
                        <div class="col-md-3 position-relative">
                            <label for="validationTooltip05" class="form-label">Zip</label>
                            <input type="text" class="form-control" id="validationTooltip05" required>
                            <div class="invalid-tooltip">
                                Please provide a valid zip.
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="invalidCheck2" required>
                                <label class="form-check-label" for="invalidCheck2">
                                    Agree to terms and conditions
                                </label>
                                <div class="invalid-feedback">
                                    You must agree before submitting.
                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Submit form</button>
                        </div>
                    </form>
                    <!-- end form -->
                </div>
                <!-- end cardbody -->
            </div>
            <!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end row -->

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Validation type</h4>
                    <p class="card-title-desc">Parsley is a javascript form validation
                        library. It helps you provide your users with feedback on their form
                        submission before sending it to your server.</p>

                    <form class="custom-validation" action="#">
                        <div class="mb-3">
                            <label class="form-label">Required</label>
                            <input type="text" class="form-control" required placeholder="Type something">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Equal To</label>
                            <div>
                                <input type="password" id="pass2" class="form-control" required placeholder="Password">
                            </div>
                            <div class="mt-2">
                                <input type="password" class="form-control" required data-parsley-equalto="#pass2" placeholder="Re-Type Password">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">E-Mail</label>
                            <div>
                                <input type="email" class="form-control" required parsley-type="email" placeholder="Enter a valid email">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">URL</label>
                            <div>
                                <input parsley-type="url" type="url" class="form-control" required placeholder="URL">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Digits</label>
                            <div>
                                <input data-parsley-type="digits" type="text" class="form-control" required placeholder="Enter only digits">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Number</label>
                            <div>
                                <input data-parsley-type="number" type="text" class="form-control" required placeholder="Enter only numbers">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Alphanumeric</label>
                            <div>
                                <input data-parsley-type="alphanum" type="text" class="form-control" required placeholder="Enter alphanumeric value">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Textarea</label>
                            <div>
                                <textarea required class="form-control" rows="5" placeholder="Type here"></textarea>
                            </div>
                        </div>
                        <div class="mb-0">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                    Submit
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- end form -->
                </div><!-- end cardbody -->
            </div><!-- end card -->
        </div> <!-- end col -->

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Range validation</h4>
                    <p class="card-title-desc">Parsley is a javascript form validation
                        library. It helps you provide your users with feedback on their form
                        submission before sending it to your server.</p>

                    <form action="#" class="custom-validation">

                        <div class="mb-3">
                            <label class="form-label">Min Length</label>
                            <div>
                                <input type="text" class="form-control" required data-parsley-minlength="6" placeholder="Min 6 chars.">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Max Length</label>
                            <div>
                                <input type="text" class="form-control" required data-parsley-maxlength="6" placeholder="Max 6 chars.">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Range Length</label>
                            <div>
                                <input type="text" class="form-control" required data-parsley-length="[5,10]" placeholder="Text between 5 - 10 chars length">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Min Value</label>
                            <div>
                                <input type="text" class="form-control" required data-parsley-min="6" placeholder="Min value is 6">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Max Value</label>
                            <div>
                                <input type="text" class="form-control" required data-parsley-max="6" placeholder="Max value is 6">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Range Value</label>
                            <div>
                                <input class="form-control" required type="text range" min="6" max="100" placeholder="Number between 6 - 100">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Regular Exp</label>
                            <div>
                                <input type="text" class="form-control" required data-parsley-pattern="#[A-Fa-f0-9]{6}" placeholder="Hex. Color">
                            </div>
                        </div>

                        <div class="mb-0">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                                    Submit
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    @endsection
    @section('scripts')

    <script src="{{URL::asset('assets/libs/parsleyjs/parsleyjs.min.js')}}"></script>

    <script src="{{URL::asset('assets/js/pages/form-validation.init.js')}}"></script>

    <script src="{{URL::asset('assets/js/app.js')}}"></script>

    @endsection