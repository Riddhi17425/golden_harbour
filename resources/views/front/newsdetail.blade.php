@include('layouts.frontheader')
<section class=" news_details_header_main">
    <div class="container-fluid px-lg-0">
        <div class="d-flex flex-wrap justify-content-between">
            <div class="col"></div>
            <div class=" col-12 col-lg-5 mt-5 me-30">
                <div class="">
                    <h6 class="main_routing_home"><a href="{{ url('/') }}">HOME ></a>
                        <a href="Javascript:void(0)">NEWS ></a>
                        <a href="{{ route('news') }}"
                            class="routing_home_news">NEWS detail</a></h6>
                    <h1 class="main_head">Golden Harbour’s Role in Advancing Instrumentation Fittings for the Oil &
                        Gas Industry</h1>
                </div>
            </div>
            <div class="col-12 col-lg-6 d-flex justify-content-end">
                <img src="{{ asset('public/front/images/headerbanner/news_hed_img.png') }}" class="img-fluid" alt="news hed img">
            </div>
        </div>
    </div>
</section>
@if ($newsdetail)
    <section class="container news_details_coman_p">
        <p class="my-4">{!! $newsdetail->short_description !!} </p>
        </div>
        <div class=" my-4">
            <img class="img-fluid" src="{{ asset('public/news_detail_image/'. $newsdetail->detail_image) }}"
                alt="{{  str_replace(['-', '_'],' ', pathinfo($newsdetail->detail_image, PATHINFO_FILENAME)) }}">
        </div>
        <div> {!! $newsdetail->description !!}</div>
    </section>
    <section class="my-5">
        <div class="container-fluid px-lg-0">
            <a href="{{ route('contact') }}">
            <img src="{{ asset('public/news_cta_image/'.$newsdetail->cta_image) }}" alt="{{  str_replace(['-', '_'],' ', pathinfo($newsdetail->cta_image, PATHINFO_FILENAME)) }}" class="img-fluid">
           </a>
        </div>
    </section>
    <section class=" container  news_details_coman_p">
        <div>{!! $newsdetail->conclusion !!}</div>
    </section>
@endif
@include('layouts.frontfooter')