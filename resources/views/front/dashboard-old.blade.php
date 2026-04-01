@include('layouts.frontheader', [
    'og_image' => asset('public/front/images/new_index/new_hero.webp')
])
<div id="videoContainer">
    <video id="introVideo" autoplay muted playsinline webkit-playsinline>
        <source src="{{ asset('public/front/images/video/index_Video_1.mp4') }}" type="video/mp4">
    </video>
</div>
<!--<div id="bodymainContent">-->
<div id="fullpage">
    <section class="hero section">
        <div class="container-fluid p-0">
            <div class="swiper hero_slider">
                <!--<div class="swiper-wrapper">-->
                <!--    @foreach ($home_banner as $banner)-->
                <!--        <div class="swiper-slide">-->
                <!--            <div class="slide_img">-->
                <!--                <picture class="">-->
                <!--                <source media="(min-width:990px)" srcset="{{ asset('public/front/images/Banner_1.jpg') }}" type="image/png" loading="lazy" decoding="async" class="img-fluid ">-->
                <!--                <img src="{{ asset('public/front/images/Mobile_banner_1.jpg') }}" alt="Oil & Gas Industry"-->
                <!--                    class="img-fluid ">-->
                <!--                </picture>-->
                <!--            </div>-->
                <!--            <div class="slider_content">-->
                <!--                <div class="row align-items-center">-->
                <!--                    <div class="col-lg-5">-->
                <!--                        <p class="sub_head">{{$banner->subheading}}</p>-->
                <!--                        <h1 class="main_head">{{$banner->heading}}</h1>-->
                <!--                        {!! $banner->description !!}-->
                <!--                        {{-- <div class="slider_products d-none d-md-block">-->
                <!--                            <a class="slid_prod" href="javascript:void(0);">Non Ferrous Metals & Alloy Steel</a>-->
                <!--                            <a class="slid_prod" href="javascript:void(0);">Bronze Round Bars & Hollow Bushings</a>-->
                <!--                            <a class="slid_prod" href="javascript:void(0);">Marine Valves</a>-->
                <!--                            <a class="slid_prod" href="javascript:void(0);">Pipes, Tubes, Fittings & Flanges</a>-->
                <!--                            <a class="slid_prod" href="javascript:void(0);">Gaskets and Packings</a>-->
                <!--                            <a class="slid_prod" href="javascript:void(0);">Heat Exchanger, Condenser Pipes, Tubes & Fittings</a>-->
                <!--                        </div> --}}-->

                <!--                        <a type="submit" href="{{ $banner->cta_url }}" class="btn btn--ripple" id="ripple">{{$banner->cta_title}} <svg-->
                <!--                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"-->
                <!--                                fill="none">-->
                <!--                                <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="white"-->
                <!--                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />-->
                <!--                            </svg></a>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    @endforeach-->
                <!--</div>-->
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="slide_img">
                            <picture class="">
                            <source media="(min-width:990px)" srcset="{{ asset('public/front/images/Banner_1.jpg') }}" type="image/png" loading="lazy" decoding="async" class="img-fluid ">
                            <img src="{{ asset('public/front/images/Mobile_banner_1.jpg') }}" alt="Oil & Gas Industry"
                                 class="img-fluid ">
                            </picture>
                            <!--<img src="{{ asset('public/front/images/Banner_1.jpg') }}" alt="" class="img-fluid">-->
                        </div>
                        <div class="slider_content">
                            <div class="row align-items-center">
                                <div class="col-lg-5">
                                    <p class="sub_head">Legacy That Travels With Every Shipment</p>
                                    <h1 class="main_head">Empowering Industries Worldwide with Trusted Supply</h1>
                                    <p>From bustling ports to remote operations, Golden Harbour stands by your side. Our global logistics strength is matched only by our commitment to every client. With decades of experience and a human touch in every transaction, we make reliability feel personal; every time, everywhere.</p>
                                    <!--<div class="slider_products d-none d-md-flex">-->
                                    <!--    <div class="slid_prod">Consistent delivery across regions</div>-->
                                    <!--    <div class="slid_prod">Global access with personalized support</div>-->
                                    <!--    <div class="slid_prod">Proven experience in critical supply delivery</div>-->
                                    <!--    <div class="slid_prod">Solutions backed by integrity, not just inventory</div>-->
                                    <!--</div>-->
                                        <ul class="slider_products d-none d-md-flex">
                                        <li>Consistent delivery across regions</li>
                                        <li>
                                            Global access with personalized support
                                        </li>
                                        <li>
                                            Proven experience in critical supply delivery
                                        </li>
                                         <li>
                                            Solutions backed by integrity, not just inventory
                                        </li>
                                    </ul>

                                    <a type="submit" href="{{ route('contact') }}" class="btn btn--ripple" id="ripple">Let’s Connect <svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none">
                                            <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="white"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="slide_img">
                                 <picture class="">
                            <source media="(min-width:900px)" srcset="{{ asset('public/front/images/Banner_2.jpg') }}" type="image/png" loading="lazy" decoding="async" class="img-fluid ">
                            <img src="{{ asset('public/front/images/Mobile_banner_3.jpg') }}" alt="Oil & Gas Industry"
                                 class="img-fluid ">
                            </picture>
                            <!--<img src="{{ asset('public/front/images/Banner_2.jpg') }}" alt="" class="img-fluid">-->
                        </div>
                        <div class="slider_content">
                            <div class="row align-items-center">
                                <div class="col-lg-5">
                                    <p class="sub_head">Trusted Partner at Sea</p>
                                    <h1 class="main_head">Engineered for Demanding Environments</h1>
                                    <p>From navigation systems to safety equipment, Golden Harbour delivers solutions that meet the highest industry standards. Our commitment to excellence keeps your operations on course.</p>
                                    <!--<div class="slider_products d-none d-md-flex">-->
                                    <!--    <div class="slid_prod" >Comprehensive product range</div>-->
                                    <!--    <div class="slid_prod" >Dedicated customer service</div>-->
                                    <!--    <div class="slid_prod" >Industry-compliant solutions</div>-->
                                    <!--    <div class="slid_prod" >Fast and reliable delivery</div>-->
                                    <!--</div>-->
                                    <ul class="slider_products d-none d-md-flex">
                                        <li>Comprehensive product range</li>
                                        <li>
                                            Dedicated customer service
                                        </li>
                                        <li>
                                            Industry-compliant solutions
                                        </li>
                                         <li>
                                            Fast and reliable delivery
                                        </li>
                                    </ul>
                                        <a type="submit"  href="{{ route('industries') }}" class="btn btn--ripple" id="ripple">Discover Our Industries <svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                                fill="none">
                                                <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="white"
                                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg>
                                        </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="slide_img">
                                    <picture class="">
                            <source media="(min-width:900px)" srcset="{{ asset('public/front/images/Banner_3.jpg') }}" type="image/png" loading="lazy" decoding="async" class="img-fluid ">
                            <img src="{{ asset('public/front/images/Mobile_banner_2.jpg') }}" alt="Oil & Gas Industry"
                                 class="img-fluid ">
                            </picture>
                            <!--<img src="{{ asset('public/front/images/Banner_3.jpg') }}" alt="" class="img-fluid">-->
                        </div>
                        <div class="slider_content">
                            <div class="row align-items-center">
                                <div class="col-lg-5">
                                    <p class="sub_head">Expertise That Delivers Beyond Expectations</p>
                                    <h1 class="main_head">Global Industrial Supply Solutions Trusted by Decades</h1>
                                    <p>For 35+ years, Golden Harbour has served as a trusted name in global industrial supply. Our longevity is rooted in deep domain understanding, consistent delivery, and unwavering client trust, making us more than a supplier, but a legacy.</p>
                                    <!--<div class="slider_products d-none d-md-flex">-->
                                    <!--    <div class="slid_prod" >Presence across the international markets</div>-->
                                    <!--    <div class="slid_prod" >In-depth product & industry knowledge</div>-->
                                    <!--    <div class="slid_prod" >Reputation built on quality and trust</div>-->
                                    <!--    <div class="slid_prod" >Dedicated service, round-the-clock</div>-->
                                    <!--</div>-->
                                    <ul class="slider_products d-none d-md-flex">
                                        <li>Presence across the international markets</li>
                                        <li>
                                           In-depth product & industry knowledge
                                        </li>
                                        <li>
                                            Reputation built on quality and trust
                                        </li>
                                         <li>
                                            Dedicated service, round-the-clock
                                        </li>
                                    </ul>
                                    <a type="submit" href="{{ route('milestone') }}" class="btn btn--ripple" id="ripple">Discover Our Legacy <svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                            fill="none">
                                            <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="white"
                                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--<div class="swiper-slide">-->
                    <!--    <div class="slide_img">-->
                    <!--        <img src="{{ asset('public/front/images/Banner_4.jpg') }}" alt="" class="img-fluid">-->
                    <!--    </div>-->
                    <!--    <div class="slider_content">-->
                    <!--        <div class="row align-items-center">-->
                    <!--            <div class="col-lg-5">-->
                    <!--                <p class="sub_head">Your Partner in Industrial Solutions</p>-->
                    <!--                <h1 class="main_head">Engineering Excellence Delivered Globally</h1>-->
                    <!--                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor-->
                    <!--                    incididunt ut-->
                    <!--                    labore-->
                    <!--                    et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco-->
                    <!--                    laboris-->
                    <!--                    nisi-->
                    <!--                    ut-->
                    <!--                    aliquip ex ea commodo consequat.</p>-->
                    <!--                <div class="slider_products">-->
                    <!--                    <a class="slid_prod" href="javascript:void(0);">Non Ferrous Metals & Alloy Steel</a>-->
                    <!--                    <a class="slid_prod" href="javascript:void(0);">Bronze Round Bars & Hollow Bushings</a>-->
                    <!--                    <a class="slid_prod" href="javascript:void(0);">Marine Valves</a>-->
                    <!--                    <a class="slid_prod" href="javascript:void(0);">Pipes, Tubes, Fittings & Flanges</a>-->
                    <!--                    <a class="slid_prod" href="javascript:void(0);">Gaskets and Packings</a>-->
                    <!--                    <a class="slid_prod" href="javascript:void(0);">Heat Exchanger, Condenser Pipes, Tubes & Fittings</a>-->
                    <!--                </div>-->
                    <!--                <a href="javascript:void(0);" class="btn btn--ripple" id="ripple">Explore Our Products <svg-->
                    <!--                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"-->
                    <!--                        fill="none">-->
                    <!--                        <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="white"-->
                    <!--                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />-->
                    <!--                    </svg></a>-->
                    <!--            </div>-->
                    <!--        </div>-->
                    <!--    </div>-->
                    <!--</div>-->
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
        <div class="numbered-pagination gallery__pagin-wrap">
            <span class="current-slide hero">01</span>
            <div class="swiper-pagination-progressbar">
                <span class="swiper-pagination-progressbar-fill hero"></span>
            </div>
            <span class="total-slides hero">04</span>
        </div>
    </section>
    <section class="about_wrapper comman_space position-relative section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12 offset-md-1">
                    <h2 class="main_head main_head_line">Your Partner in Industrial Solutions </h2>
                    <h4>Engineering Excellence Delivered</h4>
                    <div class="moretext">
                        <p>
                            At Golden Harbour, we don’t just supply products, we build enduring partnerships that power progress. With a legacy spanning over two decades, we have become one of the UAE’s most trusted providers of engineering products, industrial materials, and technical solutions.
                        </p>
                        <p>
                            Driven by quality, guided by innovation, and grounded in integrity, we support diverse sectors including oil & gas, marine, construction, and manufacturing,  ensuring they run safer, smarter, and more efficiently.
                        </p>
                        <p>
                            Every <b>product</b> we deliver is backed by a commitment to precision, performance, and people. Our expert team brings not only deep technical know-how but also a genuine dedication to understanding your needs and delivering with care.
                        </p>
                        <p>
                            Whether you're building infrastructure, maintaining critical assets, or driving industrial excellence, we are always by your side, every step of the way. 
                        </p>
                    </div>
                      <a href="javascript:void(0)" class="read-more-text mt-2 mb-3" onclick="toggleText(this)">Read more</a>

                    <div>
                        <a class="btn btn--ripple" href="{{ route('about') }}" id="ripple">Know More About Us <svg xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="white" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg></a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 mt-4 mt-lg-auto">
                    <img src="{{ asset('public/front/images/about-img.png') }}" alt="industry" class="img-fluid">
                </div>
            </div>
        </div>
    </section>
    <section class="one_stop_shop section">
        <div class="container">
            <div class="row text-center justify-content-center">
                <h2 class="main_head text-center col-md-6">One-Stop Shop for Industrial Solutions</h2>
            </div>
            <!--<div class="effect_line position-relative col-md-7"></div>-->
            <div class="industrial_solutions">
                <div class="industrial_slider">
                    @foreach($industrialsolutiondata as $industrialsolution)
                    <div class="industrial_box">
                        <img src="{{ asset('public/industrysolution_image/'.$industrialsolution->front_image) }}"
                            alt="{{ $industrialsolution->alt  }}" class="img-fluid">
                        <img src="{{ asset('public/front/images/solution-layer.svg') }}" alt="solution" class="img-fluid mt-3 mb-2">

                        <h3>{{ $industrialsolution->title}}</h3>
                        {!! $industrialsolution->short_description !!}
                        <a href="{{ route('subcategorylist',['category'=>$industrialsolution->url])}}" class="btn btn--ripple text-white" id="ripple"> Explore More  <svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="white" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                    @endforeach
                </div>

                <div class="custom-pagination">
                    <span class="current-slide industrial">01</span>
                    <div class="progress-bar">
                        <div class="progress-fill industrial"></div>
                    </div>
                    <span class="total-slides industrial">{{ count($industrialsolutiondata) }}</span>
                </div>
            </div>
            
        </div>
    </section>
    <section class="pb-5 section">
        <div class="container">
            <h2 class="main_head text-center">trusted partner</h2>
            <div class="effect_line position-relative col-md-6"></div>
             <div class="row     justify-content-center mt-5">
                 <div class="col-md-2">
                <img alt="promo" src="{{ asset('public/front/images/ADNOCPrimaryBrand_Logo.webp') }}" class=" lazyloaded img-fluid">
            </div>
            <div class="col-md-2">
                <img alt="promo" src="{{ asset('public/front/images/asry-logo.webp') }}" class=" lazyloaded img-fluid">
            </div>
            <div class="col-md-2">
                <img alt="promo" src="{{ asset('public/front/images/dewa_logo.webp') }}" class=" lazyloaded img-fluid">
            </div>
            <div class="col-md-2">
                <img alt="promo" src="{{ asset('public/front/images/drydocks_logo.webp') }}" class=" lazyloaded img-fluid">
            </div>
            <div class="col-md-2">
                <img alt="promo" src="{{ asset('public/front/images/ENOC_logo.webp') }}" class=" lazyloaded img-fluid">
            </div>
             </div>
        </div>
    </section>
    <section class="promo-section section">
        <div class="grid-container">
            <div class="promo-hold">
                <ul>
                    <li class="animation-element fade-up in-view">
                        Innovative Product Range </li>
                    <li class="animation-element fade-up in-view">
                        <span>
                            <div class="promo-dots-fade">
                            </div>
                        </span>
                        <img alt="promo" src="{{ asset('public/front/images/promo.svg') }}" class=" lazyloaded">
                        <div class="promo-words">
                            <img alt="promo" src="{{ asset('public/front/images/promo-words.svg') }}" class=" lazyloaded">
                        </div>
                    </li>
                    <li class="animation-element fade-up in-view text-white">
                        Diverse Industries Served </li>
                </ul>
            </div>
        </div>
    </section>
    <section class="shaping_industrial pt-0 position-relative section">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-lg-9">
                    <h2 class="main_head main_head_line text-white">Shaping Industrial Excellence</h2>
                    <p class="text-white">Excellence in industry isn't built overnight, it’s forged through precision, performance, and purpose. Across every sector we serve, our focus remains the same: delivering dependable engineering products and solutions that keep operations running safely, efficiently, and without compromise. With a deep understanding of mission-critical environments, we help industries move forward with confidence.</p>
                </div>
                <div class="col-xxl-4 col-lg-3 text-md-end text-start">
                    <div class="main-link-group">
                    <a href="{{ route('industries') }}" class="btn btn--ripple" id="ripple">Explore All Industries
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="white" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg></a>
                    </div>
                </div>
            </div>
            <div class="industrial_show">
                <div class="row gx-lg-5">
                <div class="col-lg-3 col-md-6">
                    <div class="oil_industri oil-industry">
                        <div class="bd_circle">
                            <picture class="home-circle-image  circle-280 mx-auto">
                            <source srcset="{{ asset('public/front/images/Industry/Oil_Gas_Industry_obj.png') }}" type="image/png">
                            <img src="{{ asset('public/front/images/Industry/Oil_Gas_Industry_obj.png') }}" alt="Oil & Gas Industry" width="auto" height="270"
                                loading="lazy" decoding="async" class="img-fluid ">
                            </picture>
                        </div>
                        <div class="oil_industri_content">
                            <h3>Oil & Gas</h3>
                            <p>
                                Meeting the rigorous demands of the oil and gas sector with certified, high-performance products designed for safety, efficiency, and extreme environments. From exploration to refining, we help drive operations that power the world.
                            </p>
                        </div>
                    </div>

                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="oil_industri energy-industry">
                        <div class="bd_circle">
                            <picture class="home-circle-image circle-280 mx-auto">
                            <source srcset="{{ asset('public/front/images/Industry/Energy_Power_Industry_Obj.png') }}" type="image/png">
                            <img src="{{ asset('public/front/images/Industry/Energy_Power_Industry_Obj.png') }}" alt="Energy and Power Industry" width="auto" height="270"
                                loading="lazy" decoding="async" class="img-fluid">
                            </picture>
                        </div>
                        <div class="oil_industri_content">
                            <h3>Energy and Power</h3>
                            <p>
                                Supporting power generation and distribution with engineering solutions built to perform under 
                                pressure. Whether conventional or renewable, our components deliver stability, continuity, and 
                                long-term operational excellence.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="oil_industri shipbuilding-industry">
                        <div class="bd_circle">
                            <picture class="home-circle-image circle-280 mx-auto">
                             <source srcset="{{ asset('public/front/images/Industry/Shipbuilding_Repair_Industry_Obj.png') }}" type="image/png">
                            <img src="{{ asset('public/front/images/Industry/Shipbuilding_Repair_Industry_Obj.png') }}" alt="Shipbuilding and Repair Industry" width="auto" height="270"
                                loading="lazy" decoding="async" class="img-fluid">
                            </picture>
                        </div>
                        <div class="oil_industri_content">
                            <h3>Shipbuilding and Repair</h3>
                            <p>
                                Equipping the marine sector with precision-engineered products essential for shipbuilding, retrofitting, and repair. Our range ensures structural integrity, seaworthiness, and reliability even in the most challenging maritime conditions.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="oil_industri Offshore-industry">
                        <div class="bd_circle">
                            <picture class="home-circle-image circle-280 mx-auto">
                             <source srcset="{{ asset('public/front/images/Industry/Offshore_Onshore_Obj.png') }}" type="image/png">
                            <img src="{{ asset('public/front/images/Industry/Offshore_Onshore_Obj.png') }}" alt="Offshore & Onshore" width="auto" height="270"
                                loading="lazy" decoding="async" class="img-fluid w-100">
                            </picture>
                        </div>
                        <div class="oil_industri_content">
                            <h3>Offshore & Onshore</h3>
                            <p>
                                From offshore platforms to onshore facilities, we provide robust solutions that thrive in harsh, high-risk environments. Engineered for resilience and tested for performance, our products support critical operations every step of the way.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    <section class=" map-section position-relative section">
   <div class="container">
       <div class="row">
           <div class="col"></div>
           <div class="col-md-5 global-contant mt-5 mb-md-0 mb-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" viewBox="0 0 65 65" fill="none">
                  <path d="M0.212402 64.2256H32.2795C32.2795 46.6043 46.6135 32.2927 64.2124 32.2927V0.225586C28.9476 0.225586 0.212402 28.9607 0.212402 64.2256Z" fill="#C4A458"/>
                </svg>
                <h2 class="main_head mt-3">Global Sourcing, Local Excellence </h2>
                <p>As trusted importers, we connect you to the world’s leading manufacturers, delivering premium engineering products tailored to your needs</p>
           </div>
           <div class="col-md-6 position-relative ">
                <img src="{{ asset('public/front/images/global-map.png') }}" alt="map" class="img-fluid">
                <img src="{{ asset('public/front/images/bahrain-map.png') }}" alt="map" class="img-fluid bahrain">
                <a href="javascript:void(0)" class="bahrain-location" data-bs-toggle="tooltip" data-bs-placement="top" title="Flat 3, Building 50486, HIDD, Kingdom of Bahrain">
                    <img src="{{ asset('public/front/images/location.png') }}" alt="location" class=" img-fluid location-img" >
                </a>
                <a href="javascript:void(0)" class="abu-dhabi" data-bs-toggle="tooltip" data-bs-placement="top" title="Door 2, Mussafah M-37, Abu Dhabi, UAE">
                     <img src="{{ asset('public/front/images/location.png') }}" alt="location" class=" img-fluid location-img" >
                </a>
                <a href="javascript:void(0)" class="jebel-ali" data-bs-toggle="tooltip" data-bs-placement="bottom" title="P.O. Box 13840, RA08 – NB03 Jebel Ali Free Zone Dubai, UAE">
                       <img src="{{ asset('public/front/images/location.png') }}" alt="location" class=" img-fluid location-img">
                </a>
               
                <a href="javascript:void(0)" class="dubai" data-bs-toggle="tooltip" data-bs-placement="top" title="Plot No. 3690251, Al Quoz Ind. Area 4, P.O. Box 13840, Dubai, UAE">
                    <img src="{{ asset('public/front/images/location.png') }}" alt="location" class=" img-fluid location-img">
                </a>
           </div>
       </div>
   </div>
</section>
    <section class="why_choose_us section">
        <div class="container">
            <h2 class="main_head text-center">Why Choose Us</h2>
            <div class="effect_line position-relative col-md-6"></div>
            <div class="timeline">
                <img src="{{ asset('public/front/images/round.png') }}" alt="Left Icon" class="left">
                <img src="{{ asset('public/front/images/round.png') }}" alt="Right Icon" class="right">
                @foreach($whychoosedata->take(5) as $whychoose)
                <div class="icon_wrapper">
                    <h5 class="">{{$whychoose->title}}</h5>
                    <div class="why_choose_circle">
                        <img src="{{ asset('public/whychoose_image/'.$whychoose->image) }}" alt="{{$whychoose->alt}}">
                    </div>
                    <div class="plus_circle" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-html="true"
                        title="{!! $whychoose->description !!}">
                        <svg viewBox="0 0 24 24" fill="white" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 5V19M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="linkedin_feed client_swiper_slider position-relative section">
        <!--<div class="container">-->
        <!--    <div class="row">-->
        <!--        <div class="col-md-9">-->
        <!--            <h2 class="main_head main_head_line">Latest LinkedIn Feed</h2>-->
        <!--        </div>-->
        <!--        <div class="col-lg-12 mt-5">-->
        <!--            <script src="https://static.elfsight.com/platform/platform.js" async></script>-->
        <!--            <div class="elfsight-app-3d4d170e-3438-4d41-ac7d-e7add6604e09" data-elfsight-app-lazy></div>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->
        <div class="container">
    <div class="row">
        <div class="col-md-9">
                <h2 class="main_head main_head_line">Latest LinkedIn Feed</h2>
            </div>
        <div class="col-md-3 text-end position-relative">
                    <!-- Swiper Navigation Buttons with Images -->
                    <div class="swiper-buttons ">
                        <div class="swiper-button-prev">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none">
                                <path d="M10.5 19.5L3 12M3 12L10.5 4.5M3 12H21" stroke="white" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="swiper-button-next">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24" fill="none">
                                <path d="M13.5 19.5L21 12M21 12L13.5 4.5M21 12H3" stroke="white" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </div>
                </div>
     
    </div>

<div class="row">
    <div class="swiper swiper-container linkedin-slider">
        <div class="swiper-wrapper">
            @forelse ($feed as $post)
                <div class="swiper-slide">
                    <div class="Catalogues_card">
                        @php
                            $description = $post['text']['text'] ?? '';
                            $media = $post['content']['contentEntities'][0]['thumbnails'][0]['imageSpecificContent']['url']
                                      ?? $post['content']['contentEntities'][0]['entityLocation']
                                      ?? null;

                            // Construct LinkedIn post URL using activity URN
                            $activityUrn = $post['activity'] ?? null;
                            $permalink = $activityUrn ? 'https://www.linkedin.com/feed/update/' . $activityUrn : '#';
                        @endphp

                        @if ($media)
                            <img src="{{ $media }}" alt="LinkedIn Post" class="img-fluid linkedin_img mb-2">
                        @endif

                        <div class="Catalogues_card_txt">
                            @if (!empty($description))
                                <p>{{ Str::limit($description, 100) }}</p>
                            @endif
                            <a href="{{ $permalink }}" class="btn btn--ripple mt-3" target="_blank">
                                View on LinkedIn
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="swiper-slide">
                    <div class="Catalogues_card_txt">
                        <p>No LinkedIn posts found.</p>
                    </div>
                </div>
            @endforelse
        </div>
    </div>
</div>

</div>
    </section>
   
    <section class="section_space position-relative d-none">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h2 class="main_head main_head_line"> Golden Harbour in Action</h2>
                    <p>Be part of groundbreaking industry events where Golden Harbour showcases its expertise and
                        world-class products. Don’t miss the opportunity to collaborate and network.</p>
                </div>
                <div class="col-md-4 text-start text-md-end">
                    <a href="{{ route('event') }}" class="btn btn--ripple" id="ripple">Explore Our Events <svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="white" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg></a>
                </div>
            </div>
            <div class="row mt-4">
                @foreach($eventdata->take(4) as $event)
                <div class="col-md-3">
                    <div class="action_card">
                        <div>
                            <img src="{{ asset('public/event_home_image/'. $event->home_image) }}" alt="{{  str_replace(['-', '_'],' ', pathinfo($event->home_image, PATHINFO_FILENAME)) }}"
                                class="img-fluid">
                        </div>
                        <div class="action_content row g-0">
                            <div class="col-md-3 col-3 mt-2">
                                <div class="action_month">
                                    {{ \Carbon\Carbon::parse($event->event_start_date)->format('M') }}</div>
                                <h3 class="action_date mb-0">
                                    {{ \Carbon\Carbon::parse($event->event_start_date)->format('d') }}</h3>
                                <p class="action_year">
                                    {{ \Carbon\Carbon::parse($event->event_start_date)->format('Y') }}</p>
                            </div>
                            <div class="col-md-8 col-8">
                                <h3 class="sub_title">{{ $event->title }}</h3>
                                <p>{!! $event->short_description !!}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
     <section class="section_space client_swiper_slider position-relative d-none">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-md-9">
                    <h2 class="main_head main_head_line">Hear from Our Valued Clients</h2>
                </div>
                <div class="col-md-3 text-end position-relative">
                    <div class="swiper-buttons ">
                        <div class="swiper-button-prev">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"
                                fill="none">
                                <path d="M10.5 19.5L3 12M3 12L10.5 4.5M3 12H21" stroke="white" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                        <div class="swiper-button-next">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"
                                fill="none">
                                <path d="M13.5 19.5L21 12M21 12L13.5 4.5M21 12H3" stroke="white" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
 
            <div class="swiper swiper-container our-client">
                <div class="swiper-wrapper">
                    @foreach($clientdata as $client)
                    <div class="swiper-slide">
                        <div class="clients_card">
                            <img src="{{ asset('public/front/images/quote_icon.svg') }}" alt="quote" class="quote_icon">
                            <p>{!! $client->description !!}</p>
                            <div class="clients_card_logobody">
                                <div>
                                    <img src="{{ asset('public/valuableclient_image/' . $client->image) }}"
                                        alt="{{ $client->name }}">
                                </div>
                                <div class="client_title">
                                    <h3>{{ $client->name }}</h3>
                                    <p>{{ $client->designation }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <section class="catalog_wrapper section">
        <div class="container">
            <div class=" cta-block-inner ">
                <div class="cta-heading">
                    <h2 class="catalog_title">
                        Simplify Your Search with Our E-Catalog
                    </h2>
                    <div class="cta-top-line"></div>
                    <div class="cta-left-line"></div>
                </div>
                <div class="cta-border-line-top"></div>
                <div class="cta-border-line-bottom"></div>
                <div class="cta-block-p">
                    <p>
                        Discover our complete product portfolio in one convenient e-catalog. From marine valves to
                        hydraulic
                        fittings, explore everything we have to offer. Our latest product catalog to find high-quality
                        solutions for your business. Easy to navigate and ready for download
                    </p>
                </div>
                <div class="cta-talk-to-us-wrapper">
                    <div class="cta-talk-to-us-arrow-wrapper">
                        <div class="talk-to-us-arrow-line">
                        </div>
                        <div class="main-link-group">
                            <a  class="btn btn--ripple" data-bs-toggle="modal" data-bs-target="#staticBackdrop" id="ripple">Download Our
                                Catalogue
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="white"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="dark-circle"></div>
    </section>
    <section class="section_space position-relative section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h2 class="main_head main_head_line"> A Strong Network of Excellence</h2>
                </div>
                <div class="col-md-5 text-start text-md-end">
                    <a class="btn btn--ripple" id="ripple" href="{{ route('our-agencies') }}">Explore Our Principals <svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="white" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg></a>
                </div>
            </div>
            <div class="strong_network">
                <div class="network_slider">
                    @foreach($networkdata as $network)
                    <div class="network_box">
                        <img src="{{ asset('public/network_image/'.$network->image) }}" alt="{{ $network->alt }}"
                            class="img-fluid">
                    </div>
                    @endforeach
                </div>

                <div class="custom-pagination">
                    <span class="current-slide network">01</span>
                    <div class="progress-bar">
                        <div class="progress-fill network"></div>
                    </div>
                    <span class="total-slides network">{{ count($networkdata) }}</span>
                </div>
            </div>
        </div>
    </section>
</div>
    @include('layouts.frontfooter')

    