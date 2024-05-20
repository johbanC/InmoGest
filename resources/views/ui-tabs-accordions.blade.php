@extends('layouts.master')
@section('title') Tabs & Accordions @endsection
@section('body') <body data-sidebar="dark"> @endsection
    @section('content')
    @component('components.breadcrumb')
    @slot('page_title') Tabs & Accordions @endslot
    @slot('subtitle') UI Elements @endslot
    @endcomponent

    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Default Tabs</h4>
                    <p class="card-title-desc">Use the tab JavaScript plugin—include
                        it individually or through the compiled <code class="highlighter-rouge">bootstrap.js</code>
                        file—to extend our navigational tabs and pills to create tabbable panes
                        of local content, even via dropdown menus.</p>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#home" role="tab">
                                <span class="d-none d-md-block">Home</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#profile" role="tab">
                                <span class="d-none d-md-block">Profile</span><span class="d-block d-md-none"><i class="mdi mdi-account h5"></i></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#messages" role="tab">
                                <span class="d-none d-md-block">Messages</span><span class="d-block d-md-none"><i class="mdi mdi-email h5"></i></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#settings" role="tab">
                                <span class="d-none d-md-block">Settings</span><span class="d-block d-md-none"><i class="mdi mdi-cog h5"></i></span>
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active p-3" id="home" role="tabpanel">
                            <p class="mb-0">
                                Raw denim you probably haven't heard of them jean shorts Austin.
                                Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache
                                cliche tempor, williamsburg carles vegan helvetica. Reprehenderit
                                butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi,
                                qui irure terry richardson ex squid. Aliquip placeat salvia cillum
                                iphone. Seitan aliquip quis cardigan american apparel, butcher
                                voluptate nisi qui.
                            </p>
                        </div>
                        <div class="tab-pane p-3" id="profile" role="tabpanel">
                            <p class="mb-0">
                                Food truck fixie locavore, accusamus mcsweeney's marfa nulla
                                single-origin coffee squid. Exercitation +1 labore velit, blog
                                sartorial PBR leggings next level wes anderson artisan four loko
                                farm-to-table craft beer twee. Qui photo booth letterpress,
                                commodo enim craft beer mlkshk aliquip jean shorts ullamco ad
                                vinyl cillum PBR. Homo nostrud organic, assumenda labore
                                aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr,
                                vero magna velit sapiente labore stumptown. Vegan fanny pack
                                odio cillum wes anderson 8-bit.
                            </p>
                        </div>
                        <div class="tab-pane p-3" id="messages" role="tabpanel">
                            <p class="mb-0">
                                Etsy mixtape wayfarers, ethical wes anderson tofu before they
                                sold out mcsweeney's organic lomo retro fanny pack lo-fi
                                farm-to-table readymade. Messenger bag gentrify pitchfork
                                tattooed craft beer, iphone skateboard locavore carles etsy
                                salvia banksy hoodie helvetica. DIY synth PBR banksy irony.
                                Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh
                                mi whatever gluten-free, carles pitchfork biodiesel fixie etsy
                                retro mlkshk vice blog. Scenester cred you probably haven't
                                heard of them, vinyl craft beer blog stumptown. Pitchfork
                                sustainable tofu synth chambray yr.
                            </p>
                        </div>
                        <div class="tab-pane p-3" id="settings" role="tabpanel">
                            <p class="mb-0">
                                Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
                                art party before they sold out master cleanse gluten-free squid
                                scenester freegan cosby sweater. Fanny pack portland seitan DIY,
                                art party locavore wolf cliche high life echo park Austin. Cred
                                vinyl keffiyeh DIY salvia PBR, banh mi before they sold out
                                farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral,
                                mustache readymade thundercats keffiyeh craft beer marfa
                                ethical. Wolf salvia freegan, sartorial keffiyeh echo park
                                vegan.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Justify Tabs</h4>
                    <p class="card-title-desc">Use the tab JavaScript plugin—include
                        it individually or through the compiled <code class="highlighter-rouge">bootstrap.js</code>
                        file—to extend our navigational tabs and pills to create tabbable panes
                        of local content, even via dropdown menus.</p>

                    <!-- Nav tabs -->
                    <ul class="nav nav-pills nav-justified" role="tablist">
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link active" data-bs-toggle="tab" href="#home-1" role="tab">
                                <span class="d-none d-md-block">Home</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" data-bs-toggle="tab" href="#profile-1" role="tab">
                                <span class="d-none d-md-block">Profile</span><span class="d-block d-md-none"><i class="mdi mdi-account h5"></i></span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" data-bs-toggle="tab" href="#messages-1" role="tab">
                                <span class="d-none d-md-block">Messages</span><span class="d-block d-md-none"><i class="mdi mdi-email h5"></i></span>
                            </a>
                        </li>
                        <li class="nav-item waves-effect waves-light">
                            <a class="nav-link" data-bs-toggle="tab" href="#settings-1" role="tab">
                                <span class="d-none d-md-block">Settings</span><span class="d-block d-md-none"><i class="mdi mdi-cog h5"></i></span>
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active p-3" id="home-1" role="tabpanel">
                            <p class="mb-0">
                                Raw denim you probably haven't heard of them jean shorts Austin.
                                Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache
                                cliche tempor, williamsburg carles vegan helvetica. Reprehenderit
                                butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi,
                                qui irure terry richardson ex squid. Aliquip placeat salvia cillum
                                iphone. Seitan aliquip quis cardigan american apparel, butcher
                                voluptate nisi qui.
                            </p>
                        </div>
                        <div class="tab-pane p-3" id="profile-1" role="tabpanel">
                            <p class="mb-0">
                                Food truck fixie locavore, accusamus mcsweeney's marfa nulla
                                single-origin coffee squid. Exercitation +1 labore velit, blog
                                sartorial PBR leggings next level wes anderson artisan four loko
                                farm-to-table craft beer twee. Qui photo booth letterpress,
                                commodo enim craft beer mlkshk aliquip jean shorts ullamco ad
                                vinyl cillum PBR. Homo nostrud organic, assumenda labore
                                aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr,
                                vero magna velit sapiente labore stumptown. Vegan fanny pack
                                odio cillum wes anderson 8-bit.
                            </p>
                        </div>
                        <div class="tab-pane p-3" id="messages-1" role="tabpanel">
                            <p class="mb-0">
                                Etsy mixtape wayfarers, ethical wes anderson tofu before they
                                sold out mcsweeney's organic lomo retro fanny pack lo-fi
                                farm-to-table readymade. Messenger bag gentrify pitchfork
                                tattooed craft beer, iphone skateboard locavore carles etsy
                                salvia banksy hoodie helvetica. DIY synth PBR banksy irony.
                                Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh
                                mi whatever gluten-free, carles pitchfork biodiesel fixie etsy
                                retro mlkshk vice blog. Scenester cred you probably haven't
                                heard of them, vinyl craft beer blog stumptown. Pitchfork
                                sustainable tofu synth chambray yr.
                            </p>
                        </div>
                        <div class="tab-pane p-3" id="settings-1" role="tabpanel">
                            <p class="mb-0">
                                Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
                                art party before they sold out master cleanse gluten-free squid
                                scenester freegan cosby sweater. Fanny pack portland seitan DIY,
                                art party locavore wolf cliche high life echo park Austin. Cred
                                vinyl keffiyeh DIY salvia PBR, banh mi before they sold out
                                farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral,
                                mustache readymade thundercats keffiyeh craft beer marfa
                                ethical. Wolf salvia freegan, sartorial keffiyeh echo park
                                vegan.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Custom Tabs</h4>
                    <p class="card-title-desc">Example of custom tabs</p>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-custom" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#home1" role="tab">
                                <span class="d-none d-md-block">Home</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#profile1" role="tab">
                                <span class="d-none d-md-block">Profile</span><span class="d-block d-md-none"><i class="mdi mdi-account h5"></i></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#messages1" role="tab">
                                <span class="d-none d-md-block">Messages</span><span class="d-block d-md-none"><i class="mdi mdi-email h5"></i></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#settings1" role="tab">
                                <span class="d-none d-md-block">Settings</span><span class="d-block d-md-none"><i class="mdi mdi-cog h5"></i></span>
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active p-3" id="home1" role="tabpanel">
                            <p class="mb-0">
                                Raw denim you probably haven't heard of them jean shorts Austin.
                                Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache
                                cliche tempor, williamsburg carles vegan helvetica. Reprehenderit
                                butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi,
                                qui irure terry richardson ex squid. Aliquip placeat salvia cillum
                                iphone. Seitan aliquip quis cardigan american apparel, butcher
                                voluptate nisi qui.
                            </p>
                        </div>
                        <div class="tab-pane p-3" id="profile1" role="tabpanel">
                            <p class="mb-0">
                                Food truck fixie locavore, accusamus mcsweeney's marfa nulla
                                single-origin coffee squid. Exercitation +1 labore velit, blog
                                sartorial PBR leggings next level wes anderson artisan four loko
                                farm-to-table craft beer twee. Qui photo booth letterpress,
                                commodo enim craft beer mlkshk aliquip jean shorts ullamco ad
                                vinyl cillum PBR. Homo nostrud organic, assumenda labore
                                aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr,
                                vero magna velit sapiente labore stumptown. Vegan fanny pack
                                odio cillum wes anderson 8-bit.
                            </p>
                        </div>
                        <div class="tab-pane p-3" id="messages1" role="tabpanel">
                            <p class="mb-0">
                                Etsy mixtape wayfarers, ethical wes anderson tofu before they
                                sold out mcsweeney's organic lomo retro fanny pack lo-fi
                                farm-to-table readymade. Messenger bag gentrify pitchfork
                                tattooed craft beer, iphone skateboard locavore carles etsy
                                salvia banksy hoodie helvetica. DIY synth PBR banksy irony.
                                Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh
                                mi whatever gluten-free, carles pitchfork biodiesel fixie etsy
                                retro mlkshk vice blog. Scenester cred you probably haven't
                                heard of them, vinyl craft beer blog stumptown. Pitchfork
                                sustainable tofu synth chambray yr.
                            </p>
                        </div>
                        <div class="tab-pane p-3" id="settings1" role="tabpanel">
                            <p class="mb-0">
                                Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
                                art party before they sold out master cleanse gluten-free squid
                                scenester freegan cosby sweater. Fanny pack portland seitan DIY,
                                art party locavore wolf cliche high life echo park Austin. Cred
                                vinyl keffiyeh DIY salvia PBR, banh mi before they sold out
                                farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral,
                                mustache readymade thundercats keffiyeh craft beer marfa
                                ethical. Wolf salvia freegan, sartorial keffiyeh echo park
                                vegan.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>


        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Custom Tabs Justified</h4>
                    <p class="card-title-desc">Example of custom tabs</p>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs nav-tabs-custom nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#home2" role="tab">
                                <span class="d-none d-md-block">Home</span><span class="d-block d-md-none"><i class="mdi mdi-home-variant h5"></i></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#profile2" role="tab">
                                <span class="d-none d-md-block">Profile</span><span class="d-block d-md-none"><i class="mdi mdi-account h5"></i></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#messages2" role="tab">
                                <span class="d-none d-md-block">Messages</span><span class="d-block d-md-none"><i class="mdi mdi-email h5"></i></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#settings2" role="tab">
                                <span class="d-none d-md-block">Settings</span><span class="d-block d-md-none"><i class="mdi mdi-cog h5"></i></span>
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active p-3" id="home2" role="tabpanel">
                            <p class="mb-0">
                                Raw denim you probably haven't heard of them jean shorts Austin.
                                Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache
                                cliche tempor, williamsburg carles vegan helvetica. Reprehenderit
                                butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi,
                                qui irure terry richardson ex squid. Aliquip placeat salvia cillum
                                iphone. Seitan aliquip quis cardigan american apparel, butcher
                                voluptate nisi qui.
                            </p>
                        </div>
                        <div class="tab-pane p-3" id="profile2" role="tabpanel">
                            <p class="mb-0">
                                Food truck fixie locavore, accusamus mcsweeney's marfa nulla
                                single-origin coffee squid. Exercitation +1 labore velit, blog
                                sartorial PBR leggings next level wes anderson artisan four loko
                                farm-to-table craft beer twee. Qui photo booth letterpress,
                                commodo enim craft beer mlkshk aliquip jean shorts ullamco ad
                                vinyl cillum PBR. Homo nostrud organic, assumenda labore
                                aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr,
                                vero magna velit sapiente labore stumptown. Vegan fanny pack
                                odio cillum wes anderson 8-bit.
                            </p>
                        </div>
                        <div class="tab-pane p-3" id="messages2" role="tabpanel">
                            <p class="mb-0">
                                Etsy mixtape wayfarers, ethical wes anderson tofu before they
                                sold out mcsweeney's organic lomo retro fanny pack lo-fi
                                farm-to-table readymade. Messenger bag gentrify pitchfork
                                tattooed craft beer, iphone skateboard locavore carles etsy
                                salvia banksy hoodie helvetica. DIY synth PBR banksy irony.
                                Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh
                                mi whatever gluten-free, carles pitchfork biodiesel fixie etsy
                                retro mlkshk vice blog. Scenester cred you probably haven't
                                heard of them, vinyl craft beer blog stumptown. Pitchfork
                                sustainable tofu synth chambray yr.
                            </p>
                        </div>
                        <div class="tab-pane p-3" id="settings2" role="tabpanel">
                            <p class="mb-0">
                                Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
                                art party before they sold out master cleanse gluten-free squid
                                scenester freegan cosby sweater. Fanny pack portland seitan DIY,
                                art party locavore wolf cliche high life echo park Austin. Cred
                                vinyl keffiyeh DIY salvia PBR, banh mi before they sold out
                                farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral,
                                mustache readymade thundercats keffiyeh craft beer marfa
                                ethical. Wolf salvia freegan, sartorial keffiyeh echo park
                                vegan.
                            </p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>


    <!-- Collapse -->
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Default Collapse</h4>
                    <p class="card-title-desc">
                        You can use a link with the <code class="highlighter-rouge">href</code>
                        attribute, or a button with the <code class="highlighter-rouge">data-bs-target</code>
                        attribute. In both cases, the <code class="highlighter-rouge">data-bs-toggle="collapse"</code>
                        is required.
                    </p>

                    <p>
                        <a class="btn btn-primary mt-1 me-1" data-bs-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            Link with href
                        </a>
                        <button class="btn btn-primary mt-1" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                            Button with data-bs-target
                        </button>
                    </p>
                    <div class="collapse show" id="collapseExample">
                        <div class="card card-body mb-0">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident.
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">Accordion example</h4>
                    <p class="card-title-desc">Extend the default collapse behavior to create an accordion.</p>


                    <div class="accordion" id="accordionExample">
                        <div class="accordion-item border rounded">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    Collapsible Group Item #1
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life
                                    accusamus terry richardson ad squid. 3 wolf moon officia
                                    aute, non cupidatat skateboard dolor brunch. Food truck
                                    quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                    sunt aliqua put a bird on it squid single-origin coffee
                                    nulla assumenda shoreditch et. Nihil anim keffiyeh
                                    helvetica, craft beer labore wes anderson cred nesciunt
                                    sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                                    Leggings occaecat craft beer farm-to-table, raw denim
                                    aesthetic synth nesciunt you probably haven't heard of them
                                    accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border rounded mt-2">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Collapsible Group Item #2
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life
                                    accusamus terry richardson ad squid. 3 wolf moon officia
                                    aute, non cupidatat skateboard dolor brunch. Food truck
                                    quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                    sunt aliqua put a bird on it squid single-origin coffee
                                    nulla assumenda shoreditch et. Nihil anim keffiyeh
                                    helvetica, craft beer labore wes anderson cred nesciunt
                                    sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                                    Leggings occaecat craft beer farm-to-table, raw denim
                                    aesthetic synth nesciunt you probably haven't heard of them
                                    accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item border rounded mt-2">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Collapsible Group Item #3
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Anim pariatur cliche reprehenderit, enim eiusmod high life
                                    accusamus terry richardson ad squid. 3 wolf moon officia
                                    aute, non cupidatat skateboard dolor brunch. Food truck
                                    quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor,
                                    sunt aliqua put a bird on it squid single-origin coffee
                                    nulla assumenda shoreditch et. Nihil anim keffiyeh
                                    helvetica, craft beer labore wes anderson cred nesciunt
                                    sapiente ea proident. Ad vegan excepteur butcher vice lomo.
                                    Leggings occaecat craft beer farm-to-table, raw denim
                                    aesthetic synth nesciunt you probably haven't heard of them
                                    accusamus labore sustainable VHS.
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    @endsection
    @section('scripts')

    <script src="{{URL::asset('assets/js/app.js')}}"></script>

    @endsection
