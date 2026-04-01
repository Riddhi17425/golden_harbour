@include('layouts.frontheader')

<section class=" news_details_header_main">
    <div class=" container-fluid  px-lg-0">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <div class="col"></div>
            <div class="col-12 col-lg-5 mt-5 me-30">
                <div class="">
                    <h6 class="main_routing_home"> <a href="{{ url('/') }}">HOME ></a>
                        <span >RESOURCE > </span> <span 
                            class="routing_home_news">EVENT</span></h6>
                    <h1 class="main_head">Our Events & Exhibitions</h1>
                    <h2 class="main_head_small">Stay Updated on Our Industry Presence</h2>
                    <p class="card-text ">Join us at Golden Harbour as we participate in leading industry events and exhibitions across the Energy, Marine,
                    Offshore, and Industrial sectors. Stay updated on our booth presence, live demonstrations, and networking opportunities — see how we bring 
                    our decades-strong legacy of trusted solutions and expertise directly to the global stage.
                    </p>
                </div>
            </div>
            <div class="col-12 col-lg-6 d-flex justify-content-end">
                <img src="{{ asset('public/front/images/headerbanner/events_hed_img.png') }}"
                    class="img-fluid" alt="events hed img">
            </div>
        </div>
    </div>
</section>

<section class=" my-5">
    <div class="container">
        <div class=" justify-content-center gap-5 ">

             @foreach ($eventdata as $event)
            <div class="event-card">
                <div class="row">
                    <div class="col-lg-4 event_card_slider ">
                        @php
                             $images = json_decode($event->multiple_images);
                        @endphp
                        @if (is_array($images))
                            @foreach ($images as $image)
                                <img src="{{ asset('public/event_cat_files/'.$image) }}" alt="Event Image" class="img-fluid">
                            @endforeach
                        @endif                    
                    </div>
                    <div class="col-lg-7 event-card-border-left">
                        <div class=" d-flex flex-wrap gap-3">
                            <p class="rounded-pill Event_button_1">
                                    <img class="me-2 mb-1" src="{{ asset('public/front/images/calendar 1.svg') }}" alt="">
                                    {{ \Carbon\Carbon::parse($event->event_start_date)->format('d/m/Y') }}</p>
                            <p class="rounded-pill Event_button_2">{{ str_replace('-', ' ', $event->event_type) }}</p>
                        </div>
                        <h4 class="my-2"><b>{{ $event->title }}</b> </h4>
                        <p class="fs-6">{!! $event->description !!}</p>
                        <div class="d-flex flex-wrap justify-content-between ">
                            <div class="col-12 col-md-6 d-flex gap-3 align-items-start">
                                        <img class="" style="width: 1.8em;" src="{{ asset('public/front/images/location.svg') }}" alt="">
                                        <p class="">
                                            {{ $event->address }}
                                        </p>
                            </div>
                            <div class="col-12 col-md-4 d-flex align-items-center justify-content-md-end">
                                    <a href="{{ route('contact') }}" class="btn btn--ripple" id="ripple"> Contact Us <svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="white"
                                            stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

@include('layouts.frontfooter')
<script>
$('.event_card_slider').slick({
    dots: true,
    infinite: true,
    speed: 300,
    slidesToShow: 1,
    adaptiveHeight: true
});
</script>