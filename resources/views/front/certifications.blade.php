@include('layouts.frontheader', [
    'og_image' => asset('public/front/images/headerbanner/certifications_hed_img.png')
])
<section class=" news_details_header_main">
    <div class=" container-fluid px-lg-0">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <div class="col"></div>
            <div class="col-12 col-lg-5 mt-5 me-30">
                <div class="">
                    <h6 class="main_routing_home"><a href="{{url('/')}}">HOME ></a>  <span>About > </span> <span class="routing_home_news">
                            CERTIFICATIONS</spam>
                    </h6>
                    <h1 class="main_head">Our Certification</h1>
                    <h2 class="main_head_small">Our Commitment to Quality</h2>
                    <p class="card-text">
                        At Golden Harbour, quality is not just a standard — it's our foundation. We are dedicated to delivering products that consistently meet and exceed customer expectations.
                    </p>
                    <p>
                        Through a robust and continually improving Quality Management System, we ensure excellence at every stage — from sourcing to delivery. Our certifications reflect our unwavering commitment to reliability, consistency, and customer satisfaction.
                    </p>
                    <!--<p>-->
                    <!--    Let me know if you want to include specific certifications (like ISO 9001:2015) or tailor it to a more technical or customer-facing audience.-->
                    <!--</p>-->
                </div>
            </div>
            <div class="col-12 col-lg-6 d-flex justify-content-end">
                <img src="{{asset('public/front/images/headerbanner/certifications_hed_img.png')}}" class="img-fluid" alt="certifications hed img">
            </div>
        </div>
    </div>
</section>
<!-- section circle Certifications-->
<section class="certificates section_space">
    <div class="container">
        <div class="certi_wrapper">
            @foreach ($certificates as $certificate )
                <a href="{{asset('public/certificate_images/'.$certificate->certificate)}}" data-fancybox="gallery" data-caption="certi-1" target="_blank">
                    <div class="certi_border">
                        <div class="certi_box">
                            <img src="{{asset('public/certificate_images/'.$certificate->image)}}" alt="{{  str_replace(['-', '_'],' ', pathinfo($certificate->alt_tag, PATHINFO_FILENAME)) }}" class="img-fluid mb-2">
                            <p class="certi_title col-md-10 mb-0">{{ $certificate->title }}  </p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
@include('layouts.frontfooter')