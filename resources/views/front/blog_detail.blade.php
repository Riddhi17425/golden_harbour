@include('layouts.frontheader', [
    'og_image' => asset('public/blogs/detail_image/'. $blogsdetail->detail_image)
])
<style>
/* Accordion Header */
.according_head {
    background: #182a41;
    color: #ffffff;
    padding: 15px 20px;
    font-size: 18px;
    cursor: pointer;
    border-radius: 6px;
    position: relative;
    transition: background 0.3s ease;
}

/* Header Hover */
.according_head:hover {
    background: #223b57;
}

/* Active/Open Header */
.according_head.active {
    background: #0f1c2c;
}

/* Accordion Body */
.accordion-body-custom {
    background: #f5f6f7;
    padding: 15px 20px;
    border-left: 3px solid #182a41;
    border-radius: 0 0 6px 6px;
    margin-top: -5px;
}

/* Arrow (+ / -) */
.according_head .arrow {
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%) rotate(0deg);
    width: 14px;
    height: 14px;
    border-right: 2px solid #fff;
    border-bottom: 2px solid #fff;
    transition: transform 0.3s ease;
    transform-origin: center;
}
.news_details_coman_p a{
    color:#83682a;
    text-decoration:underline;
}
/* When open — rotate arrow */
.according_head.active .arrow {
    transform: translateY(-50%) rotate(45deg);
}
h3{
    font-size:22px;
}
</style>
<section class=" news_details_header_main">
    <div class="container px-lg-0">
        <div class="d-flex flex-wrap justify-content-between">
            <div class="col"></div>
            <div class=" col-12 col-lg-5 mt-5 me-30">
                <div class="">
                    <h6 class="main_routing_home">
                        <a href="{{ url('/') }}">HOME ></a>
                        <a href="Javascript:void(0)">BLOG ></a>
                        <span class="routing_home_news">BLOG detail</span>
                    </h6>
                    <h1 class="main_head">{{ $blogsdetail->title }}</h1>
                </div>
            </div>
             <div class="col-12 col-lg-6 d-flex justify-content-end">
                <img src="{{ asset('public/front/images/headerbanner/news_hed_img.png') }}" class="img-fluid" alt="news hed img">
            </div>
        </div>
    </div>
</section>
@if ($blogsdetail)
    <section class="container news_details_coman_p">
        <p class="my-4">{!! $blogsdetail->short_description !!} </p>
        </div>
        <div class=" my-4">
            <img class="img-fluid" src="{{ asset('public/blogs/detail_image/'. $blogsdetail->detail_image) }}"
                alt="{{  str_replace(['-', '_'],' ', pathinfo($blogsdetail->detail_image, PATHINFO_FILENAME)) }}">
        </div>
        <div> {!! $blogsdetail->description !!}</div>
    </section>
    <section class="my-5">
        <div class="container px-lg-0">
            <a href="{{ route('contact') }}">
            <img src="{{ asset('public/blogs/cta_image/'.$blogsdetail->cta_image) }}" alt="{{  str_replace(['-', '_'],' ', pathinfo($blogsdetail->cta_image, PATHINFO_FILENAME)) }}" class="img-fluid">
           </a>
        </div>
    </section>
    <section class=" container  news_details_coman_p">
        <div>{!! $blogsdetail->conclusion !!}</div>
    </section>
@endif

<section class="accoding">
    <div class="container">
        @if (!empty($blogsdetail->title_description) && count($blogsdetail->title_description) > 0)
            <h4 class="text-center mb-5">Frequently Asked Questions</h4>
            <div class="row">
                <div class="col-lg-12">
                    <div id="accordionExample">
                        @foreach ($blogsdetail->title_description as $index => $faq)
                            <div class="mb-4">
                                <h5 class="according_head" 
                                    data-bs-toggle="collapse"
                                    data-bs-target="#collapse{{ $index }}"
                                    aria-expanded="{{ $index === 0 ? 'true' : 'false' }}"
                                    aria-controls="collapse{{ $index }}">
                                    {{ $faq['faq_title'] }}
                                     <span class="arrow"></span>
                                </h5>
                                <div id="collapse{{ $index }}" 
                                    class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}"
                                    data-bs-parent="#accordionExample">
                                    <div>
                                        {!! $faq['faq_description'] !!}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>

@include('layouts.frontfooter')
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const headers = document.querySelectorAll(".according_head");

    headers.forEach(head => {
        head.addEventListener("click", function () {
            // Remove active from all
            headers.forEach(h => h.classList.remove("active"));

            // Add active to clicked one
            this.classList.add("active");
        });
    });
});
</script>