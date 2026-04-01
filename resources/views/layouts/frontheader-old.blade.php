<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{!! $meta_title ?? $title ?? 'products' !!}</title>
    <meta name="description" content="{!! $meta_description ?? $description ?? 'products_description' !!}">
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
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" />
     <!-- Link font-awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <!-- Link Rubik font CSS -->
    <link href="https://fonts.googleapis.com/css2?family=Geist:wght@100..900&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
<style>
.navbar-nav .mega-tab-menu:hover .dropdown-menu {
        display: flex;
        width: 700px;
        padding: 0;
        color: var(--gray);
    }
    .mega-tab-menu .dropdown-menu li a::before{
    border-bottom: none;
    
    }

    .mega-tab-menu .tabs-list {
        width: 100%;
        border-right: 1px solid #ddd;
        list-style: none;
        padding: 2rem 2rem 1rem 3rem;
    }


    .mega-tab-menu .tabs-list li {
        padding:30px  0px 5px 0;
        cursor: pointer;
            padding-left: 5px;
    padding-right: 25px;
    border-bottom: 2px solid var(--dd-color);
    }

    .mega-tab-menu .tabs-list li.active ,
    .mega-tab-menu .tab-content ul li:hover ,
    .mega-tab-menu .tabs-list li:hover {
        font-weight: bold;
        color: var(--blue);
        border-bottom: 2px solid var(--blue);
    }

    .mega-tab-menu .tab-content {
        width: 100%;
        padding: 2rem 5rem 1rem 3rem;;
    }

    .mega-tab-menu .tab-content ul {
        list-style: none;
        padding-left: 0;
    }

    .mega-tab-menu .tab-content ul li {
        padding: 15px  0px 10px 0;
         border-bottom: 2px solid var(--dd-color);
    }

    .mega-tab-menu .dropdown:hover .dropdown-menu {
        display: flex;
    }
    @media (max-width: 1281px) {
    .navbar-nav .mega-tab-menu:hover .dropdown-menu{
        width:650px;
    }
    .mega-tab-menu .tabs-list{    padding: 2rem 2rem 1rem 2rem;}
    .mega-tab-menu .tabs-list li{padding-left: 15px !important; padding: 20px 0px 5px 0;}
    }
            .custom-placeholder {
  color: #666;
  font-size: 14px;
  transition: opacity 0.3s ease;
}
@media (max-width: 767.98px) {
  .custom-placeholder {
    display: none;
  }

  #google_translate_element select {
    opacity: 1 !important;
  }
}
</style>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light ">
            <div class="container">
                <a class="navbar-brand" href="{{url('/')}}">
                    <img src="{{asset('public/front/images/logo.svg')}}" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
                    aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <form class="d-flex hd_search">
                        <div class="lang-select">
                            <span><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"
                                    fill="none">
                                    <path
                                        d="M16 28C18.66 27.9998 21.2446 27.1163 23.348 25.488C25.4515 23.8598 26.9546 21.5791 27.6213 19.004M16 28C13.34 27.9998 10.7554 27.1163 8.65197 25.488C6.54854 23.8598 5.04544 21.5791 4.37867 19.004M16 28C19.3133 28 22 22.6267 22 16C22 9.37334 19.3133 4 16 4M16 28C12.6867 28 10 22.6267 10 16C10 9.37334 12.6867 4 16 4M27.6213 19.004C27.868 18.044 28 17.0373 28 16C28.0033 13.9361 27.4718 11.9067 26.4573 10.1093M27.6213 19.004C24.0656 20.9752 20.0656 22.0064 16 22C11.784 22 7.82267 20.9133 4.37867 19.004M4.37867 19.004C4.12633 18.0226 3.9991 17.0133 4 16C4 13.86 4.56 11.8493 5.54267 10.1093M16 4C18.1283 3.99911 20.2186 4.56448 22.0563 5.63809C23.894 6.71169 25.4129 8.25489 26.4573 10.1093M16 4C13.8717 3.99911 11.7814 4.56448 9.94375 5.63809C8.10606 6.71169 6.58708 8.25489 5.54267 10.1093M26.4573 10.1093C23.5542 12.6239 19.8407 14.0055 16 14C12.0027 14 8.34667 12.5333 5.54267 10.1093"
                                        stroke="#A8964E" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg></span>
                            {{-- <select>
                                <option selected>Select Language</option>
                                <option>English</option>
                                <option>हिन्दी</option>
                                <option>العربية</option>
                            </select> --}}
                            <div id="google_translate_element" class="translate-wrap">
                                 <span class="custom-placeholder" style="padding-right:90px;">Select Language</span>
                            </div>
                        </div>
                        <div class="search-container me-md-4">
                            <span class="search-icon"><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32"
                                    viewBox="0 0 32 32" fill="none">
                                    <path
                                        d="M27.9999 28L21.0706 21.0707M21.0706 21.0707C22.946 19.1952 23.9997 16.6516 23.9997 13.9993C23.9997 11.3471 22.946 8.80344 21.0706 6.928C19.1952 5.05257 16.6515 3.99896 13.9993 3.99896C11.347 3.99896 8.80338 5.05257 6.92794 6.928C5.05251 8.80344 3.9989 11.3471 3.9989 13.9993C3.9989 16.6516 5.05251 19.1952 6.92794 21.0707C8.80338 22.9461 11.347 23.9997 13.9993 23.9997C16.6515 23.9997 19.1952 22.9461 21.0706 21.0707Z"
                                        stroke="#A8964E" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                </svg></span>
                                <form method="GET" action="{{ route('search') }}">
                                    <input class="search-input text-mute" id="liveSearch" type="search" name="search" placeholder="Search Products ......">
                                    <div id="suggestions" class="suggestions-box"></div>
                                </form>
                        </div>

                    </form>
                    <div class="line_bg"></div>
                       <ul class="navbar-nav ms-auto my-2 my-lg-0 navbar-nav-scroll">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{  request()->routeIs('about') ||  request()->routeIs('our-agencies') || 
                            request()->routeIs('milestone') || 
                            request()->routeIs('certifications') ? 'active' : '' 
                        }}" href="#" id="navbarScrollingDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                About
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                <!-- First Level -->
                                <li><a class="dropdown-item" href="{{route('about')}}">Company Profile</a></li>
                                <li><a class="dropdown-item" href="{{route('our-agencies')}}">Our Principals</a></li>
                                <li><a class="dropdown-item" href="{{route('milestone')}}"> Milestone</a></li>
                                <li><a class="dropdown-item" href="{{route('certifications')}}"> Certifications</a></li>
                            </ul>
                        </li>

                        @php
                        use Illuminate\Support\Facades\DB;
                        use Illuminate\Support\Str;

                        // Get all active categories, subcategories, and products
                        $categories = DB::table('category')->whereNull('deleted_at')->get();
                        $subcategories = DB::table('subcategory')->whereNull('deleted_at')->get();
                        $products = DB::table('product')->whereNull('deleted_at')->get();

                        // Group products and subcategories
                        $productsBySub = $products->groupBy('subcategory_id');
                        $subcategoriesByCat = $subcategories->groupBy('category_id');

                        // Tab ID formatter
                        function toTabId($str) {
                            return Str::camel(str_replace(['&', ',', '-', ' '], '', $str));
                        }

                        // Get subcategories under category that have products
                        function validSubcategories($catId, $subcategoriesByCat, $productsBySub) {
                            return $subcategoriesByCat[$catId] ?? collect([])->filter(function ($sub) use ($productsBySub) {
                                return isset($productsBySub[$sub->id]);
                            });
                        }
                        @endphp

                        <!-- Desktop View -->
                        <li class="mega-tab-menu dropdown d-md-block d-none">
                            <a class="nav-link dropdown-toggle {{ request()->is('products*') || request()->is('category/*') || request()->is('subcategory/*') || request()->is('product/*') ? 'active' : '' }}" href="Javascript::void(0)" id="navbarScrollingDropdown" role="button">
                                Products
                            </a>
                            <div class="dropdown-menu hed-tab-menu" aria-labelledby="navbarScrollingDropdown">
                                <!-- Tabs List -->
                                <ul class="tabs-list hed-tab-list">
                                    @foreach ($categories as $index => $cat)
                                        <li class="{{ $index === 0 ? 'active' : '' }}" onclick="showTab('{{ toTabId($cat->name) }}')">
                                            {{ $cat->name }}
                                        </li>
                                    @endforeach
                                </ul>

                                <!-- Tab Content -->
                                <div class="tab-content hed-tab-content">
                                    @foreach ($categories as $index => $cat)
                                        @php
                                            $tabId = toTabId($cat->name);
                                            $validSubs = validSubcategories($cat->id, $subcategoriesByCat, $productsBySub);
                                        @endphp
                                        <div id="{{ $tabId }}" class="tab-pane hed-tab-pane" style="display: {{ $index === 0 ? 'block' : 'none' }};">
                                            <ul>
                                                @forelse ($validSubs as $sub)
                                                @php
                                                    $categoryName = strtolower(trim($cat->name));
                                                    $subcategoryName = strtolower(trim($sub->name));
                                                    $categoryUrl = strtolower(trim($cat->url));
                                                    $subcategoryUrl = strtolower(trim($sub->url));
                                            
                                                    $isOtherProducts = $categoryName === 'other products';
                                                    $isWeldingElectricalHoses = $categoryName === 'welding, electrical and hoses';
                                                    $specialSubcategories = ['cables', 'ceramics backing strips', 'ceramics-backing-strips'];
                                            
                                                    $isDirectDetailView = $isOtherProducts ||
                                                        ($isWeldingElectricalHoses && in_array($subcategoryName, $specialSubcategories));
                                                @endphp
                                            
                                                <li>
                                                    <a href="{{ $isDirectDetailView
                                                        ? route('productdetail', [
                                                            'category' => $cat->url,
                                                            'subcategory' => $sub->url,
                                                            'product' => $sub->url,
                                                        ])
                                                        : route('productlist', [
                                                            'category' => $cat->url,
                                                            'subcategory' => $sub->url,
                                                        ]) }}">
                                                        {{ $sub->name }}
                                                    </a>
                                                </li>
                                            @empty
                                                <li><a href="#">No products available</a></li>
                                            @endforelse
                                            </ul>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </li>

                        <!-- Mobile View -->
                        <li class="nav-item dropdown menuitem d-md-none d-block">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Products
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                @foreach ($categories as $cat)
                                    @php
                                        $validSubs = validSubcategories($cat->id, $subcategoriesByCat, $productsBySub);
                                    @endphp
                                    @if ($validSubs->isNotEmpty())
                                    <li class="dropdown dropdown-submenu">
                                        <a class="dropdown-item dropdown-toggle" href="#" id="submenuDropdown">
                                            {{ $cat->name }}
                                        </a>
                                        <ul class="sub-dropdown-menu" aria-labelledby="submenuDropdown">
                                            @foreach ($validSubs as $sub)
                                                @php
                                                    $categoryName = strtolower(trim($cat->name));
                                                    $subcategoryName = strtolower(trim($sub->name));
                                                    
                                                    $isOtherProducts = $categoryName === 'other products';
                                                    $isWeldingElectricalHoses = $categoryName === 'welding, electrical and hoses';
                                                    $specialSubcategories = ['cables', 'ceramics backing strips', 'ceramics-backing-strips'];
                                
                                                    $isDirectDetailView = $isOtherProducts ||
                                                        ($isWeldingElectricalHoses && in_array($subcategoryName, $specialSubcategories));
                                                @endphp
                                
                                                <li>
                                                    <a href="{{ $isDirectDetailView
                                                        ? route('productdetail', [
                                                            'category' => $cat->url,
                                                            'subcategory' => $sub->url,
                                                            'product' => $sub->url
                                                        ])
                                                        : route('productlist', [
                                                            'category' => $cat->url,
                                                            'subcategory' => $sub->url
                                                        ]) }}">
                                                        {{ $sub->name }}
                                                    </a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @else
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                {{ $cat->name }}
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </li>
                        <!--<li class="nav-item">-->
                        <!--    <a class="nav-link active" aria-current="page" href="{{route('industries')}}">Industries</a>-->
                        <!--</li>-->
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('industries') ? 'active' : '' }}" href="{{route('industries')}}">Industries</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{  request()->routeIs('faq') ||  request()->routeIs('gallery') ? 'active' : '' 
                        }}" href="#" id="navbarScrollingDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Resources
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                <!-- First Level -->
                                <li><a class="dropdown-item" href="{{route('faq')}}">FAQ's</a></li>
                                <li><a class="dropdown-item" href="{{route('gallery')}}">Gallery</a></li>
                                <!--<li><a class="dropdown-item" href="{{route('event')}}">Event</a></li>-->
                                <li><a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#staticBackdrop">E-Catalogue</a></li>
                                <!--<li><a class="dropdown-item" href="{{route('catalogue')}}">E-catalogue</a></li>-->
                            </ul>
                        </li>
                        <!--<li class="nav-item">-->
                        <!--    <a class="nav-link" href="{{route('news')}}">News</a>-->
                        <!--</li>-->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{  request()->routeIs('ourculture') || request()->routeIs('novacancy') ||  request()->routeIs('currentopportunities') ? 'active' : '' 
                        }}" href="#" id="navbarScrollingDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Career
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                <!-- First Level -->
                                <li><a class="dropdown-item" href="{{route('ourculture')}}">Our Culture & Values</a></li>
                                <li><a class="dropdown-item" href="{{route('currentopportunities')}}">Current Opportunities</a></li>
                                {{-- <li><a class="dropdown-item" href="current-vacancies-detail.php">Current Vacancies Detail</a></li> --}}
                            </ul>
                        </li>
                        <!--<li class="nav-item">-->
                        <!--    <a class="nav-link" href="{{route('contact')}}" tabindex="-1" aria-disabled="true">Contact</a>-->
                        <!--</li>-->
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{route('contact')}}">Contact</a>
                        </li>
                    </ul>
                    <span class="closepanel"><i class="fa fa-times"></i></span>
                </div>
            </div>
        </nav>
    </header>
    <script>
    //  ***********mobile menu prodyct dropdown jss ***********
document.addEventListener('DOMContentLoaded', function () {
  // Get all items that open submenus
  document.querySelectorAll('.dropdown-submenu > a.dropdown-toggle').forEach(function (element) {
    element.addEventListener('click', function (e) {
      e.preventDefault(); // prevent Bootstrap from closing the dropdown
      e.stopPropagation(); // stop event bubbling

      // Close other open submenus
      document.querySelectorAll('.sub-dropdown-menu').forEach(menu => {
        if (menu !== element.nextElementSibling) {
          menu.classList.remove('show');
        }
      });

      // Toggle this submenu
      const submenu = element.nextElementSibling;
      if (submenu) submenu.classList.toggle('show');
    });
  });

  // Close submenus when dropdown is fully hidden
  document.querySelectorAll('.mega-tab-menu').forEach(dropdown => {
    dropdown.addEventListener('hide.bs.dropdown', function () {
      document.querySelectorAll('.sub-dropdown-menu').forEach(menu => {
        menu.classList.remove('show');
      });
    });
  });
});

    
    //  *********** on click js  ***********
    // function showTab(tabId) {
    //     // Hide all tab panes
    //     document.querySelectorAll('.tab-pane').forEach(tab => tab.style.display = 'none');

    //     // Remove active from all tabs
    //     document.querySelectorAll('.tabs-list li').forEach(li => li.classList.remove('active'));

    //     // Show selected pane
    //     document.getElementById(tabId).style.display = 'block';

    //     // Add active class to selected tab
    //     const selectedTab = Array.from(document.querySelectorAll('.tabs-list li'))
    //         .find(li => li.getAttribute('onclick')?.includes(tabId));
    //     if (selectedTab) selectedTab.classList.add('active');
    // }
    
    // *******on hover js ***********
document.addEventListener('DOMContentLoaded', function () {
  const tabItems = document.querySelectorAll('.hed-tab-list li');
  const firstTabId = tabItems[0]?.getAttribute('onclick')?.match(/'([^']+)'/)?.[1];

  // Hover triggers click
  tabItems.forEach(tab => {
    tab.addEventListener('mouseenter', function () {
      tab.click();
    });
  });

  // Reset tab on dropdown hide
  const dropdownMenu = document.querySelector('.dropdown-menu.hed-tab-menu');
  const dropdownParent = dropdownMenu?.closest('.mega-tab-menu');

  if (dropdownParent) {
    dropdownParent.addEventListener('mouseleave', function () {
      if (firstTabId) showTab(firstTabId);
    });
  }
});

function showTab(tabId) {
  document.querySelectorAll('.hed-tab-pane').forEach(tab => tab.style.display = 'none');
  document.querySelectorAll('.hed-tab-list li').forEach(li => li.classList.remove('active'));

  const tabPane = document.getElementById(tabId);
  if (tabPane) tabPane.style.display = 'block';

  const selectedTab = Array.from(document.querySelectorAll('.hed-tab-list li'))
    .find(li => li.getAttribute('onclick')?.includes(tabId));
  if (selectedTab) selectedTab.classList.add('active');
}




</script>
<script>
// custom-placeholder js 
 if (window.innerWidth >= 768) {
  const observer = new MutationObserver(() => {
    const select = document.querySelector('#google_translate_element select');
    if (select && select.offsetParent !== null) {
      select.style.opacity = "1";
      const placeholder = document.querySelector('.custom-placeholder');
      if (placeholder) placeholder.style.display = 'none';
      observer.disconnect();
    }
  });

  observer.observe(document.getElementById('google_translate_element'), {
    childList: true,
    subtree: true
  });
}

</script>
    <script type="text/javascript">
    // function googleTranslateElementInit() {
    //     new google.translate.TranslateElement({
    //         //  pageLanguage: 'en', 
    //          includedLanguages: 'hi,bn,mr,te,ta,gu,ur,kn,or,ml,en,zh-CN,es,fr,ar,ru,pt'
    //         layout: google.translate.TranslateElement.InlineLayout.SIMPLE,
    //         autoDisplay: false
    //     }, 'google_translate_element');
    // }
    
        function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            includedLanguages: 'hi,bn,mr,te,ta,gu,ur,kn,or,ml,en,zh-CN,es,fr,ar,ru,pt'
        }, 'google_translate_element');
    }
    
</script>

<script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en'
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
<script>
$(document).ready(function () {
    $('#liveSearch').on('keyup', function () {
        let query = $(this).val();
        if (query.length > 1) {
            $.ajax({
                url: "{{ route('autocomplete.search') }}",
                type: "GET",
                data: { query: query },
                success: function (data) {
                    $('#suggestions').html(data).show();
                }
            });
        } else {
            $('#suggestions').hide();
        }
    });

    $(document).on('click', '#suggestions div', function () {
        const url = $(this).data('url');
        if (url) {
            window.location.href = url; // 🔁 redirect on click
        }
    });

    // Optional: hide suggestions when clicking outside
    $(document).click(function (e) {
        if (!$(e.target).closest('#liveSearch, #suggestions').length) {
            $('#suggestions').hide();
        }
    });
});
</script>


<script type="text/javascript" src="https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
<style>
    .suggestions-box {
    border: 1px solid #ccc;
    display: none;
    position: absolute;
    background: #fff;
    z-index: 999;
    width: fit-content;
    }
    .suggestions-box div {
        padding: 8px;
        cursor: pointer;
    }
    .suggestions-box div:hover {
        background-color: #f0f0f0;
    }
        .goog-te-gadget-simple {
            border: none !important; 
            background: none !important; 
            padding: 0 !important; 
            font-family: "Glacial Indifference", sans-serif;
        }
        .goog-te-gadget-icon {
            display: none !important; 
        }
        .goog-te-gadget-simple span {
            border-left: none !important;
            font-family: inherit !important;
            color: var(--gray) !important;
            font-size: 16px !important;
        }
        .lang-select {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .custom-select {
        display: flex;
        align-items: center;
        gap: 8px;
        background-color: #fff;
        border: 2px solid #D9D9D9;
        border-radius: 25px;
        padding: 8px 15px;
        cursor: pointer;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .custom-select:hover {
        border-color: #A8964E;
    }

    .custom-select .icon svg {
        stroke: #A8964E;
    }

    .goog-te-combo {
        border: none;
        background: transparent;
        outline: none;
        color: #000;
        font-weight: 500;
        cursor: pointer;
    }
</style>
<style>

        .goog-te-gadget {
           
            font-size: 0px;
        }

        .goog-te-gadget span
        {
            display:none;
        }
        .goog-te-gadget-simple {
            border: none !important; 
            background: none !important; 
            padding: 0 !important; 
            font-family: "Glacial Indifference", sans-serif;
        }
        .goog-te-gadget-icon {
            display: none !important; 
        }
        .goog-te-gadget-simple span {
            border-left: none !important;
            font-family: inherit !important;
            color: var(--gray) !important;
            font-size: 16px !important;
        }
        .lang-select {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .custom-select {
        display: flex;
        align-items: center;
        gap: 8px;
        background-color: #fff;
        border: 2px solid #D9D9D9;
        border-radius: 25px;
        padding: 8px 15px;
        cursor: pointer;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .custom-select:hover {
        border-color: #A8964E;
    }

    .custom-select .icon svg {
        stroke: #A8964E;
    }

    .goog-te-combo {
        border: none;
        background: transparent;
        outline: none;
        color: #000;
        font-weight: 500;
        cursor: pointer;
    }
</style>