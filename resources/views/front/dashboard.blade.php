@include('layouts.frontheader', [
    'og_image' => asset('public/front/images/new_index/new_hero.webp')
])
<style>
    html, body {
    scroll-behavior: smooth;

  overscroll-behavior: none;


}
.new_home section {
    transition: all 0.5s ease;
}
.new_home {
    position: relative;
}
::-webkit-scrollbar {
    width: 5px
}

::-webkit-scrollbar-track {
    background: #cfe5ff;
    border-radius: 10px
}

::-webkit-scrollbar-thumb {
    border-radius: 10px;
    background: #C4A458;
}
.new_hero_content_2  ul {
    padding-left: 1rem;
}
.btn-close:hover {
    filter: invert(1) !important;
}
</style>
<div class="new_home">
    <section class="new_hero dark">
        <div class="container">
            <div class="new_hero_wrapper">
                <div class="new_hero_content_1">
                    <h1 class="text-white">This is Golden harbour, The Gold Standard.</h1>
                </div>
                <div class="new_hero_content_2 col-lg-4">
                    <ul class="text-white">
                        <li>
                            Your Strategic Partner for Oil & Gas, Offshore, Onshore, Marine & Industrial Supply Solutions
                        </li>
                        <li>Home to the Middle East's Largest Nonferrous Stock</li>
                        <li>A Legacy of Trust and Reliability Since 1938.</li>
                    </ul>
                    <!--<p class="text-white">Your Strategic Partner for Oil & Gas, Offshore, Onshore, Marine & Industrial Supply Solutions | Home to the Middle East's Largest Nonferrous Stock | A Legacy of Trust and Reliability Since 1938.</p>-->
                    <a class="btn btn--ripple" id="ripple" href="{{ route('contact') }}" onclick="localStorage.setItem('scrollToBuildTogether','1')">Get in Touch<svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="#fff" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg></a>
                </div>
            </div>
        </div>
    </section>
    <section class="clientele section_pt white">
        <div class="partner_slider">
            @foreach($homeslider as $slider)
                <div>
                    <img src="{{ asset('public/homeslider/'.$slider->slider_image) }}" alt="{{$slider->alt}}">
                </div>
            @endforeach
        </div>
         <div class="partner mt-100 white">
        <div class="container">
            <div class="row">
                <!--<div class="col-lg-6">-->
                <!--    <div class="partner_img_wrapper">-->
                <!--        <figure class="reveal overlay-anim">-->
                <!--            <img src="{{ asset('public/front/images/new_index/partner_1.webp') }}" alt="partner"-->
                <!--                class="img-fluid partner_img_1">-->
                <!--        </figure>-->
                <!--        <figure class="reveal overlay-anim">-->
                <!--            <img src="{{ asset('public/front/images/new_index/partner_2.webp') }}" alt="partner"-->
                <!--                class="img-fluid partner_img_2">-->
                <!--        </figure>-->
                <!--        <div class="partner_3">-->
                <!--            <img src="{{ asset('public/front/images/new_index/partner_3.webp') }}" alt="partner"-->
                <!--                class="img-fluid">-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
                <div class="col-lg-12 partner_txt">
                    <h2 class="main_head mb-2 mb-xxl-5" data-aos="zoom-in-up"data-aos-duration="800"data-aos-easing="ease-out-cubic"data-aos-delay="0">Your Partner in Industrial Solutions</h2>
                    <p data-aos="fade-up"data-aos-duration="800"data-aos-easing="ease-out-cubic"data-aos-delay="150">At Golden Harbour, we don’t just supply products, we build enduring partnerships that power
                        progress. With a legacy spanning over three decades, we have become one of the UAE’s most
                        trusted
                        providers of engineering products, industrial materials, and technical solutions.</p>
                    <p data-aos="fade-up"data-aos-duration="800"data-aos-easing="ease-out-cubic"data-aos-delay="300">Driven by quality, guided by innovation, and grounded in integrity, we support diverse
                        sectors
                        including oil & gas, marine, construction, and manufacturing, ensuring they run safer,
                        smarter,
                        and more efficiently. Every product we deliver is backed by a commitment to precision, performance, and people. Our expert team brings not only deep technical know-how but also a genuine dedication to understanding your needs and delivering with care.</p>
                    <!--<p data-aos="fade-up"data-aos-duration="800"data-aos-easing="ease-out-cubic"data-aos-delay="450">Every product we deliver is backed by a commitment to precision, performance, and people. Our-->
                    <!--    expert team brings not only deep technical know-how but also a genuine dedication to-->
                    <!--    understanding your needs and delivering with care.</p>-->
                    <!--<p data-aos="fade-up"data-aos-duration="800"data-aos-easing="ease-out-cubic"data-aos-delay="600">Whether you're building infrastructure, maintaining critical assets, or driving industrial-->
                    <!--    excellence, we are always by your side, every step of the way.</p>-->
                </div>
                <div class="col-lg-12">
                    <div class="row partner_counter_wrapper">
                        <div class="partner_counter col-lg-3">                            
                            <h2 class="count" data-count="51000" data-suffix="+">0</h2>
                            <p class="mb-0">SKU’s always available, <br/> ready to ship </p>
                        </div>
                        <div class="partner_counter col-lg-3">
                            <h2 class="count" data-count="3500" data-suffix="+">0</h2>
                            <p class="mb-0">Key Project Orders delivered worldwide across various industries </p>
                        </div>
                        <div class="partner_counter col-lg-3">
                            <h2 class="count" data-count="35" data-suffix="+">0</h2>
                            <p class="mb-0">Years of excellence built on quality, driven by integrity</p>
                        </div>
                        <div class="partner_counter col-lg-3">
                            <h2 class="count" data-count="5" data-suffix="+">0</h2>
                            <p class="mb-0">Office locations and Multiple distribution Centers</p>
                        </div>
                    </div>
                </div>
            </div>
            </div>
    </div>
    </section>
   
    <section class="shape viewport mt-100 dark" style="background-color: rgba(0,0,0,0.5);">
        <div class="container">
            <div class="shape_container  d-none d-lg-block">
                <div class="row align-items-center">
                    <div class="col-md-9">
                        <h2 class="main_head main_head_line text-white">Shaping Industrial Excellence</h2>
                        <p class="mb-0 text-white">Excellence in industry isn't built overnight, it’s forged through
                            precision,
                            performance, and purpose. Across every sector we serve, our focus remains the same:
                            delivering
                            dependable engineering products and solutions that keep operations running safely,
                            efficiently, and
                            without compromise. With a deep understanding of mission-critical environments, we help
                            industries
                            move forward with confidence.</p>
                    </div>
                    <div class="col-md-3 text-end position-relative">
                        <a class="btn btn--ripple" id="ripple" href="{{ route('industries') }}">Explore All Industries <svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="#182A41"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg></a>
                    </div>

                </div>
                <div class="row shape_info_wrapper ">
                    <div class="col-lg-3">
                        <div class="shape_info active" data-bg="url('public/front/images/new_index/shape_inds.webp')">
                            <h6 class="shape_title text-start">Oil & Gas</h6>
                            <p>Meeting the rigorous demands of the oil and gas sector with certified, high-performance products designed for safety, efficiency, and extreme environments. From exploration to refining, we help drive operations that power the world.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="shape_info" data-bg="url('public/front/images/new_index/energy_power.webp')">
                            <h6 class="shape_title text-start">Energy and Power</h6>
                            <p>Supporting power generation and distribution with engineering solutions built to perform under 
                                pressure. Whether conventional or renewable, our components deliver stability, continuity, and 
                                long-term operational excellence.</p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="shape_info" data-bg="url('public/front/images/new_index/ship_building.webp')">
                            <h6 class="shape_title text-start">Shipbuilding and Repair</h6>
                            <p>Equipping the marine sector with precision-engineered products essential for shipbuilding, retrofitting, and repair. Our range ensures structural integrity, seaworthiness, and reliability even in the most challenging maritime conditions.
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="shape_info" data-bg="url('public/front/images/new_index/offshore.webp')">
                            <h6 class="shape_title text-start">Offshore & Onshore</h6>
                            <p> From offshore platforms to onshore facilities, we provide robust solutions that thrive in harsh, high-risk environments. Engineered for resilience and tested for performance, our products support critical operations every step of the way.
                             </p>
                        </div>
                    </div>
                </div>
            </div>
             <div class="shape_container d-block d-lg-none">
                <div class="row align-items-center">
                    <div class="col-md-9">
                        <h2 class="main_head main_head_line text-white">Shaping Industrial Excellence</h2>
                        <p class="mb-0 text-white">Excellence in industry isn't built overnight, it’s forged through
                            precision,
                            performance, and purpose. Across every sector we serve, our focus remains the same:
                            delivering
                            dependable engineering products and solutions that keep operations running safely,
                            efficiently, and
                            without compromise. With a deep understanding of mission-critical environments, we help
                            industries
                            move forward with confidence.</p>
                    </div>
                    <div class="col-md-3 text-start position-relative">
                        <a class="btn btn--ripple" id="ripple" href="{{ route('industries') }}">Explore All Industries <svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="#182A41"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg></a>
                    </div>

                </div>
                <div class="industrial_solutions pt-5">
                <div class="shape_info_slider">
                       <div class="shape_info_mobile">
                            <div>
                                <img src="{{ asset('public/front/images/Energy-and-Power.png') }}" alt="Oil-gas" class="img-fluid mb-3 bd_10">
                            </div>
                             <h6 class="shape_title text-start">Oil & Gas</h6>
                            <p class="text-white">Meeting the rigorous demands of the oil and gas sector with certified, high-performance products designed for safety, efficiency, and extreme environments. From exploration to refining, we help drive operations that power the world.
                            </p>
                        </div>
                        <div class="shape_info_mobile">
                            <div>
                                <img src="{{ asset('public/front/images/Oil-gas.png') }}" alt="Energy-and-Power" class="img-fluid mb-3 bd_10">
                            </div>
                            <h6 class="shape_title text-start">Energy and Power</h6>
                            <p class="text-white">Supporting power generation and distribution with engineering solutions built to perform under 
                                pressure. Whether conventional or renewable, our components deliver stability, continuity, and 
                                long-term operational excellence.</p>
                        </div>
                        <div class="shape_info_mobile">
                            <div>
                                <img src="{{ asset('public/front/images/Shipbuilding-and-Repair.png') }}" alt="Shipbuilding-and-Repair" class="img-fluid mb-3 bd_10">
                            </div>
                            <h6 class="shape_title text-start">Shipbuilding and Repair</h6>
                            <p class="text-white">Equipping the marine sector with precision-engineered products essential for shipbuilding, retrofitting, and repair. Our range ensures structural integrity, seaworthiness, and reliability even in the most challenging maritime conditions.
                            </p>
                        </div>
                        <div class="shape_info_mobile">
                            <div>
                                <img src="{{ asset('public/front/images/Offshore-Onshore.png') }}" alt="Offshore-Onshore" class="img-fluid mb-3 bd_10">
                            </div>
                            <h6 class="shape_title text-start">Offshore & Onshore</h6>
                            <p class="text-white"> From offshore platforms to onshore facilities, we provide robust solutions that thrive in harsh, high-risk environments. Engineered for resilience and tested for performance, our products support critical operations every step of the way.
                             </p>
                        </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    <section class="one_stop mt-100 viewport white">
        <div class="container">
            <div class="row text-center justify-content-center">
                <h2 class="main_head text-center col-md-12">Non-Ferrous. Non-Stop.</h2>
            </div>
            <div class="industrial_solutions pt-4">
                <div class="industrial_slider">
                    @foreach($industrialsolutiondata as $industrialsolution)
                        <div class="industrial_box">
                            <a href="{{ route('subcategorylist',['category'=>$industrialsolution->url])}}">
                            <img src="{{ asset('public/industrysolution_image/'.$industrialsolution->front_image) }}" 
                                 alt="{{ $industrialsolution->alt }}" 
                                 class="img-fluid">
                            </a>
                            
                             <h3><a href="{{ route('subcategorylist',['category'=>$industrialsolution->url])}}">
                                    {{ $industrialsolution->title }}
                                </a>
                            </h3>
                            
                            {!! $industrialsolution->short_description !!}
                            <a class="btn btn--ripple" id="ripple" href="{{ route('subcategorylist',['category'=>$industrialsolution->url])}}">Explore Products<svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="#fff" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg></a>
                            
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
    <section class="why mt-100 viewport dark">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="why_left">
                        <div>
                            <h2 class="main_head text-white mb-4">Why Choose Us</h2>
                            <ul class="nav nav-tabs flex-column" id="myTab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                        data-bs-target="#home" type="button" role="tab" aria-controls="home"
                                        aria-selected="true">
                                        <span style="color:#557AA9">01</span>
                                        Comprehensive Product Range
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                                        data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                                        aria-selected="false">
                                        <span style="color:#557AA9">02</span>
                                        Trusted Partner
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="messages-tab" data-bs-toggle="tab"
                                        data-bs-target="#messages" type="button" role="tab" aria-controls="messages"
                                        aria-selected="false">
                                        <span style="color:#557AA9">03</span>
                                        Experienced Team
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="settings-tab" data-bs-toggle="tab"
                                        data-bs-target="#settings" type="button" role="tab" aria-controls="settings"
                                        aria-selected="false">
                                        <span style="color:#557AA9">04</span>
                                        Global Sourcing
                                    </button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="customer-tab" data-bs-toggle="tab"
                                        data-bs-target="#customer" type="button" role="tab" aria-controls="customer"
                                        aria-selected="false">
                                        <span style="color:#557AA9">05</span>
                                        Customer-Centric Approach
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="why_right">
                      <div class="why_bg" id="whyBg">
                        <div class="tab-content" id="myTabContent">
                          <div class="tab-pane show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="why_ctnt">
                              <h2 class="text-white  mb-0">51,000+</h2> <h2 class="text-white mb-0"> certified SKUs for</h2> <h2 class="text-white mb-0"> every industry</h2>
                            </div>
                          </div>
                    
                          <div class="tab-pane" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="why_ctnt">
                              <h2 class="text-white  mb-0">Proven reliability</h2> <h2 class="text-white mb-0">across decades of </h2> <h2 class="text-white mb-0"> industry service.</h2>
                            </div>
                          </div>
                    
                          <div class="tab-pane" id="messages" role="tabpanel" aria-labelledby="messages-tab">
                            <div class="why_ctnt">
                              <h2 class="text-white  mb-0">Skilled experts delivering technical precision.</h2>
                            </div>
                          </div>
                    
                          <div class="tab-pane" id="settings" role="tabpanel" aria-labelledby="settings-tab">
                            <div class="why_ctnt">
                              <h2 class="text-white  mb-0">Sourcing excellence from world-class manufacturers.</h2>
                            </div>
                          </div>
                    
                          <div class="tab-pane" id="customer" role="tabpanel" aria-labelledby="customer-tab">
                            <div class="why_ctnt">
                              <h2 class="text-white  mb-0">Solutions built </h2> <h2 class="text-white mb-0">  around your needs </h2> <h2 class="text-white mb-0"> and priorities.</h2>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class=" mt-100 network viewport white">
        <div class="container">
            <div class="col-lg-8 mx-auto">
                <h2 class="main_head main_head_line text-center"> A Strong Network of Excellence</h2>
                <p class=" text-center text-md-start">
                    With world-class partners and decades of expertise, Golden Harbour ensures quality, precision, and dependable supply — a strong network of excellence built to support every critical industry.
                </p>
                <div class="text-center">
                    <a href="{{ route('industries') }}" class="btn btn--ripple"
                        id="ripple">Explore All Industries
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="white" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round"></path>
                        </svg></a>
                </div>
            </div>
            <div class="network_wrapper mt-5">
                <div class="row dd" id="network-images-row">
                    <div class="col-lg-3 col-6 net_box"><img src="{{ asset('public/front/images/new_index/acmbearings.webp') }}"
                            alt="acmbearings" class="img-fluid network-img fade-img"></div>
                    <div class="col-lg-3 col-6 net_box"><img src="{{ asset('public/front/images/new_index/alleima.webp') }}"
                            alt="alleima" class="img-fluid network-img fade-img"></div>
                    <div class="col-lg-3 col-6 net_box"><img src="{{ asset('public/front/images/new_index/bothwell.webp') }}"
                            alt="bothwell" class="img-fluid network-img fade-img"></div>
                    <div class="col-lg-3 col-6 net_box"><img src="{{ asset('public/front/images/new_index/classicfilters.webp') }}"
                            alt="classicfilters" class="img-fluid network-img fade-img"></div>
                    <div class="col-lg-3 col-6 net_box"><img src="{{ asset('public/front/images/new_index/emb-eifel.webp') }}"
                            alt="emb-eifel" class="img-fluid network-img fade-img"></div>
                    <div class="col-lg-3 col-6 net_box"><img src="{{ asset('public/front/images/new_index/eucaro.webp') }}"
                            alt="eucaro" class="img-fluid network-img fade-img"></div>
                    <div class="col-lg-3 col-6 net_box"><img src="{{ asset('public/front/images/new_index/hailiang.webp') }}"
                            alt="hailiang" class="img-fluid network-img fade-img"></div>
                    <div class="col-lg-3 col-6 net_box"><img src="{{ asset('public/front/images/new_index/hoke.webp') }}"
                            alt="hoke" class="img-fluid network-img fade-img"></div>
                </div>
            </div>
        </div>
    </section>
    @if ($hasLinkedinFeed)
    <section class="mt-100 linkedin_feed client_swiper_slider position-relative viewport dark"
            style="background: var(--blue);">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h2 class="main_head main_head_line text-white">Latest LinkedIn Feed</h2>
                </div>
                <div class="col-md-3 text-md-end text-start position-relative">
                    <a class="btn btn--ripple" id="ripple"
                       href="https://www.linkedin.com/company/golden-harbour-llc">
                        Follow Us on LinkedIn
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                             viewBox="0 0 24 24" fill="none">
                            <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75"
                                  stroke="#182A41" stroke-width="1.5"
                                  stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>
            </div>
    
            <div class="row">
                <div class="swiper swiper-container linkedin-slider">
                    <div class="swiper-wrapper">
                        @foreach ($feed as $post)
                            @php
                                $description = $post['text']['text'] ?? '';
                                $media = $post['content']['contentEntities'][0]['thumbnails'][0]['imageSpecificContent']['url']
                                    ?? $post['content']['contentEntities'][0]['entityLocation']
                                    ?? null;
    
                                $activityUrn = $post['activity'] ?? null;
                                $permalink = $activityUrn
                                    ? 'https://www.linkedin.com/feed/update/' . $activityUrn
                                    : '#';
                            @endphp
    
                            <div class="swiper-slide">
                                <a href="{{ $permalink }}" class="Catalogues_card" target="_blank">
                                    @if ($media)
                                        <img src="{{ $media }}" alt="LinkedIn Post"
                                             class="img-fluid linkedin_img mb-2">
                                    @endif
    
                                    @if (!empty($description))
                                        <div class="Catalogues_card_txt">
                                            <p>{{ Str::limit($description, 100) }}</p>
                                        </div>
                                    @endif
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <section class=" viewport white flex-wrap" style="height: 100%;">
        
        <div class="container map-space dark">
            <div class="row align-items-center">
                <div class="col-md-5 global-contant mt-0 mt-md-5 mb-md-0 mb-5">
                    <h2 class="main_head mt-3">Strategic Footprint | Global Supply </h2>
                    <p>We leverage our established regional presence to cut logistics time, guaranteeing immediate stock access and efficient fulfillment for your critical projects.</p>
                </div>
                <div class="col-md-7">
                    <img src="{{ asset('public/front/images/maps-country.png') }}" alt="map" class="img-fluid">
                    <!--<img src="{{ asset('public/front/images/bahrain-map.png') }}" alt="map" class="img-fluid bahrain">-->
                    <!--<a href="javascript:void(0)" class="bahrain-location" data-bs-toggle="tooltip"-->
                    <!--    data-bs-placement="top" title="Flat 3, Building 50486, HIDD, Kingdom of Bahrain">-->
                    <!--    <img src="{{ asset('public/front/images/location.png') }}" alt="location" class=" img-fluid" style=" height: 42px; ">-->
                    <!--</a>-->
                    <!--<a href="javascript:void(0)" class="abu-dhabi" data-bs-toggle="tooltip" data-bs-placement="top"-->
                    <!--    title="Door 2, Mussafah M-37, Abu Dhabi, UAE">-->
                    <!--    <img src="{{ asset('public/front/images/location.png') }}" alt="location" class=" img-fluid" style=" height: 42px; ">-->
                    <!--</a>-->
                    <!--<a href="javascript:void(0)" class="jebel-ali" data-bs-toggle="tooltip" data-bs-placement="top"-->
                    <!--     title="P.O. Box 13840, RA08 – NB03 Jebel Ali Free Zone Dubai, UAE">-->
                    <!--    <img src="{{ asset('public/front/images/location.png') }}" alt="location" class=" img-fluid" style=" height: 42px; ">-->
                    <!--</a>-->

                    <!--<a href="javascript:void(0)" class="dubai" data-bs-toggle="tooltip" data-bs-placement="top"-->
                    <!--    title="Plot No. 3690251, Al Quoz Ind. Area 4, P.O. Box 13840, Dubai, UAE">-->
                    <!--    <img src="{{ asset('public/front/images/location.png') }}" alt="location" class=" img-fluid" style=" height: 42px; ">-->
                    <!--</a>-->
                </div>
            </div>
        </div>
        
        <div class="catalog_wrapper dark home_page_catalog light">
            <div class="cta-block-inner p-2">
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
                            <a data-bs-toggle="modal" data-bs-target="#e-catalogue" class="btn btn--ripple" id="ripple">Download Our
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
        
    </section>
    <!--<section class="section_space catalog_wrapper dark">-->
    <!--    <div class="container">-->
    <!--        <div class=" cta-block-inner ">-->
    <!--            <div class="cta-heading">-->
    <!--                <h2 class="catalog_title">-->
    <!--                    Simplify Your Search with Our E-Catalog-->
    <!--                </h2>-->
    <!--                <div class="cta-top-line"></div>-->
    <!--                <div class="cta-left-line"></div>-->
    <!--            </div>-->
    <!--            <div class="cta-border-line-top"></div>-->
    <!--            <div class="cta-border-line-bottom"></div>-->
    <!--            <div class="cta-block-p">-->
    <!--                <p>-->
    <!--                    Discover our complete product portfolio in one convenient e-catalog. From marine valves to-->
    <!--                    hydraulic-->
    <!--                    fittings, explore everything we have to offer. Our latest product catalog to find high-quality-->
    <!--                    solutions for your business. Easy to navigate and ready for download-->
    <!--                </p>-->
    <!--            </div>-->
    <!--            <div class="cta-talk-to-us-wrapper">-->
    <!--                <div class="cta-talk-to-us-arrow-wrapper">-->
    <!--                    <div class="talk-to-us-arrow-line">-->
    <!--                    </div>-->
    <!--                    <div class="main-link-group">-->
    <!--                        <a data-bs-toggle="modal" data-bs-target="#staticBackdrop" class="btn btn--ripple" id="ripple">Download Our-->
    <!--                            Catalog-->
    <!--                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"-->
    <!--                                fill="none">-->
    <!--                                <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="white"-->
    <!--                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />-->
    <!--                            </svg>-->
    <!--                        </a>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
        <!--<div class="dark-circle"></div>-->
    <!--</section>    -->
</div>
<!--adipec popup-->

<!-- Modal -->
<!--<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">-->
<!--  <div class="modal-dialog modal-dialog-centered">-->
<!--    <div class="modal-content">-->
<!--      <div class="modal-header border-0 p-0">-->
<!--        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style=" position: absolute; right: 5%; top: 6%; z-index: 99; opacity: 1;scale: 0.8;filter: invert(1);"></button>-->
<!--      </div>-->
<!--      <div class="modal-body">-->
<!--         <a href="https://www.adipec.com/" target="_blank">-->
<!--            <img src="{{asset('public/front/images/gh_popup.png')}}" class="img-fluid">-->
<!--        </a>-->
<!--      </div>-->
<!--    </div>-->
<!--  </div>-->
<!--</div>-->
<script>
//   document.addEventListener("DOMContentLoaded", function() {
//     setTimeout(function() {
//       var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
//       myModal.show();
//     }, 2000); // 2000ms = 2 seconds
//   });
</script>
<!--adipec popup-->
<!-- fullPage.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/4.0.29/fullpage.min.js"></script>
<!--gsap-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>





<!-- script for shape -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const infos = document.querySelectorAll('.shape_info');
        infos.forEach(function (info) {
            info.addEventListener('mouseenter', function () {
                infos.forEach(i => i.classList.remove('active'));
                info.classList.add('active');
            });
            info.addEventListener('mouseleave', function () {
                // Optionally keep the last hovered active, or revert to first
            });
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", () => {
        const shapeSection = document.querySelector(".shape");
        const shapeInfos = document.querySelectorAll(".shape_info");

        function updateBackground() {
            const active = document.querySelector(".shape_info.active");
            if (active && active.dataset.bg) {
                shapeSection.style.backgroundImage = active.dataset.bg;
            }
        }

        // Initial check
        updateBackground();

        // If active class changes dynamically (e.g., on hover/click), observe it
        const observer = new MutationObserver(updateBackground);
        shapeInfos.forEach(info => {
            observer.observe(info, { attributes: true, attributeFilter: ["class"] });
        });

        // Optional: if you want to change active on click
        shapeInfos.forEach(info => {
            info.addEventListener("click", () => {
                shapeInfos.forEach(i => i.classList.remove("active"));
                info.classList.add("active");
                updateBackground();
            });
        });
    });
</script>
    <!-- script for random image change -->
    <script>
document.addEventListener('DOMContentLoaded', () => {
  const images = [
    "{{ asset('public/front/images/new_index/alleima.webp') }}",
    "{{ asset('public/front/images/new_index/classicfilters.webp') }}",
    "{{ asset('public/front/images/new_index/emb-eifel.webp') }}",
    "{{ asset('public/front/images/new_index/eucaro.webp') }}",
    "{{ asset('public/front/images/new_index/hailiang.webp') }}",
    "{{ asset('public/front/images/new_index/hoke.webp') }}",
    "{{ asset('public/front/images/new_index/lmcmakina.webp') }}",
    "{{ asset('public/front/images/new_index/multimetals.webp') }}",
    "{{ asset('public/front/images/new_index/racmet.webp') }}",
    "{{ asset('public/front/images/new_index/tristube.webp') }}",
    "{{ asset('public/front/images/new_index/uni-coupling-com.webp') }}",
     "{{ asset('public/front/images/new_index/viraj.webp') }}"
    // add more if needed
  ];

  const slides = document.querySelectorAll("#network-images-row .fade-img");
  const visibleSet = new Set(); // track current 8 unique images

  // Fisher-Yates shuffle
  function shuffle(arr) {
    for (let i = arr.length - 1; i > 0; i--) {
      const j = Math.floor(Math.random() * (i + 1));
      [arr[i], arr[j]] = [arr[j], arr[i]];
    }
    return arr;
  }

  // pick one random image not currently visible
  function getUniqueImage() {
    let candidate;
    do {
      candidate = images[Math.floor(Math.random() * images.length)];
    } while (visibleSet.has(candidate));
    return candidate;
  }

  // Initial fill: 8 unique images
  const initBatch = shuffle([...images]).slice(0, slides.length);
  slides.forEach((img, i) => {
    img.src = initBatch[i];
    visibleSet.add(initBatch[i]);
  });

  // Replace one image at a time every 2s
  let index = 0;
  setInterval(() => {
    const img = slides[index];
    const newSrc = getUniqueImage();
    visibleSet.delete(img.src);   // remove old from visible set

    img.classList.add("fade-out");
    setTimeout(() => {
      img.src = newSrc;
      img.classList.remove("fade-out");
      visibleSet.add(newSrc);     // add new to visible set
    }, 800);

    index = (index + 1) % slides.length; // next slot
  }, 2000); // adjust speed as needed
});
</script>

    <!-- section scroll script -->
    <script>

document.addEventListener("DOMContentLoaded", () => {
  const sections = Array.from(document.querySelectorAll(".new_home section"));
  if (!sections.length) return;

  let currentIndex = 0;
  let isScrolling = false;
  let wheelAccumulator = 0;
  let lastWheelTime = 0;
  let lastScrollTrigger = 0;   // <--- ADDED

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting && entry.intersectionRatio > 0.55) {
        currentIndex = sections.indexOf(entry.target);
      }
    });
  }, { threshold: [0.55, 0.6, 0.75] });

  sections.forEach(sec => observer.observe(sec));

  const scrollToIndex = (index) => {
    if (index < 0 || index >= sections.length) return;
    isScrolling = true;
    currentIndex = index;
    sections[index].scrollIntoView({ behavior: "smooth" });
    setTimeout(() => { isScrolling = false; }, 700);
  };

  window.addEventListener("wheel", (e) => {

    // ---- HARD SCROLL PREVENT DOUBLE TRIGGER ----
    const nowTime = Date.now();
    if (nowTime - lastScrollTrigger < 800) return;
    lastScrollTrigger = nowTime;
    // --------------------------------------------

    const now = Date.now();
    if (now - lastWheelTime > 200) wheelAccumulator = 0;
    lastWheelTime = now;

    wheelAccumulator += e.deltaY;

    if (isScrolling) {
      if (Math.abs(wheelAccumulator) > 1000)
        wheelAccumulator = Math.sign(wheelAccumulator) * 1000;
      return;
    }

    const THRESHOLD = 120;

    if (wheelAccumulator >= THRESHOLD && currentIndex < sections.length - 1) {
      wheelAccumulator = 0;
      scrollToIndex(currentIndex + 1);
    } else if (wheelAccumulator <= -THRESHOLD && currentIndex > 0) {
      wheelAccumulator = 0;
      scrollToIndex(currentIndex - 1);
    }
  }, { passive: true });

  window.addEventListener("keydown", (e) => {
    if (isScrolling) return;
    if (e.key === "ArrowDown" || e.key === "PageDown") {
      if (currentIndex < sections.length - 1) scrollToIndex(currentIndex + 1);
    } else if (e.key === "ArrowUp" || e.key === "PageUp") {
      if (currentIndex > 0) scrollToIndex(currentIndex - 1);
    }
  });
});
</script>

<!--gsap image animation-->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        if (document.querySelectorAll(".reveal").length) {
            gsap.registerPlugin(ScrollTrigger);

            let revealContainers = document.querySelectorAll(".reveal");

            revealContainers.forEach((container) => {
                let image = container.querySelector("img");

                let tl = gsap.timeline({
                    scrollTrigger: {
                        trigger: container,
                        toggleActions: "play none none none"
                    }
                });

                tl.set(container, { autoAlpha: 1, visibility: "visible" });

                tl.from(container, {
                    duration: 1.5,
                    xPercent: -100,
                    ease: "power2.out"
                });

                tl.from(image, {
                    duration: 1.5,
                    xPercent: 100,
                    scale: 1.3,
                    delay: -1.5,
                    ease: "power2.out"
                });
            });
        }
    });

</script>
<!--script for counter-->
<script>
    // counter
    document.addEventListener("DOMContentLoaded", () => {
        const counters = document.querySelectorAll(".count");

        const startCounter = (counter) => {
            const number = parseInt(counter.getAttribute("data-count").replace(/,/g, ""), 10);
            const suffix = counter.getAttribute("data-suffix") || "";
            let count = 0;

            const duration = 2000; // ms
            const startTime = performance.now();

            const updateCount = (now) => {
                const elapsed = now - startTime;
                const progress = Math.min(elapsed / duration, 1);

                count = Math.floor(progress * number);

                counter.textContent = count.toLocaleString() + suffix;

                if (progress < 1) {
                    requestAnimationFrame(updateCount);
                } else {
                    counter.textContent = number.toLocaleString() + suffix; // final value
                }
            };

            requestAnimationFrame(updateCount);
        };

        // Observe each counter instead of section
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    startCounter(entry.target);
                } else {
                    // reset when leaving viewport
                    entry.target.textContent = "0";
                }
            });
        }, { threshold: 0.5 }); // trigger when 50% visible

        counters.forEach(counter => observer.observe(counter));
    });
    // counter
    
</script>
 <!--script for change bg image of why section-->
     <script>
    document.addEventListener("DOMContentLoaded", function () {
    const whySection = document.querySelector(".why");
    const tabButtons = document.querySelectorAll('.why [data-bs-toggle="tab"]');

    tabButtons.forEach(btn => {
      btn.addEventListener("shown.bs.tab", function (e) {
        whySection.classList.remove("bg-home", "bg-profile", "bg-messages", "bg-settings", "bg-customer");

        const targetId = e.target.getAttribute("data-bs-target");

        if (targetId === "#home") whySection.classList.add("bg-home");
        if (targetId === "#profile") whySection.classList.add("bg-profile");
        if (targetId === "#messages") whySection.classList.add("bg-messages");
        if (targetId === "#settings") whySection.classList.add("bg-settings");
        if (targetId === "#customer") whySection.classList.add("bg-customer");
      });
    });
  });
 </script>
@include('layouts.frontfooter')