@include('layouts.frontheader')

<section class=" news_details_header_main my-5">
   <div class=" container-fluid px-0">
      <div class="d-flex flex-wrap align-items-center justify-content-between">
          <div class="col"></div>
         <div class="col-12 col-lg-5 me-30">
            <div class="">
               <h6 class="main_routing_home">
                  <a href="{{url('/')}}">HOME ></a>
                  <a href="Javascript:void(0)">RESOURCE ></a>
                  <span class="routing_home_news"> E-CATALOGUE</span>
               </h6>
               <h1 class="main_head">Our E-Catalogues</h1>
               <h2 class="main_head_small">Explore Our Product Range</h2>
               <p class="card-text">Browse through our comprehensive collection of product catalogues designed to help you explore, compare, and choose with clarity. Each edition is thoughtfully compiled to offer detailed information and practical insights for confident decision-making.
               </p>
            </div>
         </div>
         <div class="col-12 col-lg-6 d-flex justify-content-end">
            <img src="{{ asset('public/front/images/headerbanner/catalogue_hed_img.png') }}" class="img-fluid" alt="catalogue hed img">
         </div>
      </div>
   </div>
</section>
<section class=" section_space">
   <div class="container">
       <div class="row g-4 g-lg-5">
         @foreach($catalog as $data)
         <div class="col-lg-6 ">
            <div class="Catalogues_card">
               <img src="{{ asset('public/catalog_images/'.$data->image) }}" class=" img-fluid" alt="{{  str_replace(['-', '_'],' ', pathinfo($data->image, PATHINFO_FILENAME)) }}">
               <div class="Catalogues_card_txt">
                  <p class="col-md-8">
                     <b>{{ $data->title }}</b>
                     <b>{{ $data->subtitle }}</b>
                  </p>
                  <span class="col-md-4 text-end">
                     <a href="{{ asset('public/catalog_pdfs/'.$data->pdf) }}"  target="_blank" class="btn btn--ripple" id="ripple">
                        Download
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                           fill="none">
                           <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="white"
                              stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                     </a>
                  </span>
               </div>
            </div>
         </div>
         @endforeach
   </div>
   </div>
</section>

@include('layouts.frontfooter')
