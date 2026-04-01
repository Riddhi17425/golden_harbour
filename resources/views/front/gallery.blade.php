@include('layouts.frontheader', [
    'og_image' => asset('public/imageslider_image/gallery_4.webp')
])
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />

<section class=" news_details_header_main">
    <div class=" container-fluid px-lg-0">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <div class="col"></div>
            <div class="col-12 col-lg-5 mt-5 me-30">
                <div class="">
                    <h6 class="main_routing_home"><a href="{{ url('/') }}">HOME ></a>
                        <span>RESOURCE > </span> <span class="routing_home_news"> gallery</span>
                    </h6>
                    <h1 class="main_head">Our Gallery</h1>
                    <h2 class="main_head_small">A Visual Journey of Our Excellence</h2>
                    <p class="card-text"> Every frame reveals more than just our work; it captures the discipline, detail, and dedication behind everything we stand for.
Video Showcase, Innovation in Action
In every sequence, a story unfolds of purpose-driven progress, trusted systems, and the innovation that powers real-world impact.
                    </p>
                </div>
            </div>
            <div class="col-12 col-lg-6 d-flex justify-content-end">
                <img src="{{ asset('public/front/images/headerbanner/gallery_hed_img.png') }}"
                    class="img-fluid" alt="gallery hed img">
            </div>
        </div>
    </div>
</section>

<section class="Gallery_slider my-5">
    <div class="Gallery_swiper swiper">
        <div class="swiper-wrapper">
                 @foreach ($gallerydata as $gallery)
                 <div class="swiper-slide">
                    <a href="{{ asset('public/imageslider_image/'.$gallery->image) }}" data-fancybox="gallery">
                        <img class="w-100" src="{{ asset('public/imageslider_image/'.$gallery->image) }}" alt="{{  str_replace(['-', '_'],' ', pathinfo($gallery->image, PATHINFO_FILENAME)) }}">
                    </a>
                </div>
                 @endforeach
        </div>
    </div>
</section>

<!--<section class="promo-section promo-section2 my-4">-->
<!--    <div class="grid-container">-->
<!--        <div class="promo-hold">-->
<!--            <ul>-->
<!--                <li class="animation-element fade-up in-view">-->
<!--                    Experience Our Innovations </li>-->
<!--                <li class="animation-element fade-up in-view">-->
<!--                    <span>-->
<!--                        <div class="promo-dots-fade">-->
<!--                        </div>-->
<!--                    </span>-->
<!--                    <img alt="" src="{{ asset('public/front/images/promo.svg') }}" class=" lazyloaded">-->
<!--                    <div class="promo-words">-->
<!--                        <img alt="" src="{{ asset('public/front/images/promo-words.svg') }}" class=" lazyloaded">-->
<!--                    </div>-->
<!--                </li>-->
<!--                <li class="animation-element fade-up in-view">-->
<!--                    Static Excellence, Dynamic Impact </li>-->
<!--            </ul>-->
<!--        </div>-->
<!--    </div>-->
<!--</section>-->
<!--<section class="position-relative">-->
<!--    <div class="container">-->
<!--            <div class="col-12 Gallery_card_child_1">-->
<!--                <h1 class="main_head main_head_line">Video Showcase, Innovation in Action</h1>-->
<!--                <p class="mb-5 mt-3 col-xl-6">Lorem ipsum dolor sit amet consectetur. Ipsum dignissim turpis molestie enim.-->
<!--                    Consequat-->
<!--                    pharetra scelerisque-->
<!--                    tellus Lorem ipsum dolor sit amet consectetur. Ipsum dignissim turpis </p>-->
<!--            </div>-->
<!--            <div class="py-4">-->
<!--                <div class="row Gallery_card_child_2">-->
<!--                    @foreach ($videodata as $video)-->
<!--                    <div class="col-md-4 mb-4">-->
<!--                        <div class="card">-->
<!--                            <div class="position-relative">-->
<!--                                <div>-->
<!--                                    <img src="{{ asset('public/Video_image/'.$video->thumbnail_image) }}" class=" img-fluid"-->
<!--                                        alt="{{$video->title}}">-->
<!--                                </div>-->
<!--                                <img data-bs-toggle="modal" data-bs-target="#exampleModal{{$video->id}}"-->
<!--                                class="btn position-absolute top-50 start-50 translate-middle img-fluid"-->
<!--                                src="{{ asset('public/front/images/play-circle 1 (1).svg') }}" alt="Play Video" style="width:106px;">-->
<!--                            </div>-->
<!--                            <div class="card-body">-->
<!--                                <img src="{{ asset('public/front/images/solution-layer.svg') }}" alt="solution" class="img-fluid mb-2">-->
<!--                                <p class="card-title"><b>{{$video->title}}</b></p>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    @endforeach-->
<!--                 </div>-->
<!--            </div>-->
<!--    </div>-->
<!--</section>-->
<!-- Modal video  -->
@foreach ($videodata as $video)
    <div class="modal fade" id="exampleModal{{$video->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$video->id}}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <video class="video" width="100%" controls autoplay muted>
                    @if($video->file_type == 'videolink')
                        <source src="{{ $video->video_link }}" type="video/mp4">
                    @elseif($video->file_type == 'videoupload')
                        <source src="{{ asset('public/Video_uploads/' . $video->video_link) }}" type="video/mp4">
                    @endif
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </div>
@endforeach

@include('layouts.frontfooter')
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
<script>
const swiper = new Swiper('.Gallery_swiper', {
    loop: true,
    slidesPerView: 4.5,
    spaceBetween: 20,
     pauseOnFocus: false,
      autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
    // centeredSlides: true,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
   breakpoints: {
  1400: {
    slidesPerView: 4.5,
    spaceBetween: 20,
  },
   1100: {
    slidesPerView: 4.5,
    spaceBetween: 20,
  },
  1024: {
    slidesPerView: 4,
    spaceBetween: 30,
    centeredSlides: true,
  },
  768: {
    slidesPerView: 2,
    spaceBetween: 15,
    centeredSlides: true,
  },
  100: {
    slidesPerView:1.5,
    spaceBetween: 10,
    centeredSlides: true,
  },
}

});
</script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        Fancybox.bind("[data-fancybox]", {
            Toolbar: {
                display: ["zoom", "fullscreen", "close"],
            },
            fullscreen: {
                autoStart: true,  // Jab Fancybox open ho, tabhi fullscreen ho jaye
            }
        });
    });
</script>

