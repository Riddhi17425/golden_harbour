<!-- sidebar -->
<div class="sidebar px-4 py-4 py-md-4 me-0">
    <div class="d-flex flex-column h-100">
        <a href="{!! route('home') !!}" class="mb-0 brand-icon">
            <span class="logo-icon">
                <!--<i class="bi bi-bag-check-fill fs-4"></i>-->
                <img src="{{ url('/') }}/public/admin_public/dist/assets/images/goldenharbour-logo.png" alt="Logo" class="img-fluid" style="width:30px; height:auto;">
            </span>
            <span class="logo-text">{{ Auth::user()->name }} </span>
        </a>
        <ul class="menu-list flex-grow-1 mt-3">
            <li><a class="m-link {{ Request::is('admin/dashboard') ? 'active' : '' }}"
                    href="{!! route('admin/dashboard') !!}"><i class="icofont-home fs-5"></i>
                    <span>Dashboard</span></a></li>
            <li
                class="collapsed{{ Request::is('admin/home*') || Request::is('admin/valuableclient*') || Request::is('admin/whychoose*') || Request::is('admin/network*')  ? ' active' : '' }}">
                <a class="m-link{{ Request::is('admin/home*') || Request::is('admin/valuableclient*') || Request::is('admin/whychoose*') || Request::is('admin/network*')  ? ' active' : '' }}"
                    data-bs-toggle="collapse" data-bs-target="#menu-home" href="#">
                    <i class="icofont-ui-home fs-5"></i>
                    <span>Home Page</span>
                    <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span>
                </a>
                <ul class="sub-menu collapse{{ Request::is('admin/home*') || Request::is('admin/valuableclient*') || Request::is('admin/whychoose*') || Request::is('admin/network*') ? ' show' : '' }}"
                    id="menu-home">
                    <li class="{{ Request::is('admin/valuableclient*') ? ' active' : '' }}">
                        <a class="ms-link{{ Request::routeIs('valuableclient.index') ? ' active' : '' }}"
                            href="{!! route('valuableclient.index') !!}">
                            <i class="icofont-rocket fs-5"></i>
                            <span>Valuable Client</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/whychoose*') ? ' active' : '' }}">
                        <a class="ms-link{{ Request::routeIs('whychoose.index') ? ' active' : '' }}"
                            href="{!! route('whychoose.index') !!}">
                            <i class="icofont-question-circle fs-5"></i>
                            <span>Why Choose Us</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/network*') ? ' active' : '' }}">
                        <a class="ms-link{{ Request::routeIs('network.index') ? ' active' : '' }}"
                            href="{!! route('network.index') !!}">
                            <i class="icofont-network fs-5"></i>
                            <span>Network</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/homepagebanner*') ? ' active' : '' }}">
                        <a class="ms-link{{ Request::routeIs('homepagebanner.index') ? ' active' : '' }}"
                            href="{!! route('homepagebanner.index') !!}">
                            <i class="icofont-network fs-5"></i>
                            <span>Banner</span>
                        </a>
                    </li>
                </ul>
            </li>
           <li
                class="collapsed{{ Request::is('admin/product*') || Request::is('admin/subproduct*') || Request::is('admin/industrysolution*')  || Request::is('admin/category*')  || Request::is('admin/subcategory*') ? ' active' : '' }}">
                <a class="m-link{{ Request::is('admin/product*') || Request::is('admin/subproduct*') || Request::is('admin/industrysolution*')  || Request::is('admin/category*') || Request::is('admin/subcategory*') ? ' active' : '' }}"
                    data-bs-toggle="collapse" data-bs-target="#menu-product" href="#">
                    <i class="icofont-tools fs-5"></i>
                    <span>Product</span>
                    <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span>
                </a>
                <ul class="sub-menu collapse{{ Request::is('admin/product*') || Request::is('admin/subproduct*') || Request::is('admin/industrysolution*') || Request::is('admin/category*') || Request::is('admin/subcategory*') ? ' show' : '' }}"
                    id="menu-product">
                    <li class="{{ Request::is('admin/industrysolution*') || Request::is('admin/product*') || Request::is('admin/category*') || Request::is('admin/subcategory*') ? ' active' : '' }}">
                        <a class="ms-link{{ Request::routeIs('industrysolution.index') ? ' active' : '' }}"
                            href="{!! route('industrysolution.index') !!}">
                            <i class="icofont-briefcase fs-5"></i>
                            <span>Industry Solution</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/category*') ? ' active' : '' }}">
                        <a class="ms-link{{ Request::routeIs('category.index') ? ' active' : '' }}"
                            href="{!! route('category.index') !!}">
                            <i class="icofont-listing-box  fs-5"></i>
                            <span>Category</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/subcategory*') ? ' active' : '' }}">
                        <a class="ms-link{{ Request::routeIs('subcategory.index') ? ' active' : '' }}"
                            href="{!! route('subcategory.index') !!}">
                            <i class="icofont-listing-number fs-5"></i>
                            <span>Sub Category</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/product*') ? ' active' : '' }}">
                        <a class="ms-link{{ Request::routeIs('product.index') ? ' active' : '' }}"
                            href="{!! route('product.index') !!}">
                            <i class="icofont-box fs-5"></i>
                            <span>Product</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/subproduct*') ? ' active' : '' }}">
                        <a class="ms-link{{ Request::routeIs('subproduct.index') ? ' active' : '' }}"
                            href="{!! route('subproduct.index') !!}">
                            <i class="icofont-box fs-5"></i>
                            <span>Sub Product</span>
                        </a>
                    </li>
                    </ul>
                    </li>

            <li>
                <a class="m-link {{ Request::is('admin/industry*') && !Request::is('admin/product*') && !Request::is('admin/industrysolution*') ? 'active' : '' }}"
                    href="{!! route('industry.index') !!}">
                    <i class="icofont-building fs-5"></i>
                    <span>Industries</span>
                </a>
            </li>
            <li>
                <a class="m-link {{ Request::is('admin/industryproduct*') && !Request::is('admin/industryproduct*') && !Request::is('admin/industryproduct*') ? 'active' : '' }}"
                    href="{!! route('industryproduct.index') !!}">
                    <i class="icofont-building fs-5"></i>
                    <span>Industry Products</span>
                </a>
            </li>
            <li>
                <a class="m-link {{ Request::is('admin/certificate*') && !Request::is('admin/certificate*') && !Request::is('admin/industrysolution*') ? 'active' : '' }}"
                    href="{!! route('certificate.index') !!}">
                    <i class="icofont-building fs-5"></i>
                    <span>Certificate</span>
                </a>
            </li>
            <li>
                <a class="m-link {{ Request::is('admin/milestone*') ? 'active' : '' }}" href="{!! route('milestone.index') !!}">
                    <i class="icofont-wall-clock fs-5"></i>
                    <span>Milestone</span>
                </a>
            </li>
            <li>
                <a class="m-link {{ Request::is('admin/agencies*') ? 'active' : '' }}" href="{!! route('agencies.index') !!}">
                    <i class="icofont-globe fs-5"></i>
                    <span>Our Agencies</span>
                </a>
            </li>
            <li>
                <a class="m-link {{ request()->routeIs('homeslider.*') ? 'active' : '' }}" href="{!! route('homeslider.index') !!}">
                    <i class="icofont-globe fs-5"></i>
                    <span>HomeSlider</span>
                </a>
            </li>
                        <li>
                <a class="m-link {{ request()->routeIs('agencyslider.*') ? 'active' : '' }}" href="{!! route('agencyslider.index') !!}">
                    <i class="icofont-globe fs-5"></i>
                    <span>Agency Slider</span>
                </a>
            </li>
            <li class="collapsed{{ Request::is('admin/resource*') || Request::is('admin/event*') || Request::is('admin/imageslider*') || Request::is('admin/video*') || Request::is('admin/faq*') || Request::is('admin/catalog*') ? ' active' : '' }}">
                <a class="m-link{{ Request::is('admin/resource*') || Request::is('admin/event*') || Request::is('admin/imageslider*') || Request::is('admin/video*') || Request::is('admin/faq*') || Request::is('admin/catalog*') ? ' active' : '' }}"
                    data-bs-toggle="collapse" data-bs-target="#menu-resource" href="#">
                    <i class="icofont-document-folder fs-5"></i>
                    <span>Resource</span>
                    <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span>
                </a>
                <ul class="sub-menu collapse{{ Request::is('admin/resource*') || Request::is('admin/event*') || Request::is('admin/imageslider*') || Request::is('admin/video*') || Request::is('admin/faq*') || Request::is('admin/catalog*') ? ' show' : '' }}"
                    id="menu-resource">
                    <li class="{{ Request::is('admin/event*') ? ' active' : '' }}">
                        <a class="ms-link{{ Request::routeIs('event.index') ? ' active' : '' }}"
                            href="{!! route('event.index') !!}">
                            <i class="icofont-calendar fs-5"></i>
                            <span>Event</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/imageslider*') ? ' active' : '' }}">
                        <a class="ms-link{{ Request::routeIs('imageslider.index') ? ' active' : '' }}"
                            href="{!! route('imageslider.index') !!}">
                            <i class="icofont-camera fs-5"></i>
                            <span>Gallery</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/video*') ? ' active' : '' }}">
                        <a class="ms-link{{ Request::routeIs('video.index') ? ' active' : '' }}"
                            href="{!! route('video.index') !!}">
                            <i class="icofont-video fs-5"></i>
                            <span>Video</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/faq*') ? ' active' : '' }}">
                        <a class="ms-link {{ Request::is('admin/faq*') ? 'active' : '' }}" 
                            href="{!! route('faq.index') !!}">
                            <i class="icofont-question-circle fs-5"></i>
                            <span>Faq</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/catalog*') ? ' active' : '' }}">
                        <a class="ms-link {{ Request::is('admin/catalog*') ? 'active' : '' }}" 
                            href="{!! route('catalog.index') !!}">
                            <i class="icofont-file-pdf fs-5"></i>
                            <span>Catalogue</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a class="m-link {{ Request::is('admin/news*') ? 'active' : '' }}" href="{!! route('news.index') !!}">
                    <i class="icofont-newspaper fs-5"></i>
                    <span>News</span>
                </a>
            </li>
            
            <li>
                <a class="m-link {{ Request::is('admin/blog*') ? 'active' : '' }}" href="{!! route('blog.index') !!}">
                    <i class="icofont-newspaper fs-5"></i>
                    <span>Blogs</span>
                </a>
            </li>
          
            <li class="collapsed {{ Request::is('admin/jobcategory*') || Request::is('admin/job*') ? ' active' : '' }}">
                    <a class="m-link {{ Request::is('admin/jobcategory*') || Request::is('admin/job*') ? ' active' : '' }}"
                        data-bs-toggle="collapse" data-bs-target="#menu-job" href="#">
                        <i class="icofont-briefcase fs-5"></i>
                        <span>Job</span>
                        <span class="arrow icofont-rounded-down ms-auto text-end fs-5"></span>
                    </a>
                    <ul class="sub-menu collapse {{ Request::is('admin/jobcategory*') || Request::is('admin/job*') ? ' show' : '' }}" id="menu-job">
                        <li class="{{ Request::is('admin/jobcategory*') ? 'active' : '' }}">
                            <a class="ms-link {{ Request::routeIs('jobcategory.index') ? 'active' : '' }}" href="{!! route('jobcategory.index') !!}">
                                <i class="icofont-tags fs-5"></i>
                                <span>Job Category</span>
                            </a>
                        </li>
                        <li class="{{ Request::is('admin/job*') && !Request::is('admin/jobcategory*') ? 'active' : '' }}">
                            <a class="ms-link {{ Request::routeIs('job.index') ? 'active' : '' }}" href="{!! route('job.index') !!}">
                                <i class="icofont-business-man fs-5"></i>
                                <span>Job</span>
                            </a>
                        </li>
                    </ul>
                </li>
           
        </ul>

        <!-- Menu: menu collepce btn -->
        <button type="button" class="btn btn-link sidebar-mini-btn text-light">
            <span class="ms-2"><i class="icofont-bubble-right"></i></span>
        </button>
    </div>
</div>