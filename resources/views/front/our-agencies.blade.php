@include('layouts.frontheader', [
    'og_image' => asset('public/front/images/headerbanner/ouragencies_hed_img.png')
])
<section class=" news_details_header_main my-5">
    <div class=" container-fluid px-lg-0">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <div class="col"></div> 
            <div class="col-12 col-lg-5 me-30">
                <div class="">
                    <h6 class="main_routing_home">
                            <a href="{{ url('/') }}">HOME ></a>
                <span> About > </span>
                  <span class="routing_home_news"> Our Partners</span>
                            </h6>
                    <h1 class="main_head">Our Principals</h1>
                    <!-- <h2 class="main_head_small">A Leader in Specialized Engineering Solutions</h2> -->
                    <p class="card-text ">Golden Harbour partners with leading global manufacturers to deliver trusted, high-performance solutions across the marine, offshore, oilfield, and industrial sectors. Our long-standing alliances reflect our commitment to quality, innovation, and operational excellence.

                    </p>
                    <!--<p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>-->
                </div>
            </div>
            <div class="col-12 col-lg-6 d-flex justify-content-end">
                <img src="{{ asset('public/front/images/headerbanner/ouragencies_hed_img.png') }}"
                    class="img-fluid" alt="ouragencies hed img">
            </div>
        </div>
    </div>
</section>
<section class="section_space mb-3">
    <div class="container">
        <div class="row gy-5">
            @foreach($principals as $principal)
            <div class="col-md-4">
                <div class="Principal_item">
                    <div class="Principal_item_img">
                        <img src="{{ asset('public/our_principals_logos/'. $principal->principals_logo) }}" alt="{{  str_replace(['-', '_'],' ', pathinfo($principal->principals_logo, PATHINFO_FILENAME)) }}">
                    </div>
                    <div class="Principal_item_contant">
                        <h3 class="Principal_item_subhed">Material :</h3>
                        <div class="Principalsubtext">{!! $principal->material !!}</div>
                    </div>
                    <div class="Principal_item_borderbottom"></div>
                    <div class="Principal_item_contant">
                        <h3 class="Principal_item_subhed">Country :</h3>
                        <p class="mb-0">{{ $principal->country }}</p>
                        <img src="{{ asset('public/our_principals_flag/'. $principal->flag_logo) }}" alt="{{  str_replace(['-', '_'],' ', pathinfo($principal->flag_logo, PATHINFO_FILENAME)) }}">
                    </div>
                    @php
                        $url = $principal->website;
                        $cleanHost = parse_url($url, PHP_URL_HOST) ?? Str::afterLast($url, '/');
                    @endphp
                    <div class="Principal_item_borderbottom"></div>
                    <div class="Principal_item_contant">
                        <h3 class="Principal_item_subhed">Website :</h3>
                        <a href="https://{{ $cleanHost }}" class="mb-0" target="_blank" rel="noopener noreferrer">
                            {{ $cleanHost }}
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<section class="clientele section_pt white">
         <h2 class="main_head main_head_line text-center">brands we stock</h2>
        <div class="partner_slider">
            @foreach($agencyslider as $data)
                <div>
                    <img src="{{ asset('public/agencyslider/'.$data->slider_image) }}" alt="{{$data->alt}}">
                </div>
            @endforeach
        </div>
        
    </section>
    
    <script>
        $(document).ready(function() {
  const $partnerSlider = $('.partner_slider');

  $partnerSlider.slick({
    infinite: true,
    slidesToShow: 8,
    slidesToScroll: 1,
    dots: false,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 0,
    speed: 5000,
    cssEase: 'linear',
    pauseOnFocus: false,
    pauseOnHover: false,
    responsive: [
      {
        breakpoint: 1440,
        settings: {
          slidesToShow: 6,
        }
      },
      {
        breakpoint: 1024,
        settings: {
          slidesToShow: 5,
        }
      },
      {
        breakpoint: 768,
        settings: {
          slidesToShow: 2,
        }
      }
    ]
  });
});

    </script>
    
    
@include('layouts.frontfooter')