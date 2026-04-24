@include('layouts.frontheader')
<section class=" news_details_header_main">
    <div class=" container-fluid px-lg-0">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <div class="col"></div>
            <div class="col-12 col-lg-5 mt-5 me-30">
                <div class="">
                    <h6 class="main_routing_home">
                        <a href="{{url('/')}}">HOME ></a>
                        <span>Products ></span>
                        @if ($subcategory->isNotEmpty() && $subcategory->first()->category)
                        <span class="routing_home_news">{{ $subcategory->first()->category->name }}</span>
                        @endif
                    </h6>
                    <h1 class="main_head">{{$subcategory->first()->category->heading ?? ''}}</h1>
                    <!--<h2 class="main_head_small">{!! $subcategory->first()->category->subheading ?? '' !!}</h2>-->
                    @if ($subcategory->isNotEmpty())
                    <p class="card-text">{!! $subcategory->first()->category->short_description ?? '' !!}</p>
                    @endif
                    </p>
                </div>
            </div>
            <div class="col-12 col-lg-6 d-flex justify-content-end">
                <img src="{{asset('public/front/images/headerbanner/ourculture_hed_img.png')}}  " class="img-fluid"
                    alt="ourculture hed img">
            </div>
        </div>
    </div>
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
                                <input type="text" class="form-control px-0" id="category_name" name="category_name"
                                    readonly placeholder="Category Name">
                            </div>
                            <!-- Subcategory Name (readonly) -->
                            <div class="col-md-12">
                                <label for="subcategory_name" class="form-label"><b>Subcategory Name *:</b></label>
                                <input type="text" class="form-control px-0" id="subcategory_name"
                                    name="subcategory_name" readonly placeholder="Subcategory Name">
                            </div>
                            <!-- Readonly Product Name -->
                            <div class="col-md-12">
                                <label for="product_name" class="form-label"><b>Product Name *:</b></label>
                                <input type="text" class="form-control px-0" id="product_name" name="product_name"
                                    readonly placeholder="Product Name">
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
                                <input type="text" class="form-control px-0" id="message" name="message"
                                    placeholder="Enter message here">
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
        </div>
    </div>
</div>
<section class="section_space">
    <div class="container">
        <div class="row g-4">
            @foreach ($subcategory as $item)
            <div class="col-md-4">
                <div class="industrial_box product_box">
                    <img src="{{ asset('public/subcategory_image/' . $item->image) }}"
                        alt="{{  str_replace(['-', '_'],' ', pathinfo($item->image, PATHINFO_FILENAME)) }}"
                        class="w-100">
                    <h3 class="mt-4">{{ $item->name }}</h3>
                    {!! $item->description !!}
                    @php
                    $categoryName = strtolower($item->category->name ?? '');
                    $subcategoryName = strtolower($item->name ?? ''); // assuming $item is subcategory here

                    $isOtherProducts = $categoryName === 'other products';

                    $isWeldingElectricalHoses = $categoryName === 'welding, electrical and hoses';
                    $specialSubcategories = ['cables', 'ceramics backing strips', 'ceramics-backing-strips'];

                    $shouldShowButtons = $isOtherProducts || (
                    $isWeldingElectricalHoses && in_array($subcategoryName, $specialSubcategories)
                    );
                    @endphp

                    @if ($shouldShowButtons)
                                        <a class="btn btn--ripple open-enquiry"
               data-bs-toggle="modal"
               data-bs-target="#exampleModalform"
               data-product="{{ $item->products->first()->title ?? $item->name }}"
               data-category="{{ $item->category->name ?? '' }}"
               data-subcategory="{{ $item->name }}">
                Enquiry Now
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                    <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75"
                          stroke="white" stroke-width="1.5"
                          stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </a>
                    {{-- Show Enquiry Now and View Detail --}}
                    @foreach ($item->products as $product)
                    

                    <a class="btn btn--ripple view-btn ms-md-2" href="{{ route('productdetail', [
                        'category' => $product->category->url,
                        'subcategory' => $product->subcategory->url,
                        'product' => $product->url
                   ]) }}">
                        View Detail
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none">
                            <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="#172A42"
                                stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                    @endforeach

                    @elseif ($item->products->isNotEmpty())
                    {{-- Normal case: show "Read more" --}}
                    <a class="btn btn--ripple" id="ripple" href="{{ route('productlist', [
            'category' => $item->category->url,
            'subcategory' => $item->url,
       ]) }}">
                        View Products
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="white" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                    @else
                    <span class="btn disabled">No Products</span>
                    @endif
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@include('layouts.frontfooter')
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