


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
@endphp

@include('layouts.frontheader', ['og_image' => $ogImage])
<section class="news_details_header_main">
    <div class="container-fluid px-lg-0">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <div class="col"></div>
            <div class="col-12 col-lg-5 mt-5 me-30">
                <div class="">
                    <h6 class="main_routing_home">
                        <a href="{{ url('/') }}">HOME > </a>
                        <a href="{{ route('subcategorylist', $currentCategory->url) }}">{{ $currentCategory->name }}
                            ></a>
                        <a href="{{ route('productlist', [$currentCategory->url, $currentSubcategory->url]) }}">{{
                            $currentSubcategory->name }} ></a>
                        <!--<span class="routing_home_news"> {{ $currentSubcategory->name }} ></span>-->
                        <!--<span class="routing_home_news"> {{ $currentProduct->title }}</span>-->
                    </h6>
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
                @endphp

                @if($images && is_array($images))
                <div class="slider-for mb-0">
                    @foreach($images as $image)
                    <div>
                        <img src="{{ asset(($isSubProduct ? 'public/subproduct_detail_files/' : 'public/product_detail_files/') . $image) }}"
                            class="img-fluid product-slid-img" alt="Product Image">


                        <!--<img src="{{ asset('public/product_detail_files/' . $image) }}" class="img-fluid product-slid-img" alt="Product Image">-->
                    </div>
                    @endforeach
                </div>

                <div class="slider-nav d-none">
                    @foreach($images as $image)
                    <div>
                        <!--<img src="{{ asset('public/product_detail_files/' . $image) }}" class="img-fluid" alt="Product Thumbnail">-->
                        <img src="{{ asset(($isSubProduct ? 'public/subproduct_detail_files/' : 'public/product_detail_files/') . $image) }}"
                            class="img-fluid" alt="Product Thumbnail">

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
                    Enquiry Now
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                        <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="white" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
                        @if(!empty($currentProduct->pdf))
                        <a class="btn btn--ripple open-enquiry ms-md-3" id="ripple"
                            href="{{ asset('public/product_pdf/' . $currentProduct->pdf) }}" target="_blank">
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
<div class="modal productmodal formmodal fade" id="exampleModalform" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered   modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title main_head_small" id="exampleModalLabel">Product Enquiry </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                                <div class="g-recaptcha" data-sitekey="6LcrR-grAAAAAJQi2hs3EmXwPw0f6AtPiAhDHUh9"
                                    data-callback="verifyCaptcha"></div>
                                <small id="recaptcha-error" style="color: red; display: none;"></small>
                            </div>
                            <button type="submit" class="btn btn--ripple col-md-5" id="ripple">Submit <svg
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
            return grecaptcha.getResponse() !== "";
        }, "Please verify that you are not a robot.");

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
                const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

                if (!emailPattern.test(email)) {
                    $('#email-error').html('Please enter a valid email address.').show();
                    return false;
                }
                if (!emailDomain || emailDomain.indexOf('.') === -1) {
                    $('#email-error').html('Please enter a valid email address with a proper domain.').show();
                    return false;
                }
                const domainParts = emailDomain.split('.');
                if (domainParts.length < 2 || domainParts[domainParts.length - 1].length < 2) {
                    $('#email-error').html('Please enter a valid email address with a proper domain.').show();
                    return false;
                }
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
                if (grecaptcha.getResponse() === "") {
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


@include('layouts.frontfooter')