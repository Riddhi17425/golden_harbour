@include('layouts.frontheader', [
    'og_image' => asset('public/industry_image/Oil_Gas.webp')
])

<section class=" news_details_header_main">
    <div class=" container-fluid px-lg-0">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <div class="col"></div>
            <div class="col-12 col-lg-5 mt-5 me-30">
                <div class="">
                    <h6 class="main_routing_home"><a href="{{ url('/') }}">HOME > </a>
                    <span class="routing_home_news">Industries</span>
                    </h6>
                    <h1 class="main_head">Industries We Serve</h1>
                    <h2 class="main_head_small">Tailored Solutions for Diverse Sectors</h2>
                    <p class="card-text">At Golden Harbour, we don’t just serve industries, we stand beside them. Our commitment goes beyond supply; we deliver performance-driven solutions that keep critical sectors moving forward with confidence.</p>
                    <p class="card-text">
                        From oil & gas to offshore and energy, we cater to the demands of dynamic industries with trust, consistency, and engineering excellence.  
                    </p>
                </div>
            </div>
            <div class="col-12 col-lg-6 d-flex justify-content-end">
                <img src="{{ asset('public/front/images/headerbanner/industries_hed_img.png') }}" class="img-fluid" alt="industries hed img">
            </div>
        </div>
    </div>
</section>
<section class=" position-relative">

<div class="my-5 container Industries_main_card">
        <div class="col-12">
            <!--<h2 class="main_head main_head_line">Industries We Serve</h2>-->
            <p class="mb-4 mt-3">Golden Harbour delivers high-quality industrial solutions tailored for various sectors,
                ensuring operational efficiency, safety, and reliability. Our expertise spans across critical
                industries, supplying premium materials, equipment, and advanced technology to support evolving market
                needs. Explore how our solutions cater to different industries below.
            </p>
        </div>

    <div class="my-4 Industries_items">
        @foreach ($industrydata as $industry)
            @if($industry->id % 2 != 0)
                <div class="row mb-2 mb-md-5 mt-2 mt-md-0 gy-4 gy-md-4" id="{{ str_replace(' ', '-', $industry->title) }}">
                    <div class="col-lg-6">
                        <img src="{{ asset('public/industry_image/'.$industry-> image) }}" class="w-100 rounded-start" alt="{{  str_replace(['-', '_'],' ', pathinfo($industry->alt, PATHINFO_FILENAME)) }}">
                    </div>
                    <div class="col-lg-6 ">
                            <img src="{{ asset('public/front/images/solution-layer.svg') }}" alt="solution" class="img-fluid mb-2">
                            <h2 class="main_head ">{{$industry->title}}</h2>
                            <h2 class="main_head_small ">{{$industry->sub_title}}</h2>
                            {!! $industry->description !!}
                    </div>
                </div>
            @else
                <div class="row mb-2 mb-md-5 mt-2 mt-md-0 gy-4 gy-md-4" id="{{ str_replace(' ', '-', $industry->title) }}">
                        <div class="col-lg-6 ">
                            <img src="{{ asset('public/front/images/solution-layer.svg') }}" alt="solution" class="img-fluid mb-2">
                            <h2 class="main_head ">{{$industry->title}}</h2>
                            <h2 class="main_head_small ">{{$industry->sub_title}}</h2>
                            {!! $industry->description !!}
                        </div>
                        <div class="col-lg-6">
                            <img src="{{ asset('public/industry_image/'.$industry->image) }}" class="w-100 rounded-start" alt="{{  str_replace(['-', '_'],' ', pathinfo($industry->alt, PATHINFO_FILENAME)) }}">
                        </div>
                </div>
            @endif
        @endforeach
    </div>
    <!--    <div class="col-12">-->


    <!--    <p class="mb-4 mt-3">-->
    <!--        Lorem ipsum dolor sit amet consectetur. Cursus massa nunc aenean tincidunt. Egestas imperdiet interdum pretium vivamus massa at. Id consectetur eu porta ut iaculis lectus et. Quis a turpis elit risus. Vestibulum a faucibus commodo lectus mi feugiat. Convallis mi mattis duis gravida tincidunt et facilisis. A egestas morbi libero dictum. Et diam cursus volutpat urna eu quis. Metus pulvinar facilisi nibh dolor et adipiscing cursus sed. Urna urna tristique quisque ac odio bibendum velit dictum enim.-->
    <!--    </p>-->
    <!--    <p>-->
    <!--        Tristique netus ultricies leo turpis nulla odio praesent nisi. Leo pellentesque id at nulla neque tellus pellentesque eu. Fusce pellentesque vulputate condimentum eget egestas aliquam amet ac. Integer nulla scelerisque sed phasellus enim. Maecenas eget amet vitae tincidunt. Quis sollicitudin enim ipsum libero sed senectus vivamus suspendisse nulla. Mi non donec feugiat scelerisque. Amet id sed netus cursus viverra pellentesque mollis ipsum. Euismod eget donec nibh euismod nunc facilisi consectetur sit proin. Lectus eu mauris leo imperdiet. Convallis gravida id amet eget amet sem etiam. Velit commodo quis urna pellentesque ante in urna. Sit gravida faucibus nulla ut pellentesque nec fringilla. Proin tellus etiam volutpat venenatis et et varius.-->
    <!--    </p>-->
    <!--</div>-->
    </div>
</section>
@include('layouts.frontfooter')