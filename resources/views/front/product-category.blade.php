@include('layouts.frontheader')

<section class="news_details_header_main">
    <div class="container-fluid px-lg-0">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <div class="col"></div>
            <div class="col-12 col-lg-5 mt-5 me-30">
                <div>
                    <h6 class="main_routing_home">
                        <a href="{{ url('/') }}">HOME ></a>
                        <a href="{{ url('product') }}">Products ></a>
                        <span class="routing_home_news">{{ $pageTitle ?? 'Products' }}</span>
                    </h6>
                    <h1 class="main_head">{{ $pageTitle ?? 'Our Wide Range of Products' }}</h1>
                    <h2 class="main_head_small">{{ $pageSubtitle ?? 'highly durable Products' }}</h2>
                    <p class="card-text">{{ $pageDescription ?? 'Lorem ipsum dolor sit amet, consectetur adipiscing elit...' }}</p>
                </div>
            </div>
            <div class="col-12 col-lg-6 d-flex justify-content-end">
                <img src="{{ asset('public/front/images/headerbanner/ourculture_hed_img.png') }}" class="img-fluid" alt="header image">
            </div>
        </div>
    </div>
</section>

<section class="section_space">
    <div class="container">
        <div class="row gx-xxl-4 gx-md-2 gy-3">

            @foreach($categories as $category)
                <div class="col-md-4">
                    <div class="industrial_box product_box">
                        {{-- Use dynamic image if exists, else fallback --}}
                        <img src="{{ asset('public/category_images/'.$category->image) }}" alt="{{  str_replace(['-', '_'],' ', pathinfo($category->image, PATHINFO_FILENAME)) }}" class="img-fluid">
                        <h3 class="mt-4">{{ $category->name }}</h3>
                        {!! $category->short_description !!}
                        <a class="btn btn--ripple" href="{{ route('subcategorylist', ['category' => $category->url]) }}">
                            Read more
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</section>

@include('layouts.frontfooter')
