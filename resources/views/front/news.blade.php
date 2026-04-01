@include('layouts.frontheader')

<section class=" news_details_header_main">
    <div class=" container-fluid px-lg-0">
        <div class="d-flex flex-wrap  justify-content-between">
            <div class="col"></div>
            <div class="col-12 col-lg-5 mt-5 me-30">
                <div class="">
                    <h6 class="main_routing_home"><a href="{{ url('/') }}">HOME ></a>
                        <span class="routing_home_news">NEWS</span></h6>
                    <h1 class="main_head">Our News & Updates</h1>
                    <h2 class="main_head_small">Latest Industry Insights</h2>
                    <p class="card-text">Stay ahead with curated perspectives and expert takes on market shifts, technological advancements, and evolving industry trends. At Golden Harbour, we share insights that matter, helping you make informed decisions in a rapidly changing industrial landscape.

                    </p>
                </div>
            </div>

            <div class="col-12 col-lg-6 d-flex justify-content-end">
                <img src="{{ asset('public/front/images/headerbanner/news_hed_img.png') }}" class="img-fluid" alt="news hed img">
            </div>
        </div>
    </div>
</section>

<section class=" section_space">
    <div class="container my-5">
        <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3 g-4">
        @foreach ($newsdata as $news)
            @if ($news->url)    
                <div>
                    <div class="News_card">
                        <a href="{{ route('newsdetail', ['url' => $news->url]) }}">
                            <img src="{{ asset('public/news_front_image/'.$news->front_image) }}" class="card-img-top " alt="{{  str_replace(['-', '_'],' ', pathinfo($news->front_image, PATHINFO_FILENAME)) }}">
                            <div class="card-body px-0">

                                <p class="card-text">{{ \Carbon\Carbon::parse($news->date)->format('F j, Y') }}</p>
                                <h3 class="card-title"><b>{{ $news->title }}</b></h3>
                            </div>
                        </a>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
    </div>
</section>

@include('layouts.frontfooter')