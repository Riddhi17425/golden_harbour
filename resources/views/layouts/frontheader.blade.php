<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{!! $meta_title ?? $title ?? 'Golden Harbour' !!}</title>
    <meta name="description" content="{{ strip_tags($meta_description ?? $description ?? 'Golden Harbour') }}">
    
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

    <meta property="og:title" content="{{ $meta_title ?? $title ?? 'Golden Harbour' }}">
    <meta property="og:description" content="{{ $meta_description ?? $description ?? '' }}">
    <meta property="og:type" content="article">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:image" content="{{ $og_image ?? asset('public/front/images/GH_Favicon.png') }}">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="627">
    <!-- OG Tags End -->
    
    <style>
		 @media (max-width: 576px) {
			 section.new_hero.dark {
			background-position-x: 60%;
		}}
    </style>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MNDQPQZX');</script>
<!-- End Google Tag Manager -->
</head>

<body>
 
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MNDQPQZX"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
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
                        <a href="{{ route('contact') }}" class="nav-link">
                            <span>Contact</span>
                        </a>
                    </li>
                </ul>
                </div>
                <div>
                    <ul class="nav-menu">
                        <li class="nav-item">
                        <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#e-catalogue">
                            <span>E-Catalogue</span>
                        </a>
                    </li>
                    </ul>
                </div>
            </div>

            <div class="about-submenu-slider" id="aboutSubmenuSlider">
                <div class="submenu-header">
                    <h5 class="submenu-title">
                        About
                    </h5>
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
                    <h5 class="submenu-title">
                        Resources
                    </h5>
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
           
            @endphp
            <div class="about-submenu-slider" id="productSubmenuSlider">
                <div class="submenu-header">
                    <h5 class="submenu-title">
                        Product
                    </h5>
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
                    <h5 class="submenu-title">
                        Career
                    </h5>
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
                        <a href="{{ route('contact') }}" class="nav-link">
                            <span>Contact</span>
                        </a>
                    </li>
                </ul>
                </div>
                <div>
                    <ul class="nav-menu list-unstyled sidemenu m-0 p-3">
                        <li class="nav-item">
                        <a href="#" class="nav-link" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
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
                    <h5 class="submenu-title">
                        About
                    </h5>
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
                    <h5 class="submenu-title">
                        Resource
                    </h5>
                </div>
                <div class="submenu-content pt-0">
                    <ul class="submenu-list">
                        <li style="transition: all .6s ease .3s;"><a href="{{ route('industries') }}" class="submenu-link">Industries</a>
                        </li>
                        <!--<li style="transition: all .6s ease .4s;"><a href="#" class="submenu-link" data-bs-toggle="modal" data-bs-target="#staticBackdrop">E-Catalogue</a>-->
                        <!--</li>-->
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
                    <h5 class="submenu-title">
                        Product 
                    </h5>
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
                    <h5 class="submenu-title">
                        Career
                    </h5>
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

    <header class="new_header site-header" id="siteHeader" class="site-header">
        <div class="container">
            <nav>
                <a class="navbar-brand" href="{{url('/')}}">
                    <img src="{{asset('public/front/images/new_index/GOLDEN-HARBOUR-white.svg')}}" alt="logo"
                        class="light_logo">
                    <img src="{{asset('public/front/images/GOLDEN-HARBOUR-blue.svg')}}" alt="logo" class="dark_logo">
                </a>
                <div class="nav_right">
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
                         <button class="hamburger-btn " type="button" data-bs-toggle="offcanvas" data-bs-target="#navigationOffcanvas"
        aria-controls="navigationOffcanvas">
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
    <!--mobile sidemenu  offcanvas js-->
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

    let indexPaths = ["/", "/index", "/index.html", "/goldenharbour-preview/", "/new-index", "/new-index/"];

    if(indexPaths.includes(path)){
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
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
 
    <script type="text/javascript"
        src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
