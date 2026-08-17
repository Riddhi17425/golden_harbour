<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{!! $meta_title ?? $title ?? 'Golden Harbour' !!}</title>
    <meta name="description" content="{{ strip_tags($meta_description ?? $description ?? 'Golden Harbour') }}">
    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large"/>
    <link rel="canonical" href="{{ url()->current() }}" />

    <link rel="icon" type="image/x-icon" href="{{ asset('public/front/images/GH_Favicon.png')}}">
    <!-- bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('public/front/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('public/front/css/responsive.css')}}">
    <link rel="stylesheet" href="{{asset('public/front/fonts/stylesheet.css')}}">
    <!-- Link fancybox CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- Link slick CSS -->
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
    <!-- Link font-awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@25.12.4/build/css/intlTelInput.css">
    <!-- Link Rubik font CSS -->
    <link
        href="https://fonts.googleapis.com/css2?family=Geist:wght@100..900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap"
        rel="stylesheet">
         <!-- aos aniamtion -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- FullPage.js CSS -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/fullPage.js/4.0.29/fullpage.min.css"
    />
    <!-- OG Tags Start -->
    <meta property="og:site_name" content="Golden Harbour">
    <meta property="og:title" content="{{ $meta_title ?? $title ?? 'Golden Harbour' }}">
    <meta property="og:description" content="{{ $meta_description ?? $description ?? '' }}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ $og_image ?? asset('public/front/images/GH_Favicon.png') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="627">
    <!-- OG Tags End -->

    <!--Twitter X Card Tags-->
    <meta property="twitter:site" content="Golden Harbour">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $meta_title ?? $title ?? 'Golden Harbour' }}">
    <meta name="twitter:description" content="{{ $meta_description ?? $description ?? '' }}">
    <meta name="twitter:image" content="{{ $og_image ?? asset('public/front/images/GH_Favicon.png') }}">

    <style>
		 @media (max-width: 576px) {
			 section.new_hero.dark {
			background-position-x: 60%;
		}}

        /* Desktop Standard Dropdown Styles */
        .desktop-menu {
            flex-grow: 1;
            justify-content: center;
        }
        .desktop-menu .nav-item {
            position: relative;
        }
        .desktop-menu .standard-dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            min-width: 250px;
            background-color: #fff;
            padding: 10px 0;
            visibility: hidden;
            opacity: 0;
            transform: translateY(10px);
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            z-index: 1050;
            text-align: left;
            border-radius: 4px;
        }
        .desktop-menu .has-dropdown:hover .standard-dropdown {
            visibility: visible;
            opacity: 1;
            transform: translateY(0);
        }
        .desktop-menu .nav-link {
            font-weight: 500;
            padding: 20px 0;
            text-decoration: none;
            font-size: 18px;
        }

        /* Handle Text Color based on light/dark headers */
        #siteHeader.index-page .desktop-menu .nav-link,
        .light-mode-nav .desktop-menu .nav-link {
            color: var(--white, #fff);
        }
        #siteHeader:not(.index-page) .desktop-menu .nav-link,
        .scrolled .desktop-menu .nav-link,
        .dark-mode-nav .desktop-menu .nav-link {
            color: var(--black, #111);
        }

        #siteHeader.index-page .desktop-menu .nav-link:hover,
        .desktop-menu .nav-link:hover {
            color: var(--gold, #C4A458);
        }

        .desktop-menu .standard-dropdown .submenu-link {
            color: var(--black, #111);
            text-decoration: none;
            transition: all 0.3s;
            font-size: 16px;
            display: block;
            padding: 8px 20px;
        }
        .desktop-menu .standard-dropdown .submenu-link:hover {
            color: var(--gold, #C4A458);
            background-color: transparent;
            padding-left: 25px;
        }

        /* Search Icon */
        .search-icon-btn {
            color: var(--white, #fff);
            transition: color 0.3s;
            font-size: 18px;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        #siteHeader:not(.index-page) .search-icon-btn,
        .scrolled .search-icon-btn,
        .dark-mode-nav .search-icon-btn {
            color: var(--black, #111);
        }
        .search-icon-btn:hover {
            color: var(--gold, #C4A458);
        }
        #siteHeader:not(.index-page) .search-icon-btn:hover,
        .scrolled .search-icon-btn:hover,
        .dark-mode-nav .search-icon-btn:hover {
            color: var(--gold, #C4A458);
        }

        /* Search Modal Custom Design */
        #searchModal .modal-content {
            border-radius: 12px;
            overflow: hidden;
            background-color: var(--white, #fff);
        }
        #searchModal .modal-header {
            padding: 40px 40px 20px;
        }
        #searchModal .modal-title {
            color: var(--blue, #182A41);
            font-size: 28px;
            font-weight: 600;
        }
        #searchModal .btn-close {
            background-size: 14px;
            opacity: 0.5;
            margin-right: 15px;
            margin-top: 15px;
        }
        #searchModal .btn-close:hover {
            opacity: 1;
        }
        #searchModal .search-form .input-group {
            border: 2px solid var(--dd-color, #ddd);
            border-radius: 6px;
            overflow: hidden;
            transition: border-color 0.3s;
        }
        #searchModal .search-form .input-group:focus-within {
            border-color: var(--gold, #C4A458);
        }
        #searchModal .search-form input {
            font-size: 18px;
            color: var(--black, #111);
            padding: 15px;
            font-family: var(--body-typography-font-family);
        }
        #searchModal .search-form input::placeholder {
            color: var(--gray, #808080);
            font-weight: 400;
        }
        #searchModal .search-form .input-group-text {
            padding-left: 20px;
            color: var(--gold, #C4A458);
        }
        #searchModal .filter-system .search-custem-filter-title {
            font-size: 16px;
            color: var(--blue, #182A41) !important;
            font-weight: 600;
        }
        #searchModal .form-check-input {
            border-color: #ccc;
            cursor: pointer;
            width: 1.2em;
            height: 1.2em;
        }
        #searchModal .form-check-input:checked {
            background-color: var(--gold, #C4A458);
            border-color: var(--gold, #C4A458);
        }
        #searchModal .form-check-label {
            color: var(--para, #565656);
            cursor: pointer;
            font-size: 16px;
            margin-left: 8px;
        }
        #searchModal .form-check-input:checked ~ .form-check-label {
            color: var(--black, #111);
            font-weight: 500;
        }
        #productSearchResults {
            max-height: 320px;
            overflow-y: auto;
            border: 1px solid #eee;
            border-radius: 6px;
            display: none;
        }
        #productSearchResults a {
            display: block;
            padding: 12px 15px;
            color: var(--black, #111);
            text-decoration: none;
            border-bottom: 1px solid #eee;
        }


        #productSearchResults a:hover {
            background: #f8f8f8;
            color: var(--gold, #C4A458);
        }
        #productSearchResults small {
            display: block;
            color: var(--gray, #808080);
            margin-top: 4px;
        }

        @media (max-width: 728px) {
            #productSearchResults a img {
                width: 75px;
                height: 75px;
                object-fit: cover;
            }

            #searchModal .modal-header {
    padding: 20px 20px 20px;
}

#searchModal .modal-title {
    font-size: 20px;
}

#searchModal .search-form input {
    font-size: 16px;
    padding: 8px;
}

#searchModal .btn-close {
    margin-right: 0;
    margin-top: 0;
}


        }

    </style>
</head>

<body>

    <!-- Hamburger Button -->
    <button class="hamburger-btn web-btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#navigationOffcanvas"
        aria-controls="navigationOffcanvas">
        <div class="hamburger-icon">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </button>
    <!-- Bootstrap Offcanvas -->
    <div class="offcanvas offcanvas-start" tabindex="-1" id="navigationOffcanvas"
        aria-labelledby="navigationOffcanvasLabel" data-bs-scroll="true" data-bs-backdrop="true">
            <div class="close_btn_offcanvas">
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

        <div class="offcanvas-body p-0 menu_offcanvas_body">
            <!--desktop view-->
           <div class="menuWrapper d-none d-md-inline">
                <div class="menu-container ">
                <div>
                    <div style="padding-top:20px;padding-bottom:67px;">
                    <a href="{{url('/')}}">
                        <img src="{{asset('public/front/images/new_index/GOLDEN-HARBOUR-white.svg')}}" alt="logo"
                        class="img-fluid">
                    </a>
                </div>
<!--                <div style="padding-top:20px; padding-bottom:67px;">-->

<!--        <img src="{{ asset('public/front/images/new_index/GOLDEN-HARBOUR-white.svg') }}" -->
<!--             alt="logo" class="img-fluid white_logo">-->

<!--        <img src="{{ asset('public/front/images/new_index/GOLDEN-HARBOUR.svg') }}" -->
<!--             alt="logo" class="img-fluid black_logo">-->

<!--</div>-->

                    <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link" id="aboutToggle">
                            <span>About</span>
                            <i class="fas fa-chevron-right dropdown-arrow"></i>
                        </a>
                    </li>

                    <li class="nav-item">
                      <a href="#" class="nav-link" id="productToggle">
                        <span>Product</span>
                        <i class="fas fa-chevron-right dropdown-arrow"></i>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link" id="resourceToggle">
                        <span>Resources</span>
                        <i class="fas fa-chevron-right dropdown-arrow"></i>
                      </a>
                    </li>

                     <li class="nav-item">
                        <a href="{{route('our-agencies')}}" class="nav-link">
                            <span>Our Partners </span>
                        </a>
                    </li>
                     <li class="nav-item">
                        <a href="{{route('certifications')}}" class="nav-link">
                            <span>Certifications</span>
                        </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link" id="careerToggle">
                        <span>Career</span>
                        <i class="fas fa-chevron-right dropdown-arrow"></i>
                      </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('contact') }}" onclick="localStorage.setItem('scrollToBuildTogether','1')" class="nav-link">
                            <span>Contact </span>
                        </a>
                    </li>
                </ul>
                </div>
                <div>
                    <ul class="nav-menu">
                        <li class="nav-item">
                        <a href="javascript:void()" class="nav-link" data-bs-toggle="modal" data-bs-target="#e-catalogue">
                            <span>E-Catalogue</span>
                        </a>
                    </li>
                    </ul>
                </div>
            </div>

            <div class="about-submenu-slider" id="aboutSubmenuSlider">
                <div class="submenu-header">
                    <p class="submenu-title">
                        About
                    </p>
                </div>
                <div class="submenu-content">
                    <ul class="submenu-list">
                        <li style="transition: all .6s ease .3s;"><a href="{{route('about')}}" class="submenu-link">Company Profile</a>
                        </li>
                        <!--<li style="transition: all .6s ease .4s;"><a href="{{route('our-agencies')}}" class="submenu-link">Our Partners</a>-->
                        <!--</li>-->
                        <li style="transition: all .6s ease .5s;"><a href="{{route('milestone')}}" class="submenu-link">Milestone</a></li>
                        <!--<li style="transition: all .6s ease .6s;"><a href="{{route('certifications')}}" class="submenu-link">Certifications</a>-->
                        </li>
                    </ul>
                </div>
            </div>
            <div class="about-submenu-slider" id="resourceSubmenuSlider">
                <div class="submenu-header">
                    <p class="submenu-title">
                        Resources
                    </p>
                </div>
                <div class="submenu-content">
                    <ul class="submenu-list">
                        <li style="transition: all .6s ease .3s;"><a href="{{ route('industries') }}" class="submenu-link">Industries</a>
                        </li>
                        <!--<li style="transition: all .6s ease .4s;"><a href="#" class="submenu-link" data-bs-toggle="modal" data-bs-target="#staticBackdrop">E-Catalogue</a>-->
                        <!--</li>-->
                        <li style="transition: all .6s ease .5s;"><a href="{{route('gallery')}}" class="submenu-link">Gallery</a></li>
                        <li style="transition: all .6s ease .5s;"><a href="{{route('blog')}}" class="submenu-link">Blogs</a></li>
                        <li style="transition: all .6s ease .6s;"><a href="{{route('faq')}}" class="submenu-link">FAQs</a>
                        </li>
                    </ul>
                </div>
            </div>
             @php
                use Illuminate\Support\Facades\DB;
                use Illuminate\Support\Str;

                // Get all active categories, subcategories, and products
                $categories = DB::table('category')->whereNull('deleted_at')->get();
                $industryProduct = DB::table('industry_product')->whereNull('deleted_at')->get();
            @endphp
            <div class="about-submenu-slider" id="productSubmenuSlider">
                <div class="submenu-header">
                    <p class="submenu-title">
                        Product
                    </p>
                </div>
                <div class="submenu-content">

                    <ul class="submenu-list">
                        <!--@foreach ($categories as $category)-->
                        <!--    <li style="transition: all .6s ease .3s;"><a href="{{ route('subcategorylist',['category'=>$category->url])}}" class="submenu-link" >{{ $category->name }}</a>-->
                        <!--</li>-->
                        <!--@endforeach-->
                        @foreach ($categories as $category)
                            @if (strtolower($category->name) !== 'ferrous metal & alloys')
                                <li style="transition: all .6s ease .3s;">
                                    <a href="{{ route('subcategorylist', ['category' => $category->url]) }}" class="submenu-link">
                                        {{ $category->name }}
                                    </a>
                                </li>
                            @endif
                        @endforeach

                        <!--<li style="transition: all .6s ease .3s;"><a href="#" class="submenu-link" >Non Ferrous Metal & Alloys</a>-->
                        <!--</li>-->

                        <!--<li style="transition: all .6s ease .4s;"><a href="#" class="submenu-link">Ferrous Metal & Alloys</a>-->
                        <!--</li>-->
                        <!--<li style="transition: all .6s ease .5s;"><a href="#" class="submenu-link">Hydrualic & Instrumentation</a></li>-->
                        <!--<li style="transition: all .6s ease .6s;"><a href="#" class="submenu-link">Heat Exchanger, Condensors Pipes, Tubes & Fittings</a>-->
                        <!--<li style="transition: all .6s ease .6s;"><a href="#" class="submenu-link">Welding, Electrical and Hoses</a>-->
                        <!--<li style="transition: all .6s ease .6s;"><a href="#" class="submenu-link">Non Metallic</a>-->
                        <!--<li style="transition: all .6s ease .6s;"><a href="#" class="submenu-link">Other Products</a>-->
                        <!--</li>-->

                    </ul>
                </div>
            </div>
            <div class="about-submenu-slider" id="careerSubmenuSlider">
                <div class="submenu-header">
                    <p class="submenu-title">
                        Career
                    </p>
                </div>
                <div class="submenu-content">
                    <ul class="submenu-list">
                        <li style="transition: all .6s ease .3s;"><a href="{{route('ourculture')}}" class="submenu-link">Our Culture & Values</a>
                        </li>
                        <li style="transition: all .6s ease .4s;"><a href="{{route('currentopportunities')}}" class="submenu-link">Current Opportunities</a>
                        </li>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- <div class="product-submenuchild-slider" id="productSubmenuchildSlider">-->
            <!--    <div class="submenu-header">-->
            <!--        <h5 class="submenu-title">-->
            <!--            productchild-->
            <!--        </h5>-->
            <!--    </div>-->
            <!--    <div class="submenu-content">-->
            <!--        <ul class="submenu-list">-->
            <!--            <li style="transition: all .6s ease .3s;"><a href="#" class="submenu-link">Brass</a>-->
            <!--            </li>-->
            <!--            <li style="transition: all .6s ease .4s;"><a href="{{route('currentopportunities')}}" class="submenu-link">Current Opportunities</a>-->
            <!--            </li>-->
            <!--            </li>-->
            <!--        </ul>-->
            <!--    </div>-->
            <!--</div>-->
           </div>
           <!--mobile body menu-->
            <div class="menu_wrapper d-flex d-md-none" id="menuWrapper">

        <!-- Level 1 (Main Menu) -->
        <div class="menu_body">
            <div>
                    <div style="padding-top:20px;padding-bottom:67px;padding-left:25px;">
                        <a href="{{url('/')}}">
                            <img src="{{asset('public/front/images/new_index/GOLDEN-HARBOUR-white.svg')}}" alt="logo"
                        class="img-fluid">
                        </a>

                </div>
<!--                <div style="padding-top:20px; padding-bottom:67px;">-->

<!--        <img src="{{ asset('public/front/images/new_index/GOLDEN-HARBOUR-white.svg') }}" -->
<!--             alt="logo" class="img-fluid white_logo">-->

<!--        <img src="{{ asset('public/front/images/new_index/GOLDEN-HARBOUR.svg') }}" -->
<!--             alt="logo" class="img-fluid black_logo">-->

<!--</div>-->

                    <ul class="nav-menu list-unstyled sidemenu m-0 p-3">
                    <li class="nav-item">
                        <a href="#" class="nav-link next-menu"  data-target="1">
                            <span>About</span>
                            <i class="fas fa-chevron-right dropdown-arrow"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link next-menu" data-target="2">
                        <span>Resources</span>
                        <i class="fas fa-chevron-right dropdown-arrow"></i>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link next-menu"  data-target="3">
                        <span>Product</span>
                        <i class="fas fa-chevron-right dropdown-arrow"></i>
                      </a>
                    </li>
                     <li class="nav-item">
                        <a href="{{route('our-agencies')}}" class="nav-link">
                            <span>Our Partners</span>
                        </a>
                    </li>
                     <li class="nav-item">
                        <a href="{{route('certifications')}}" class="nav-link">
                            <span>Certifications</span>
                        </a>
                    </li>
                    <li class="nav-item">
                      <a href="#" class="nav-link next-menu" data-target="4">
                        <span>Career</span>
                        <i class="fas fa-chevron-right dropdown-arrow"></i>
                      </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('contact') }}" onclick="localStorage.setItem('scrollToBuildTogether','1')" class="nav-link">
                            <span>Contact</span>
                        </a>
                    </li>
                </ul>
                </div>
                <div>
                    <ul class="nav-menu list-unstyled sidemenu m-0 p-3">
                        <li class="nav-item">
                        <a href="javascript:void()" class="nav-link" data-bs-toggle="modal" data-bs-target="#e-catalogue">
                            <span>E-Catalogue</span>
                        </a>
                    </li>
                    </ul>
                </div>

        </div>

        <!-- Level 2 (About Menu) -->
        <div class="menu_body sidebar_submenu">
          <div class="p-3">
            <button class="btn px-0 d-inline-flex align-items-center back-menu" data-target="0">
              <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none">
                <path d="M10 4L6 8L10 12" stroke="#fff" stroke-width="1.5" stroke-linejoin="round"></path>
              </svg> Back
            </button>
              <div class="submenu-header">
                    <p class="submenu-title">
                        About
                    </p>
                </div>
                <div class="submenu-content pt-0">
                    <ul class="submenu-list">
                        <li style="transition: all .6s ease .3s;"><a href="{{route('about')}}" class="submenu-link">Company Profile</a>
                        </li>
                        <!--<li style="transition: all .6s ease .4s;"><a href="{{route('our-agencies')}}" class="submenu-link">Our Partners</a>-->
                        <!--</li>-->
                        <li style="transition: all .6s ease .5s;"><a href="{{route('milestone')}}" class="submenu-link">Milestone</a></li>
                        <!--<li style="transition: all .6s ease .6s;"><a href="{{route('certifications')}}" class="submenu-link">Certifications</a>-->
                        </li>
                    </ul>
                </div>
          </div>
        </div>
        <!-- Level 2 (Resources Menu) -->
        <div class="menu_body sidebar_submenu">
          <div class="p-3">
            <button class="btn px-0 d-inline-flex align-items-center back-menu" data-target="0">
              <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none">
                <path d="M10 4L6 8L10 12" stroke="#fff" stroke-width="1.5" stroke-linejoin="round"></path>
              </svg> Back
            </button>
              <div class="submenu-header">
                    <p class="submenu-title">
                        Resource
                    </p>
                </div>
                <div class="submenu-content pt-0">
                    <ul class="submenu-list">
                        <li style="transition: all .6s ease .3s;"><a href="{{ route('industries') }}" class="submenu-link">Industries</a>
                        </li>
                        <!--<li style="transition: all .6s ease .4s;"><a href="#" class="submenu-link" data-bs-toggle="modal" data-bs-target="#staticBackdrop">E-Catalogue</a>-->
                        <!--</li>-->
						<li style="transition: all .6s ease .5s;"><a href="{{ route('blog') }}" class="submenu-link">Blogs</a></li>
                        <li style="transition: all .6s ease .5s;"><a href="{{route('gallery')}}" class="submenu-link">Gallery</a></li>
                        <li style="transition: all .6s ease .6s;"><a href="{{route('faq')}}" class="submenu-link">FAQ's</a>
                        </li>
                    </ul>
                </div>
          </div>
        </div>
        <!-- Level 2 (Product Menu) -->
        <div class="menu_body sidebar_submenu">
          <div class="p-3">
            <button class="btn px-0 d-inline-flex align-items-center back-menu" data-target="0">
              <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none">
                <path d="M10 4L6 8L10 12" stroke="#fff" stroke-width="1.5" stroke-linejoin="round"></path>
              </svg> Back
            </button>
              <div class="submenu-header">
                    <p class="submenu-title">
                        Product
                    </p>
                </div>
                <div class="submenu-content pt-0">
                    <ul class="submenu-list">
                         @foreach ($categories as $category)
                            <li style="transition: all .6s ease .3s;"><a href="{{ route('subcategorylist',['category'=>$category->url])}}" class="submenu-link" >{{ $category->name }}</a>
                        </li>
                        @endforeach
                       <!--<li style="transition: all .6s ease .3s;"><a href="#" class="submenu-link" >Non Ferrous Metal & Alloys</a>-->
                       <!-- </li>-->

                       <!-- <li style="transition: all .6s ease .4s;"><a href="#" class="submenu-link">Ferrous Metal & Alloys</a>-->
                       <!-- </li>-->
                       <!-- <li style="transition: all .6s ease .5s;"><a href="#" class="submenu-link">Hydrualic & Instrumentation</a></li>-->
                       <!-- <li style="transition: all .6s ease .6s;"><a href="#" class="submenu-link">Heat Exchanger, Condensors Pipes, Tubes & Fittings</a>-->
                       <!-- <li style="transition: all .6s ease .6s;"><a href="#" class="submenu-link">Welding, Electrical and Hoses</a>-->
                       <!-- <li style="transition: all .6s ease .6s;"><a href="#" class="submenu-link">Non Metallic</a>-->
                       <!-- <li style="transition: all .6s ease .6s;"><a href="#" class="submenu-link">Other Products</a>-->
                       <!-- </li>-->
                    </ul>
                </div>
          </div>
        </div>
          <!-- Level 2 (Career Menu) -->
        <div class="menu_body sidebar_submenu">
          <div class="p-3">
            <button class="btn px-0 d-inline-flex align-items-center back-menu" data-target="0">
              <svg class="me-2" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none">
                <path d="M10 4L6 8L10 12" stroke="#fff" stroke-width="1.5" stroke-linejoin="round"></path>
              </svg> Back
            </button>
              <div class="submenu-header">
                    <p class="submenu-title">
                        Career
                    </p>
                </div>
                <div class="submenu-content pt-0">
                   <ul class="submenu-list">
                        <li style="transition: all .6s ease .3s;"><a href="{{route('ourculture')}}" class="submenu-link">Our Culture & Values</a>
                        </li>
                        <li style="transition: all .6s ease .4s;"><a href="{{route('currentopportunities')}}" class="submenu-link">Current Opportunities</a>
                        </li>
                        </li>
                    </ul>
                </div>
          </div>
        </div>
      </div>
        </div>
    </div>
    <!-- About Submenu Sliding Div -->

    <header class="new_header site-header" id="siteHeader">
        <div class="container" style="max-width: 100%; position: relative;">
            <nav class="d-flex align-items-center justify-content-between w-100">
                <a class="navbar-brand" href="{{url('/')}}">
                    <img src="{{asset('public/front/images/new_index/GOLDEN-HARBOUR-white.svg')}}" alt="logo"
                        class="light_logo">
                    <img src="{{asset('public/front/images/GOLDEN-HARBOUR-blue.svg')}}" alt="logo" class="dark_logo">
                </a>

                <!-- Desktop Navigation Menu -->
                <div class="desktop-menu d-none d-xl-flex">
                    <ul class="nav list-unstyled d-flex mb-0 gap-4">
                        <li class="nav-item has-dropdown">
                            <a href="#" class="nav-link d-flex align-items-center gap-1">About <i class="fas fa-chevron-down ms-1" style="font-size: 10px;"></i></a>
                            <div class="standard-dropdown">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="{{route('about')}}" class="submenu-link">Company Profile</a></li>
                                    <li><a href="{{route('milestone')}}" class="submenu-link">Milestone</a></li>
                                    <li><a href="{{route('our-agencies')}}" class="submenu-link">Our Partners</a></li>
                                    <li><a href="{{route('certifications')}}" class="submenu-link">Certification</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item has-dropdown">
                            <a href="#" class="nav-link d-flex align-items-center gap-1">Product <i class="fas fa-chevron-down ms-1" style="font-size: 10px;"></i></a>
                            <div class="standard-dropdown" style="max-height: 400px; width:350px; overflow-y: auto;">
                                <ul class="list-unstyled mb-0">
                                    @foreach ($categories as $category)
                                        @if (strtolower($category->name) !== 'ferrous metal & alloys')
                                            <li><a href="{{ route('subcategorylist', ['category' => $category->url]) }}" class="submenu-link">{{ $category->name }}</a></li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item has-dropdown">
                            <a href="#" class="nav-link d-flex align-items-center gap-1">Resources <i class="fas fa-chevron-down ms-1" style="font-size: 10px;"></i></a>
                            <div class="standard-dropdown">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="{{ route('industries') }}" class="submenu-link">Industries</a></li>
                                    <li><a href="{{route('gallery')}}" class="submenu-link">Gallery</a></li>
                                    <li><a href="{{route('blog')}}" class="submenu-link">Blogs</a></li>
                                    <li><a href="{{route('faq')}}" class="submenu-link">FAQs</a></li>
                                </ul>
                            </div>
                        </li>

                          <li class="nav-item has-dropdown">
                            <a href="#" class="nav-link d-flex align-items-center gap-1">Career <i class="fas fa-chevron-down ms-1" style="font-size: 10px;"></i></a>
                            <div class="standard-dropdown">
                                <ul class="list-unstyled mb-0">
                                    <li><a href="{{ route('ourculture') }}" class="submenu-link">Our Culture & Values</a></li>
                                    <li><a href="{{route('currentopportunities')}}" class="submenu-link">Current Opportunities</a></li>
                                </ul>
                            </div>
                        </li>

                    </ul>
                </div>

                <div class="nav_right d-flex align-items-center gap-3 gap-lg-4">

                     <a  href="javascript:void(0)" class="btn btn--ripple d-none d-lg-flex align-items-center mt-0" id="ripple" data-bs-toggle="modal" data-bs-target="#searchModal"> <i class="fa fa-search me-3"></i> Search Products</a>

                    <a href="{{ route('contact') }}" onclick="localStorage.setItem('scrollToBuildTogether', '1')" class="btn btn--ripple d-none d-lg-flex align-items-center mt-0" id="ripple">Request Quote</a>

                    <i class="fa fa-search d-lg-none" data-bs-toggle="modal" data-bs-target="#searchModal"></i>

                    <div class="lang-select">
                        <span><svg class="light_logo" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"
                                fill="none">
                                <path
                                    d="M16 28C18.66 27.9998 21.2446 27.1163 23.348 25.488C25.4515 23.8598 26.9546 21.5791 27.6213 19.004M16 28C13.34 27.9998 10.7554 27.1163 8.65197 25.488C6.54854 23.8598 5.04544 21.5791 4.37867 19.004M16 28C19.3133 28 22 22.6267 22 16C22 9.37334 19.3133 4 16 4M16 28C12.6867 28 10 22.6267 10 16C10 9.37334 12.6867 4 16 4M27.6213 19.004C27.868 18.044 28 17.0373 28 16C28.0033 13.9361 27.4718 11.9067 26.4573 10.1093M27.6213 19.004C24.0656 20.9752 20.0656 22.0064 16 22C11.784 22 7.82267 20.9133 4.37867 19.004M4.37867 19.004C4.12633 18.0226 3.9991 17.0133 4 16C4 13.86 4.56 11.8493 5.54267 10.1093M16 4C18.1283 3.99911 20.2186 4.56448 22.0563 5.63809C23.894 6.71169 25.4129 8.25489 26.4573 10.1093M16 4C13.8717 3.99911 11.7814 4.56448 9.94375 5.63809C8.10606 6.71169 6.58708 8.25489 5.54267 10.1093M26.4573 10.1093C23.5542 12.6239 19.8407 14.0055 16 14C12.0027 14 8.34667 12.5333 5.54267 10.1093"
                                    stroke="#fff" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <svg class="dark_logo" xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"
                                fill="none">
                                <path
                                    d="M16 28C18.66 27.9998 21.2446 27.1163 23.348 25.488C25.4515 23.8598 26.9546 21.5791 27.6213 19.004M16 28C13.34 27.9998 10.7554 27.1163 8.65197 25.488C6.54854 23.8598 5.04544 21.5791 4.37867 19.004M16 28C19.3133 28 22 22.6267 22 16C22 9.37334 19.3133 4 16 4M16 28C12.6867 28 10 22.6267 10 16C10 9.37334 12.6867 4 16 4M27.6213 19.004C27.868 18.044 28 17.0373 28 16C28.0033 13.9361 27.4718 11.9067 26.4573 10.1093M27.6213 19.004C24.0656 20.9752 20.0656 22.0064 16 22C11.784 22 7.82267 20.9133 4.37867 19.004M4.37867 19.004C4.12633 18.0226 3.9991 17.0133 4 16C4 13.86 4.56 11.8493 5.54267 10.1093M16 4C18.1283 3.99911 20.2186 4.56448 22.0563 5.63809C23.894 6.71169 25.4129 8.25489 26.4573 10.1093M16 4C13.8717 3.99911 11.7814 4.56448 9.94375 5.63809C8.10606 6.71169 6.58708 8.25489 5.54267 10.1093M26.4573 10.1093C23.5542 12.6239 19.8407 14.0055 16 14C12.0027 14 8.34667 12.5333 5.54267 10.1093"
                                    stroke="#000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <!--<svg xmlns="http://www.w3.org/2000/svg" width="14" height="8" viewBox="0 0 14 8"-->
                            <!--    fill="none">-->
                            <!--    <path d="M13 1L7 7L1 1" stroke="white" stroke-linecap="round" stroke-linejoin="round" />-->
                            <!--</svg>-->
                        </span>
                        <div id="google_translate_element" ></div>
                    </div>
                    <div class="mobile_ham light_logo">
                         <button class="hamburger-btn " type="button" data-bs-toggle="offcanvas" data-bs-target="#navigationOffcanvas" aria-controls="navigationOffcanvas">
                        <div class="hamburger-icon  ">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </button>
                    </div>
                    <div class="mobile_ham dark_logo">
                        <button class="hamburger-btn " type="button" data-bs-toggle="offcanvas" data-bs-target="#navigationOffcanvas"
                        aria-controls="navigationOffcanvas">
                            <div class="hamburger-icon ">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </button>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- Search Modal -->
    <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content shadow-lg border-0">
                <div class="modal-header border-0 pb-0">
                    <p class="modal-title mb-0" id="searchModalLabel">What are you looking for?</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="filter: invert(0) !important"></button>
                </div>
                <div class="modal-body p-4 p-md-5 pt-3">
                    <form action="#" method="GET" class="search-form mt-2" id="productSearchForm">
                        <div class="input-group mb-4">
                            <span class="input-group-text bg-transparent border-0" id="search-icon">
                                <i class="fas fa-search fs-5"></i>
                            </span>
                            <input type="text" class="form-control border-0 shadow-none ps-2" id="productSearchInput" placeholder="Search products..." aria-label="Search" aria-describedby="search-icon" autocomplete="off">
                            <button class="btn btn--ripple m-0 border-0 rounded-0 px-4" type="submit" style="margin-top: 0 !important; border-radius: 0 4px 4px 0 !important;">Search</button>
                        </div>
                        <div id="productSearchResults" class="mb-4"></div>

                        <!-- Premium Filter System -->
                        <div class="filter-system mt-4">
                            <p class="mb-3 search-custem-filter-title">Filter by Category</p>
                            <div class="search-custem-filter">
                                @if(isset($categories) && is_countable($categories) && count($categories) > 0)
                                @foreach ($categories as $key => $category)
                                    {{-- @if (strtolower($category->name) !== 'ferrous metal & alloys') --}}
                                        <div class="form-check" style="display: flex; align-items: center; margin: 0;">
                                            <input class="form-check-input shadow-none m-0 product-search-category" type="checkbox" id="filterCat_{{ $key }}" value="{{ $category->id }}">
                                            <label class="form-check-label" for="filterCat_{{ $key }}"> {{ $category->name }}</label>
                                        </div>
                                    {{-- @endif --}}
                                @endforeach
                                @endif
                            </div>
                            <p class="mb-3 mt-4 search-custem-filter-title">Filter by Industry</p>
                            <div class="search-custem-filter">
                                @if(isset($industryProduct) && is_countable($industryProduct) && count($industryProduct) > 0)
                                @foreach ($industryProduct as $key => $industry)
                                    <div class="form-check" style="display: flex; align-items: center; margin: 0;">
                                        <input class="form-check-input shadow-none m-0 product-search-industry" type="checkbox" id="filterInd_{{ $key }}" value="{{ $industry->id }}">
                                        <label class="form-check-label" for="filterInd_{{ $key }}"> {{ $industry->title }}</label>
                                    </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!--mobile sidemenu  offcanvas js-->

    @include('layouts.catalogue')
    <script>
const wrapper = document.getElementById("menuWrapper");
const submenus = document.querySelectorAll(".sidebar_submenu");

document.addEventListener("click", function(e){
  const next = e.target.closest(".next-menu");
  const back = e.target.closest(".back-menu");

  if(next){
    e.preventDefault();
    let target = parseInt(next.getAttribute("data-target")) || 0;

    // sab submenu hide karo
    submenus.forEach((sm) => {
      sm.style.display = "none";
      sm.style.opacity = "0";
      sm.style.transition = "opacity 0.4s ease-in-out";
    });

    // sirf clicked wala show karo
    if(submenus[target-1]) {
      submenus[target-1].style.display = "block";
      setTimeout(() => {
        submenus[target-1].style.opacity = "1";
      }, 50);
    }

    // wrapper hamesha 100% pe slide kare
    wrapper.style.transition = "transform 0.4s ease-in-out";
    wrapper.style.transform = `translateX(-100%)`;
  }

  if(back){
    e.preventDefault();

    // sab submenu hide karo
    submenus.forEach((sm) => {
      sm.style.opacity = "0";
      sm.style.transition = "opacity 0.4s ease-in-out";
      setTimeout(() => { sm.style.display = "none"; }, 400);
    });

    // wrapper ko wapas reset karo
    wrapper.style.transition = "transform 0.4s ease-in-out";
    wrapper.style.transform = `translateX(0%)`;
  }
});

</script>

        <script>
document.addEventListener("DOMContentLoaded", function() {
    let header = document.getElementById("siteHeader");
    let path = window.location.pathname.toLowerCase();

    // Check if the path ends with any of the home page identifiers
    let isHome = path === '/' ||
                 path.endsWith('/index') ||
                 path.endsWith('/index.php') ||
                 path.endsWith('/goldenharbour-preview') ||
                 path.endsWith('/new-index') ||
                 path.endsWith('/golden_harbour') ||
                 path.endsWith('/golden_harbour/') ||
                 path.endsWith('/golden_harbour/public') ||
                 path.endsWith('/golden_harbour/public/');

    if(isHome){
        header.classList.add("index-page");
    } else {
        header.classList.remove("index-page");
    }
});


</script>
<!-- script for hamburger color change -->
    <script>
document.addEventListener('DOMContentLoaded', () => {
    const hamburger = document.querySelector('.hamburger-icon');
    if (!hamburger) return;

    function setHamburgerColor(color) {
        hamburger.style.setProperty('--hamburger-color', color);
    }

    // Update color whenever a section is at least 60% visible
    const sections = document.querySelectorAll('section');
    const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
            if (entry.isIntersecting && entry.intersectionRatio > 0.6) {
                const sec = entry.target;
                if (sec.classList.contains('dark')) {
                    setHamburgerColor('#fff');     // white if section is dark
                } else if (sec.classList.contains('white')) {
                    setHamburgerColor('#111');    // dark gray/black if section is white
                }
            }
        });
    }, { threshold: 0.6 });

    sections.forEach(sec => observer.observe(sec));
});
</script>


<!-- offcanvas script -->
    <script>
document.addEventListener("DOMContentLoaded", function () {
    const offcanvasElement = document.getElementById('navigationOffcanvas');
    const hamburgerIcon = document.querySelector('.hamburger-icon');

    // Toggle hamburger icon
    offcanvasElement.addEventListener('show.bs.offcanvas', () => hamburgerIcon.classList.add('open'));
    offcanvasElement.addEventListener('hide.bs.offcanvas', () => hamburgerIcon.classList.remove('open'));

    // Generic submenu handler
    function setupSubmenu(toggleId, submenuId) {
        const toggle = document.getElementById(toggleId);
        const submenu = document.getElementById(submenuId);
        const dropdownArrow = toggle.querySelector('.dropdown-arrow');
        let hoverTimeout, hideTimeout;

        // Show submenu
        toggle.addEventListener('mouseenter', () => {
            clearTimeout(hoverTimeout);
            clearTimeout(hideTimeout);
            submenu.classList.add('show');
            submenu.classList.remove('hiding');
            dropdownArrow?.classList.add('rotated');
        });

        // Hide submenu
        function hideSubmenu() {
            submenu.classList.add('hiding');
            submenu.classList.remove('show');
            dropdownArrow?.classList.remove('rotated');
            hideTimeout = setTimeout(() => {
                submenu.classList.remove('hiding');
            }, 300);
        }

        toggle.addEventListener('mouseleave', () => {
            hoverTimeout = setTimeout(hideSubmenu, 200);
        });
        submenu.addEventListener('mouseenter', () => {
            clearTimeout(hoverTimeout);
            clearTimeout(hideTimeout);
        });
        submenu.addEventListener('mouseleave', () => {
            hoverTimeout = setTimeout(hideSubmenu, 200);
        });

        // Close on offcanvas hide
        offcanvasElement.addEventListener('hide.bs.offcanvas', () => {
            submenu.classList.remove('show');
            dropdownArrow?.classList.remove('rotated');
        });

        // Close on submenu click
       submenu.querySelectorAll('.submenu-link').forEach(link => {
    link.addEventListener('click', e => {
        const href = link.getAttribute("href");

        // Agar href="#", ya href blank hai, tabhi preventDefault
        if (!href || href === "#") {
            e.preventDefault();
        }

        const offcanvas = bootstrap.Offcanvas.getInstance(offcanvasElement);
        if (offcanvas) offcanvas.hide();

        submenu.classList.remove('show');
        dropdownArrow?.classList.remove('rotated');

        console.log("Navigating to submenu:", link.textContent.trim());
    });
});

    }

    // Setup for all three
    setupSubmenu("aboutToggle", "aboutSubmenuSlider");
    setupSubmenu("resourceToggle", "resourceSubmenuSlider");
    setupSubmenu("productToggle", "productSubmenuSlider");
    setupSubmenu("careerToggle", "careerSubmenuSlider");
        // ✅ Child submenu (inside Product → Non Ferrous Metal & Alloys)
    setupSubmenu("nonFerrousToggle", "productSubmenuchildSlider");

        // Other nav link clicks (non-submenu)
        document.querySelectorAll('.nav-link').forEach(link => {
            if (["aboutToggle", "resourceToggle", "productToggle"].includes(link.id)) return;
            link.addEventListener('click', e => {
                e.preventDefault();
                const text = link.textContent.trim();
                const offcanvas = bootstrap.Offcanvas.getInstance(offcanvasElement);
                if (offcanvas) offcanvas.hide();
                console.log("Navigating to:", text);
            });
        });
    });
</script>
<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            includedLanguages: 'en,ar', // Only English & Arabic
            layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL
        }, 'google_translate_element');
    }

    function toggleGoogleTranslate() {
        var translateElement = document.getElementById("google_translate_element");
        if (translateElement.style.display === "none") {
            translateElement.style.display = "block";
        } else {
            translateElement.style.display = "none";
        }
    }

    // Rename Google Translate dropdown options for mobile safely without freezing the browser!
    document.addEventListener("DOMContentLoaded", function() {
        function updateTranslateText() {
            if (window.innerWidth <= 767.98) {
                var select = document.querySelector('.goog-te-combo');
                if (select) {
                    for (var i = 0; i < select.options.length; i++) {
                        var opt = select.options[i];
                        if (opt.value === "" && opt.text !== "EN") {
                            opt.text = "EN"; // Default placeholder
                        } else if (opt.value === "en" && opt.text !== "EN") {
                            opt.text = "EN";
                        } else if (opt.value === "ar" && opt.text !== "AR") {
                            opt.text = "AR";
                        }
                    }
                }
            }
        }

        // MutationObserver to detect when Google Translate injects the select element
        var observer = new MutationObserver(function(mutations) {
            // 1. Temporarily disconnect observer so our own text changes don't trigger it again!
            observer.disconnect();

            // 2. Perform changes
            updateTranslateText();

            // 3. Re-observe safely
            var targetNode = document.getElementById('google_translate_element');
            if (targetNode) {
                observer.observe(targetNode, { childList: true, subtree: true });
            }
        });

        var targetNode = document.getElementById('google_translate_element');
        if (targetNode) {
            observer.observe(targetNode, { childList: true, subtree: true });
        }

        window.addEventListener('resize', updateTranslateText);
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        const $form = $('#productSearchForm');
        const $input = $('#productSearchInput');
        const $resultsBox = $('#productSearchResults');
        let searchTimer = null;

        if (!$form.length || !$input.length || !$resultsBox.length) return;

        function selectedCategories() {
            const categories = [];
            $('.product-search-category:checked').each(function() {
                categories.push($(this).val());
            });
            return categories;
        }

        function selectedIndustries() {
            const industries = [];
            $('.product-search-industry:checked').each(function() {
                industries.push($(this).val());
            });
            return industries;
        }

        function showMessage(message) {
            $resultsBox.show().html(`<div class="p-3 text-muted">${message}</div>`);
        }

        function renderResults(items) {
            if (!items.length) {
                showMessage('No products found');
                return;
            }

            $resultsBox.show();
            const html = items.map((item) => `
                <a href="${item.url}" class="d-flex gap-3">
                    <img src="${item.image}" alt="${item.title}" width="75">
                    <div>
                        <strong>${item.subcategory} ${item.title}</strong>
                        <small><b>${item.type}</b> | ${item.category}</small>
                        ${item.industries ? `<small class="text-muted d-block mt-1"><b>Industries</b> - ${item.industries}</small>` : ''}
                    </div>
                </a>
            `).join('');
            $resultsBox.html(html);
        }

        function searchProducts() {
            const query = $.trim($input.val());

            if (query.length < 2) {
                $resultsBox.hide().html('');
                return;
            }

            const data = {
                query: query,
                categories: selectedCategories(),
                industries: selectedIndustries()
            };

            showMessage('Searching...');

            $.ajax({
                url: "{{ route('product.search') }}",
                method: "GET",
                data: data,
                dataType: "json",
                success: renderResults,
                error: function() {
                    showMessage('Search is unavailable right now');
                }
            });
        }

        function queueSearch() {
            clearTimeout(searchTimer);
            searchTimer = setTimeout(searchProducts, 300);
        }

        $input.on('input', queueSearch);
        $(document).on('change', '.product-search-category, .product-search-industry', searchProducts);

        $form.on('submit', function (event) {
            event.preventDefault();
            const $firstResult = $resultsBox.find('a').first();

            if ($firstResult.length) {
                window.location.href = $firstResult.attr('href');
                return;
            }

            searchProducts();
        });
    });
</script>

<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
