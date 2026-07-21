


@php
$isSubProduct = isset($type) && $type === 'subproduct';

$currentProduct = $isSubProduct ? $subproduct : $product;
$currentCategory = $isSubProduct ? $category : $product->category;
$currentSubcategory = $isSubProduct ? $subcategory : $product->subcategory;
@endphp
@php
    $images = is_string($productImages) ? json_decode($productImages, true) : $productImages;
    $firstImage = (is_array($images) && count($images) > 0) ? $images[0] : null;

    if ($firstImage) {
        $folder = $isSubProduct ? 'public/subproduct_detail_files/' : 'public/product_detail_files/';
        $ogImage = url($folder . $firstImage);
    } else {
        $ogImage = url('front/images/headerbanner/ourculture_hed_img.png'); // fallback image
    }

    $productSchema = [
        '@context' => 'https://schema.org',
        '@type' => 'Product',
        'name' => $currentProduct->top_title,
        'image' => asset('public/product_front_image/' . $currentProduct->front_image),
        'description' => strip_tags($meta_description),
    ];

    $breadcrumSchema = [
        '@context' => 'https://schema.org/',
        '@type' => 'BreadcrumbList',
        'itemListElement' => [
            [
                '@type' => 'ListItem',
                'position' => 1,
                'name' => $currentCategory->name ?? '',
                'item' => $currentCategory->url ? route('subcategorylist', $currentCategory->url) : '',
            ],
            [
                '@type' => 'ListItem',
                'position' => 2,
                'name' => $currentSubcategory->name ?? '',
                'item' => $currentCategory->url != '' && $currentSubcategory->url != '' ? route('productlist', [$currentCategory->url, $currentSubcategory->url]) : '',
            ],
        ]
    ];

@endphp

@include('layouts.frontheader', ['og_image' => $ogImage])
<section class="news_details_header_main">
    <div class="container-fluid px-lg-0">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <div class="col"></div>
            <div class="col-12 col-lg-5 mt-5 me-30">
                <div class="">
                    <p class="main_routing_home">
                        <a href="{{ url('/') }}">HOME > </a>
                        <a href="{{ route('subcategorylist', $currentCategory->url) }}">{{ $currentCategory->name }}
                            ></a>
                        <a href="{{ route('productlist', [$currentCategory->url, $currentSubcategory->url]) }}">{{
                            $currentSubcategory->name }} ></a>
                        <!--<span class="routing_home_news"> {{ $currentSubcategory->name }} ></span>-->
                        <!--<span class="routing_home_news"> {{ $currentProduct->title }}</span>-->
                    </p>
                    <h1 class="main_head">{{ $currentProduct->top_title }}</h1>
                    <!--<h2 class="main_head_small">Highly Durable Products</h2>-->
                    <!--<h2 class="main_head_small">{{ $currentProduct->sub_title }}</h2>-->

                    {!! $currentProduct->description !!}


                </div>
            </div>
            <div class="col-12 col-lg-6 d-flex justify-content-end">
                <img src="{{ asset('public/front/images/headerbanner/brass_hed_img.png') }}" class="img-fluid"
                    alt="Header Image">
            </div>
        </div>
    </div>
</section>

<section class="section_space product-slider">
    <div class="container">
        <div class="row gx-3">
            <div class="col-md-4">
                @php
                $images = is_string($productImages) ? json_decode($productImages, true) : $productImages;
                $detailImagesAlt = is_string($currentProduct->detail_images_alt) ? json_decode($currentProduct->detail_images_alt, true) : $currentProduct->detail_images_alt;
                $detailImagesAlt = is_array($detailImagesAlt) ? $detailImagesAlt : [];
                @endphp

                @if($images && is_array($images))
                <div class="slider-for mb-0">
                    @foreach($images as $key => $image)
                    @php $imageAlt = $detailImagesAlt[basename($image)] ?? $currentProduct->top_title; @endphp
                    <div>
                        <img src="{{ asset(($isSubProduct ? 'public/subproduct_detail_files/' : 'public/product_detail_files/') . $image) }}"
                            class="img-fluid product-slid-img" alt="{{ $imageAlt }}">


                        <!--<img src="{{ asset('public/product_detail_files/' . $image) }}" class="img-fluid product-slid-img" alt="Product Image">-->
                    </div>
                    @endforeach
                </div>

                <div class="slider-nav d-none">
                    @foreach($images as $image)
                    @php $imageAlt = $detailImagesAlt[basename($image)] ?? $currentProduct->top_title; @endphp
                    <div>
                        <!--<img src="{{ asset('public/product_detail_files/' . $image) }}" class="img-fluid" alt="Product Thumbnail">-->
                        <img src="{{ asset(($isSubProduct ? 'public/subproduct_detail_files/' : 'public/product_detail_files/') . $image) }}"
                            class="img-fluid" alt="{{ $imageAlt }}">

                    </div>
                    @endforeach
                </div>
                @endif
            </div>

            <div class="col-md-8 mt-4 mt-md-0">
                {!! $isSubProduct ? $subproduct->product_description : $product->product_description !!}

                <a class="btn btn--ripple open-enquiry" data-bs-toggle="modal" data-bs-target="#exampleModalform"
                    data-product="{{ $product->title }}" data-category="{{ $product->category->name ?? '' }}"
                    data-subcategory="{{ $product->subcategory->name ?? '' }}">
                    Request Quote
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                        <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="white" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
                        @if(!empty($currentProduct->pdf))
                        <a class="btn btn--ripple open-datasheet ms-md-3" id="ripple" href="javascript:void(0)"
                            data-bs-toggle="modal" data-bs-target="#datasheetModal"
                            data-product-id="{{ $currentProduct->id }}"
                            data-pdf-name="{{ $currentProduct->pdf }}"
                            data-product="{{ $currentProduct->title }}"
                            data-category="{{ $currentCategory->name ?? '' }}"
                            data-subcategory="{{ $currentSubcategory->name ?? '' }}">
                            Download Datasheet
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="white"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                        @endif
            </div>
        </div>
    </div>
</section>

@php
$industryFolder = $isSubProduct ? 'subproduct_industry_image' : 'product_industry_image';
@endphp

@php
$industrydata = $industrydata ?? collect();
@endphp

@if($industrydata->isNotEmpty())
<section class="section_space position-relative mb-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="main_head main_head_line">Shaping Industrial Excellence</h2>
            </div>
            <div class="col-md-12">
                <p>At the core of every industrial breakthrough lies reliability. From heavy-duty fabrication to
                    high-precision applications, our engineering-grade products support operations where safety,
                    efficiency, and uptime are non-negotiable. We supply more than components, we reinforce quality that
                    endures.</p>
            </div>
        </div>

        <div class="industrial_show pt-0">
            <div class="product_slider mt-5">
                @foreach($industrydata as $industry)
                   <div class="oil_industri mx-lg-3">
                        <div class="text-center mb-4">
                            <img src="{{ asset('public/product_industry_image/' . $industry->image) }}"
                                alt="{{ pathinfo($industry->image, PATHINFO_FILENAME) }}" class="img-fluid">
                        </div>
                        <div class="oil_industri_content">
                            <h3>{{ $industry->title }}</h3>
                            {!! $industry->short_description !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif
<section class="catalog_wrapper ">
    <div class="container">
        <div class=" cta-block-inner ">
            <div class="cta-heading">
                <h2 class="catalog_title">
                    Excellence Across Every Product Line
                </h2>
                <div class="cta-top-line"></div>
                <div class="cta-left-line"></div>
            </div>
            <div class="cta-border-line-top"></div>
            <div class="cta-border-line-bottom"></div>
            <div class="cta-block-p">
                <p>
                    Our wide-ranging products are crafted with meticulous attention to detail and rigorous quality
                    control, ensuring excellence from raw materials to finished components. Built to perform in
                    demanding environments, they deliver strength, precision, and reliability to support your critical
                    applications.
                    Explore our entire product lineup and find the perfect fit for your requirements.
                </p>
            </div>
            <div class="cta-talk-to-us-wrapper">
                <div class="cta-talk-to-us-arrow-wrapper">
                    <div class="talk-to-us-arrow-line">

                    </div>
                    <!--<div class="main-link-group">-->
                    <!--    @if(!empty($currentProduct->pdf))-->
                    <!--    <a class="btn btn--ripple" id="ripple"-->
                    <!--        href="{{ asset('public/product_pdf/' . $currentProduct->pdf) }}" target="_blank">-->
                    <!--        Download Our Catalogue-->
                    <!--        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"-->
                    <!--            fill="none">-->
                    <!--            <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="white"-->
                    <!--                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />-->
                    <!--        </svg>-->
                    <!--    </a>-->
                    <!--    @endif-->
                    <!--</div>-->
                </div>
            </div>
        </div>
    </div>
    <div class="dark-circle"></div>
</section>
@include('front.partials.module-faq-display', [
    'faqs' => $currentProduct->faqs ?? collect(),
    'faqId' => $isSubProduct ? 'subproductFaq' : 'productDetailFaq'
])
<div class="modal productmodal formmodal fade" id="exampleModalform" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered   modal-md">
        <div class="modal-content">
            <div class="modal-header d-block">
                <div class="d-flex justify-content-between">
                <p class="modal-title main_head_small" id="exampleModalLabel">Product Enquiry </p>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <p class="mt-2 fs-6">Get Quote Response Within 24 Hours</p>
            </div>
            <div class="modal-body">
                <div class="row     justify-content-center">
                    <form class=" contact_input col-md-11" id="brassform" method="Post"
                        action="{{ route('product.enquiry.store') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- First Name and Last Name in a single row -->
                        <div class="row mb-4 gap-4">
                            <div class="col-md-12">
                                <label for="first-name" class="form-label"><b>Full Name *:</b></label>
                                <input type="text" class="form-control px-0" id="firstname" name="firstname"
                                    minlength="3" maxlength="50"
                                    oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/\s+/g, ' ').trimStart();"
                                    placeholder="Enter your Full Name">
                                <div id="firstname-error" style="color: red; display: none;"></div>
                            </div>
                            <!-- Readonly Category Name -->
                            <div class="col-md-12">
                                <label for="category_name" class="form-label"><b>Category Name *:</b></label>
                                <input type="text" class="form-control px-0" id="category_name" name="category_name" readonly placeholder="Category Name">
                            </div>
                            <!-- Subcategory Name (readonly) -->
                            <div class="col-md-12">
                                <label for="subcategory_name" class="form-label"><b>Subcategory Name *:</b></label>
                                <input type="text" class="form-control px-0" id="subcategory_name" name="subcategory_name" readonly placeholder="Subcategory Name">
                            </div>
                            <!-- Readonly Product Name -->
                            <div class="col-md-12">
                                <label for="product_name" class="form-label"><b>Product Name *:</b></label>
                                <input type="text" class="form-control px-0" id="product_name" name="product_name" readonly placeholder="Product Name">
                            </div>
                            <input type="hidden" name="product_title" id="modal_product_title">
                            <input type="hidden" name="product_category" id="modal_product_category">
                            <input type="hidden" name="product_subcategory" id="modal_product_subcategory">
                            <div class="col-md-12 ">
                                <label for="email" class="form-label"><b>Email ID *:</b></label>
                                <input type="email" class="form-control px-0" id="email" name="email" minlength="1"
                                    maxlength="50" placeholder="Enter your email">
                                <div id="email-error" style="color: red; display: none;"></div>
                            </div>
                            <div class="col-md-12">
                                <label for="phone" class="form-label"><b>Phone Number *:</b></label>
                                <input type="text" class="form-control px-0" id="phone" name="phone" maxlength="15"
                                    minlength="10"
                                    oninput="this.value = this.value.replace(/[^0-9+]/g, '').replace(/(?!^)\+/g, '').slice(0, 15);"
                                    placeholder="Enter your Phone Number" pattern="\d{10,15}"
                                    title="Phone number should be between 10 to 15 digits">
                                <div id="phone-error" style="color: red; display: none;"></div>
                            </div>
                            <div class="col-md-12">
                                <label for="message" class="form-label"><b>Message :</b></label>
                                <input type="text" class="form-control px-0" id="message" name="message" placeholder="Enter message here">
                            </div>
                           <div class="form-group">
                                <div id="brassform-recaptcha"></div>
                                <small id="recaptcha-error" style="color: red; display: none;"></small>
                            </div>
                            <button type="submit" class="btn btn--ripple col-md-5" id="ripple">Enquiry Now <svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="white"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg></button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
        </div>
    </div>
</div>
<div class="modal productmodal formmodal fade" id="datasheetModal" tabindex="-1" aria-labelledby="datasheetModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <div>
                    <h5 class="modal-title main_head_small" id="datasheetModalLabel">Request Datasheet</h5>
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <form class="contact_input col-md-11" id="datasheetform" method="post"
                        action="{{ route('datasheet.submit') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="product_id" id="datasheet-product-id" value="{{ $currentProduct->id }}">
                        <input type="hidden" name="pdf_name" id="datasheet-pdf-name" value="{{ $currentProduct->pdf }}">
                        <input type="hidden" name="product_title" id="datasheet-product-title" value="{{ $currentProduct->title }}">
                        <input type="hidden" name="product_category" id="datasheet-product-category" value="{{ $currentCategory->name ?? '' }}">
                        <input type="hidden" name="product_subcategory" id="datasheet-product-subcategory" value="{{ $currentSubcategory->name ?? '' }}">
                        <div class="row mb-4 gap-4">
                            <div class="col-md-12">
                                <label for="datasheet-fullname" class="form-label"><b>Full Name *:</b></label>
                                <input type="text" class="form-control px-0" id="datasheet-fullname" name="fullname"
                                    maxlength="70"
                                    oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/\s+/g, ' ').trimStart();"
                                    placeholder="Enter your full name">
                            </div>
                            <div class="col-md-12">
                                <label for="datasheet-company-name" class="form-label"><b>Company Name *:</b></label>
                                <input type="text" class="form-control px-0" id="datasheet-company-name"
                                    name="company_name" maxlength="60" placeholder="Enter your company name"
                                    oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/\s+/g, ' ').trimStart();">
                            </div>
                            <div class="col-md-12">
                                <label for="datasheet-phone" class="form-label"><b>Contact Number *:</b></label>
                                <input type="text" class="form-control px-0" id="datasheet-phone" name="phone"
                                    maxlength="15" minlength="10"
                                    oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 15);"
                                    placeholder="Enter your contact number">
                            </div>
                            <div class="col-md-12">
                                <label for="datasheet-email" class="form-label"><b>Email Address *</b></label>
                                <input type="email" class="form-control px-0" id="datasheet-email" name="email"
                                    maxlength="60" placeholder="Enter your email">
                            </div>
                            <div class="col-md-12">
                                <label for="datasheet-message" class="form-label"><b>Message *</b></label>
                                <input type="text" id="datasheet-message" name="message" class="form-control px-0"
                                    placeholder="Enter your message">
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn--ripple" id="datasheet-submit-btn">Submit <svg
                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="white"
                                        stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="application/ld+json">
    {!! json_encode($productSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
<script type="application/ld+json">
    {!! json_encode($breadcrumSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function verifyCaptcha() {
        $('#recaptcha-error').hide();
    }

    $(document).ready(function () {
        $('.open-enquiry').on('click', function () {
            const title = $(this).data('product');
            $('#enquiry-product-name').val(title);
        });

        $(document).on('shown.bs.modal', '.productmodal', function () {
            if (!$(this).data('slick-initialized')) {
                $(this).find('.slider-for').slick({
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    fade: true,
                    asNavFor: $(this).find('.slider-nav')
                });
                $(this).find('.slider-nav').slick({
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    asNavFor: $(this).find('.slider-for'),
                    arrows: false,
                    dots: true,
                    centerMode: false,
                    focusOnSelect: true
                });
                $(this).data('slick-initialized', true);
            }
        });

        $.validator.addMethod("recaptchaRequired", function (value, element, param) {
            return brassformWidgetId !== null && grecaptcha.getResponse(brassformWidgetId) !== "";
        }, "Please verify that you are not a robot.");

        $('#exampleModalform').on('hidden.bs.modal', function () {
            if (brassformWidgetId !== null) {
                grecaptcha.reset(brassformWidgetId);
            }
        });

        $("#brassform").validate({
            rules: {
                firstname: { required: true },
                email: { required: true, email: true },
                phone: { required: true, digits: true, minlength: 10, maxlength: 15 },
                "g-recaptcha-response": { recaptchaRequired: true }
            },
            messages: {
                firstname: { required: "Please enter your full name." },
                email: { required: "Please enter your email address.", email: "Please enter a valid email address." },
                phone: { required: "Please enter your phone number.", digits: "Please enter only digits.", minlength: "Phone number must be 10 to 15 digits.", maxlength: "Your phone number cannot exceed 15 digits." },
            },
            errorPlacement: function (error, element) {
                if (element.attr("name") == "g-recaptcha-response") {
                    error.appendTo("#recaptcha-error");
                } else {
                    error.appendTo(element.parent());
                }
            },
            submitHandler: function (form) {
                $('#email-error').empty().hide();
                $('#recaptcha-error').empty().hide();

                const email = $('[name="email"]').val();
                const emailDomain = email.split('@')[1];
                // const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

                // if (!emailPattern.test(email)) {
                //     $('#email-error').html('Please enter a valid email address.').show();
                //     return false;
                // }
                // if (!emailDomain || emailDomain.indexOf('.') === -1) {
                //     $('#email-error').html('Please enter a valid email address with a proper domain.').show();
                //     return false;
                // }
                // const domainParts = emailDomain.split('.');
                // if (domainParts.length < 2 || domainParts[domainParts.length - 1].length < 2) {
                //     $('#email-error').html('Please enter a valid email address with a proper domain.').show();
                //     return false;
                // }
                const fakeDomains = [
                    'mailinator.com', '10minutemail.com', 'guerrillamail.com', 'tempmail.com',
                    'temp-mail.org', 'throwawaymail.com', 'maildrop.cc', 'dispostable.com',
                    'getairmail.com', 'moakt.com', 'spamgourmet.com', 'yopmail.com',
                    'sharklasers.com', 'mailnesia.com', 'fakemail.net', 'emailondeck.com',
                    'trashmail.com', 'mintemail.com', 'mytemp.email', 'tempmail.com',
                ];
                if (fakeDomains.includes(emailDomain)) {
                    $('#email-error').html('Please provide a valid email address.').show();
                    return false;
                }
              if (grecaptcha.getResponse(brassformWidgetId) === "") {
                    $('#recaptcha-error').html("Please verify that you are not a robot.").show();
                    return false;
                } else {
                    $('#recaptcha-error').hide();
                }
                let $submitBtn = $('#brassform button[type="submit"]');
                $submitBtn.prop('disabled', true).html('Submitting...');
                form.submit();
            }
        });
    });
</script>

<style>
    .error {
        color: red;
        font-size: 14px;

    }
</style>
<script>
    $(document).ready(function () {
        $('.slider-for').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            autoplay: true,
            autoplaySpeed: 3000,
            asNavFor: '.slider-nav'
        });

        $('.slider-nav').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            asNavFor: '.slider-for',
            arrows: false,
            dots: false,
            centerMode: false,
            focusOnSelect: true
        });
    });
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const enquiryModal = document.getElementById('exampleModalform');

        enquiryModal.addEventListener('show.bs.modal', function (event) {
            const button = event.relatedTarget;
            const productTitle = button.getAttribute('data-product');
            const category = button.getAttribute('data-category');
            const subcategory = button.getAttribute('data-subcategory');

            document.getElementById('modal_product_title').value = productTitle || '';
            document.getElementById('modal_product_category').value = category || '';
            document.getElementById('modal_product_subcategory').value = subcategory || '';
        });
    });
</script>
<script>
  $('.open-enquiry').on('click', function () {
    const product = $(this).data('product');
    const category = $(this).data('category');
    const subcategory = $(this).data('subcategory');

    // Set readonly visible inputs
    $('#product_name').val(product);
    $('#category_name').val(category);
    $('#subcategory_name').val(subcategory);

    // Set hidden inputs for backend
    $('#modal_product_title').val(product);
    $('#modal_product_category').val(category);
    $('#modal_product_subcategory').val(subcategory);
});
</script>
<script>
$(document).ready(function () {
    const fakeDomains = [
        'mailinator.com', '10minutemail.com', 'guerrillamail.com', 'tempmail.com',
        'temp-mail.org', 'throwawaymail.com', 'maildrop.cc', 'dispostable.com',
        'getairmail.com', 'moakt.com', 'spamgourmet.com', 'yopmail.com',
        'sharklasers.com', 'mailnesia.com', 'fakemail.net', 'emailondeck.com',
        'trashmail.com', 'mintemail.com', 'mytemp.email'
    ];

    function showDatasheetError(el, msg) {
        el.addClass('is-invalid');
        el.next('.text-danger').remove();
        el.after(`<div class="text-danger mt-1">${msg}</div>`);
    }

    function clearDatasheetErrors() {
        $('#datasheetform .text-danger').remove();
        $('#datasheetform .is-invalid').removeClass('is-invalid');
    }

    $('.open-datasheet').on('click', function () {
        $('#datasheet-product-id').val($(this).data('product-id') || '');
        $('#datasheet-pdf-name').val($(this).data('pdf-name') || '');
        $('#datasheet-product-title').val($(this).data('product') || '');
        $('#datasheet-product-category').val($(this).data('category') || '');
        $('#datasheet-product-subcategory').val($(this).data('subcategory') || '');
    });

    $('#datasheetform').on('submit', function (e) {
        e.preventDefault();
        clearDatasheetErrors();

        let isValid = true;
        const fullname = $('#datasheet-fullname').val().trim();
        const company = $('#datasheet-company-name').val().trim();
        const phone = $('#datasheet-phone').val().trim();
        const email = $('#datasheet-email').val().trim();
        const message = $('#datasheet-message').val().trim();
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const emailDomain = email.split('@')[1]?.toLowerCase();

        if (!fullname) {
            showDatasheetError($('#datasheet-fullname'), 'Full name is required.');
            isValid = false;
        }
        if (!company) {
            showDatasheetError($('#datasheet-company-name'), 'Company name is required.');
            isValid = false;
        }
        if (!phone) {
            showDatasheetError($('#datasheet-phone'), 'Contact number is required.');
            isValid = false;
        } else if (phone.length < 10 || phone.length > 15) {
            showDatasheetError($('#datasheet-phone'), 'Contact number must be between 10 and 15 digits.');
            isValid = false;
        }
        if (!email) {
            showDatasheetError($('#datasheet-email'), 'Email is required.');
            isValid = false;
        } else if (!emailPattern.test(email)) {
            showDatasheetError($('#datasheet-email'), 'Please enter a valid email address.');
            isValid = false;
        } else if (fakeDomains.includes(emailDomain)) {
            showDatasheetError($('#datasheet-email'), 'Invalid email addresses are not allowed.');
            isValid = false;
        }
        if (!message) {
            showDatasheetError($('#datasheet-message'), 'Message is required.');
            isValid = false;
        }

        if (!isValid) return;

        const submitBtn = $('#datasheet-submit-btn');
        submitBtn.prop('disabled', true).html('Submitting...');
        this.submit();
    });
});
</script>


@include('layouts.frontfooter')
