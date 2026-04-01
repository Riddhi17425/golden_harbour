@include('layouts.frontheader')
<section class="news_details_header_main">
    <div class="container-fluid px-lg-0">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <div class="col"></div>
                
                @php
                    $subproduct = $subproducts->first();
                    $product =  $subproduct->product ?? $product ?? null;
                    $category = $subproduct->category ?? $category ?? null;
                    $subcategory = $subproduct->subcategory ?? $subcategory ?? null;
                
                @endphp

                <div class="col-12 col-lg-5 mt-5 me-30">
                    <div>
                        <h6 class="main_routing_home">
                            <a href="{{ url('/') }}">HOME ></a>
                
                            @if($category)
                                <a href="{{ route('subcategorylist', $category->url) }}">
                                    {{ $category->name }} >
                                </a>
                            @else
                                <span>NO CATEGORY ></span>
                            @endif
                
                            @if($category && $subcategory)
                                <a href="{{ route('productlist', [$category->url, $subcategory->url]) }}">
                                    {{ $subcategory->name }} >
                                </a>
                            @else
                                <span>NO SUBCATEGORY ></span>
                            @endif
                            
                            @if($product && $subcategory && $category)
                                <a href="{{ route('subproductlist', [$category->url, $subcategory->url, $product->url]) }}">
                                    {{ $product->title }} >
                                </a>
                            @else
                                <span>NO SUBCATEGORY ></span>
                            @endif
                
                        </h6>
                
                        <h1 class="main_head">
                            {{ $product->title ?? 'No Top Title' }}
                        </h1>
                
                        <!--<h2 class="main_head_small">-->
                        <!--    {{ $subcategory->title ?? 'No Title' }}-->
                        <!--</h2>-->
                
                        <p class="card-text">
                            {!! $product->short_description ?? 'No Description' !!}
                        </p>
                    </div>
                </div>

            <div class="col-12 col-lg-6 d-flex justify-content-end">
                <img src="{{ asset('public/front/images/headerbanner/brass_hed_img.png') }}" class="img-fluid" alt="brass hed img">
            </div>
        </div>
    </div>
</section>

<section class="section_space">
    <div class="container">
        <div class="row gy-4">
            @foreach($subproducts as $product)
                <div class="col-md-6 col-lg-4">
                    <div class="industrial_box product_box">
                        <a class="model-item-box" data-bs-toggle="modal" data-bs-target="#productModal{{ $product->id }}">
                            <div class="image-container">
                                <img src="{{ asset('public/subproduct_front_image/' .$product->front_image) }}" alt="{{  str_replace(['-', '_'],' ', pathinfo($product->front_image, PATHINFO_FILENAME)) }}" class="img-fluid">
                                <div class="overlay">
                                    <span>QUICK VIEW</span>
                                </div>
                            </div>
                        </a>
                        <h3>{{ $product->title }}</h3>
                        {!! $product->short_description !!}
                        
                                <a class="btn btn--ripple open-enquiry" data-bs-toggle="modal" data-bs-target="#exampleModalform" data-product="Instrumentation Tubes"  data-subproduct="{{ $subproduct->title ?? '' }}" data-category="{{ $category->name ?? '' }}" data-subcategory="{{ $subcategory->name ?? '' }}">
                                    Enquiry Now
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                                        <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </a>
                        
                            <a class="btn btn--ripple view-btn ms-md-2"
                               href="{{ route('subproductdetail', 
                               ['category' => $product->category->url, 
                               'subcategory' => $product->subcategory->url, 
                               'product' => $product->product->url,
                               'subproduct' => $product->url]) }}">
                                View Detail
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                                    <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="#172A42" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                    

                    </div>
                </div>

                <!-- Modal for each product -->
                <div class="modal productmodal fade" id="productModal{{ $product->id }}" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row product-slider">
                                    <div class="col-md-4">
                                        <div class="slider-for mb-5">
                                            @php $images = json_decode($product->detail_images, true); @endphp
                                            @if($images && is_array($images))
                                                @foreach($images as $image)
                                                    <div><img src="{{ asset('public/subproduct_detail_files/' . $image) }}" alt="product slider" class="img-fluid product-slid-img"></div>
                                                @endforeach
                                            @endif
                                        </div>
                                        <div class="slider-nav">
                                            @if($images && is_array($images))
                                                @foreach($images as $image)
                                                    <div><img src="{{ asset('public/subproduct_detail_files/' . $image) }}" alt="slider nav" class="img-fluid product-slid-img"></div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h2 class="main_head">{{ $product->datasheet_title }}</h2>
                                        {!! $product->datasheet_description !!}
                                        <a class="btn btn--ripple open-enquiry" data-bs-toggle="modal" data-bs-target="#exampleModalform" data-product="{{ $product->title }}" data-subproduct="{{ $subproduct->title ?? '' }}" data-category="{{ $product->category->name ?? '' }}" data-subcategory="{{ $subcategory->name ?? '' }}">Enquiry Now
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                                                <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<div class="modal productmodal formmodal fade" id="exampleModalform" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered   modal-md">
        <div class="modal-content">
            <div class="modal-header">
                 <h5 class="modal-title main_head_small" id="exampleModalLabel">Product Enquiry </h5> 
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row     justify-content-center">
                    <form class=" contact_input col-md-11" id="brassform" method="Post" action="{{ route('product.enquiry.store') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- First Name and Last Name in a single row -->
                        <div class="row mb-4 gap-4">
                            <div class="col-md-12">
                                <label for="first-name" class="form-label"><b>Full Name *:</b></label>
                                <input type="text" class="form-control px-0" id="firstname" name="firstname" minlength="3" maxlength="50"
                                    oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/\s+/g, ' ').trimStart();"
                                    placeholder="Enter your Full Name">
                                <div id="firstname-error" style="color: red; display: none;"></div>
                            </div>
                            <input type="hidden" name="product_title" id="modal_product_title">
                            <input type="hidden" name="subproduct_title" id="modal_subproduct_title">
                            <input type="hidden" name="product_category" id="modal_product_category">
                            <input type="hidden" name="product_subcategory" id="modal_product_subcategory">
                            <!-- Readonly Category Name -->
                            <div class="col-md-12">
                                <label for="category_name" class="form-label"><b>Category Name *:</b></label>
                                <input type="text" class="form-control" id="category_name" name="category_name" readonly placeholder="Category Name">
                            </div>
                            <!-- Subcategory Name (readonly) -->
                            <div class="col-md-12">
                                <label for="subcategory_name" class="form-label"><b>Subcategory Name *:</b></label>
                                <input type="text" class="form-control" id="subcategory_name" name="subcategory_name" readonly placeholder="Subcategory Name">
                            </div>
                            <!-- Readonly Product Name -->
                            <!--<div class="col-md-12">-->
                            <!--    <label for="product_name" class="form-label"><b>Product Name *:</b></label>-->
                            <!--    <input type="text" class="form-control" id="product_name" name="product_name" readonly placeholder="Product Name">-->
                            <!--</div>-->
                            <!-- Readonly SubProduct Name -->
                            <div class="col-md-12">
                                <label for="subproduct_name" class="form-label"><b>SubProduct Name *:</b></label>
                                <input type="text" class="form-control" id="subproduct_name" name="subproduct_name" readonly placeholder="Product Name">
                            </div>
                            <div class="col-md-12 ">
                                <label for="email" class="form-label"><b>Email ID *:</b></label>
                                <input type="email" class="form-control px-0" id="email"  name="email" minlength="1" maxlength="50"
                                placeholder="Enter your email">
                                <div id="email-error" style="color: red; display: none;"></div>
                            </div>
                            <div class="col-md-12">
                                <label for="phone" class="form-label"><b>Phone Number *:</b></label>
                                <input type="text" class="form-control px-0" id="phone" name="phone" maxlength="15"
                                    minlength="10" oninput="this.value = this.value.replace(/[^0-9+]/g, '').replace(/(?!^)\+/g, '').slice(0, 15);"
                                    placeholder="Enter your Phone Number" pattern="\d{10,15}"
                                    title="Phone number should be between 10 to 15 digits">
                                <div id="phone-error" style="color: red; display: none;"></div>
                            </div>
                            <div class="form-group">
                                <div class="g-recaptcha" data-sitekey="6LcrR-grAAAAAJQi2hs3EmXwPw0f6AtPiAhDHUh9" data-callback="verifyCaptcha"></div>
                                <small id="recaptcha-error" style="color: red; display: none;"></small>
                            </div>
                            <button type="submit" class="btn btn--ripple col-md-5" id="ripple">Submit <svg xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="white" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
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
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@include('layouts.frontfooter')
<script>
function verifyCaptcha() {
    $('#recaptcha-error').hide();
}

$(document).ready(function(){
    $('.open-enquiry').on('click', function(){
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

    $.validator.addMethod("recaptchaRequired", function(value, element, param) {
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
        errorPlacement: function(error, element) {
            if (element.attr("name") == "g-recaptcha-response") {
                error.appendTo("#recaptcha-error");
            } else {
                error.appendTo(element.parent());
            }
        },
        submitHandler: function(form) {
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
                'trashmail.com', 'mintemail.com', 'mytemp.email','tempmail.com',
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
$(document).ready(function(){
    // Assign product title to enquiry modal
    $('.open-enquiry').on('click', function(){
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
});
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        $('#exampleModalform').on('show.bs.modal', function (event) {
            const button = $(event.relatedTarget); // Use jQuery to get the button

            const productTitle = button.data('product') || '';
            const subproductTitle = button.data('subproduct') || '';
            const category = button.data('category') || '';
            const subcategory = button.data('subcategory') || '';

            $('#modal_product_title').val(productTitle);
            $('#modal_subproduct_title').val(subproductTitle);
            $('#modal_product_category').val(category);
            $('#modal_product_subcategory').val(subcategory);
        });
    });
</script>
<script>
  $('.open-enquiry').on('click', function () {
    const product = $(this).data('product');
    const subproduct = $(this).data('subproduct');
    const category = $(this).data('category');
    const subcategory = $(this).data('subcategory');

    console.log({ product, subproduct, category, subcategory });

    // Set visible readonly fields
    $('#product_name').val(product);
    $('#subproduct_name').val(subproduct);
    $('#category_name').val(category);
    $('#subcategory_name').val(subcategory);

    // Set hidden fields for backend
    $('#modal_product_title').val(product);
    $('#modal_subproduct_title').val(subproduct);
    $('#modal_product_category').val(category);
    $('#modal_product_subcategory').val(subcategory);

    // Open modal (optional if you’re using data-bs-toggle in HTML)
    $('#exampleModalform').modal('show');
});
</script>
