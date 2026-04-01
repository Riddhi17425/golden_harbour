@include('layouts.frontheader')
<section class="news_details_header_main my-5">
    <div class="container-fluid px-lg-0">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <div class="col"></div>
            <div class="col-12 col-lg-5 me-30">
                <div class="">
                    <h6 class="main_routing_home">
                         <a href="{{ url('/') }}">HOME > </a>
                       <span>RESOURCE > </span>
                       <span class="routing_home_news"> Career Opportunities</span>
                    </h6>
                    <h1 class="main_head">Career Opportunities</h1>
                    <h2 class="main_head_small">Join Our Journey of Excellence</h2>
                    <p class="card-text">
                        Golden Harbour, a leader in marine, offshore, oilfield, and industrial solutions since 1945, is always seeking talented individuals to join our team. With a presence across the MENA region in Dubai, Abu Dhabi, and Bahrain, we offer a dynamic work environment where innovation, quality, and customer satisfaction are at the core of everything we do. As of May 2025, we are looking for passionate professionals to contribute to our legacy of excellence.
                    </p>
                </div>
            </div>
            <div class="col-12 col-lg-6 d-flex justify-content-end">
                <img src="{{ asset('public/front/images/headerbanner/ourculture_hed_img.png') }}" class="img-fluid" alt="ourculture hed img">
            </div>
        </div>
    </div>
</section>
<section class="section_space position-relative current-Category">
    <div class="container">
        <div class="row mb-4">
            <div class="col-md-9">
                <h2 class="main_head main_head_line">Find Your Perfect Fit</h2>
            </div>
            <div class="col-md-3 align-content-center text-center">
                <!-- Bootstrap Dropdown -->
                <select class="form-select form-select-lg mb-3" id="categoryFilter">
                     <option value="all" selected>Show All</option>
                     @foreach($jobCategories as $category)
                         <option value="{{ $category->id }}">{{ $category->name }}</option>
                     @endforeach
                </select>
            </div>
            <p>
                We believe that every role contributes to our shared success. That's why we provide diverse opportunities across various departments, ensuring you can find a career path that excites and challenges you.
            </p>
        </div>
        <div class="category-item">
            @foreach($jobCategories as $category)
            <div class="row category-section" data-category-id="{{ $category->id }}">
                <div class="col-md-6">
                    <h2 class="main_head">{{ $category->name }}</h2>
                    <p>{!! $category->description !!}</p>
                </div>
                <div class="col-md-6">
                    @foreach($jobs[$category->id] ?? [] as $job)
                    <div class="apply-card {{ !$loop->first ? 'mt-5' : '' }}">
                        <h4 class="sub_title">{{ $job->title }}</h4>
                        <p>{!! $job->short_description !!}</p>
                        <a href="{{ route('currentoppdetails', $job->url) }}" class="btn btn--ripple" id="ripple">Apply Now
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                    @endforeach
                </div>
                @if(!$loop->last)
                <hr>
                @endif
            </div>
            @endforeach
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const categoryFilter = document.getElementById('categoryFilter');
    const categorySection = document.querySelectorAll('.category-section');
    
    categoryFilter.addEventListener('change', function() {
        const selectedValue = this.value;
        
        if (selectedValue === 'all') {
            categorySection.forEach(section => {
                section.style.display = 'flex';
            });
        } else {
            categorySection.forEach(section => {
                if (section.dataset.categoryId === selectedValue) {
                    section.style.display = 'flex';
                } else {
                    section.style.display = 'none';
                }
            });
        }
    });
});
</script>

@include('layouts.frontfooter')