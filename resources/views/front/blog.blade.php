@include('layouts.frontheader', [
    'og_image' => asset('public/blogs/detail_image/future-of-shipbuilding-detail.jpg')
])

<section class=" news_details_header_main">
    <div class=" container-fluid px-lg-0">
        <div class="d-flex flex-wrap  justify-content-between">
            <div class="col"></div>
            <div class="col-12 col-lg-5 mt-5 me-30">
                <div class="">
                    <h6 class="main_routing_home">
                        <a href="{{ url('/') }}">HOME ></a>
                        <span class="routing_home_news">BLOG</span>
                    </h6>
                    <h1 class="main_head">Golden Harbour blog</h1>
                    <h2 class="main_head_small">Latest Industry Insights</h2>

                    <p class="card-text">Welcome to Golden Harbour’s knowledge hub, where materials, engineering, and industry insights come together. Our blogs explore metals, manufacturing practices, and industrial applications that shape marine, offshore, and infrastructure projects. Each article is written to inform decision-makers, simplify technical concepts, and support smarter material selection across industries.
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
        @foreach($blogs as $blog)
            <div>
                <div class="News_card">
                    <a href="{{ route('blogdetail', ['url' => $blog->url]) }}">
                        <img src="{{ asset('public/blogs/front_image/'.$blog->front_image) }}" class="card-img-top " alt="news img">
                        <div class="card-body px-0">
    
                            <p class="card-text">{{$blog->date}}</p>
                            <h3 class="card-title"><b>{{$blog->title}}</b></h3>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach    
    </div>
    </div>
</section>

@include('layouts.frontfooter')