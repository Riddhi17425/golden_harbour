@include('layouts.frontheader', [
    'og_image' => asset('public/front/images/photography-watercolor-software-developer-clipart 1.png')
])
<section class=" news_details_header_main my-5">
    <div class=" container-fluid px-lg-0">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <div class="col"></div>
            <div class="col-12 col-lg-5 me-30">
                <div class="">
                    <h6 class="main_routing_home"><a href="{{ url('/') }}">HOME ></a>
                        <span class="routing_home_news">CONTACT</span>
                    </h6>
                    <h1 class="main_head">Connect with us</h1>
                    <h2 class="main_head_small">Your Queries, Our Priority</h2>

                    <p class="card-text">
                        We’re here to assist you with all your marine, offshore, oilfield, and industrial needs. Reach out to our offices across the MENA region for prompt and reliable support. Contact us today to explore how Golden Harbour can be your trusted partner.
                    </p>

                </div>
            </div>

            <div class="col-12 col-lg-6 d-flex justify-content-end">

                <img src="{{ asset('public/front/images/headerbanner/contact_hed_img.png') }}" class="img-fluid"
                    alt="contact hed img">

            </div>
        </div>
    </div>
</section>

<section class="container my-5 contact-map ">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 justify-content-center gy-4 gx-xxl-4 gx-lg-3">
        <div class="d-flex">
            <div class="contact-map_card  d-flex flex-column overflow-hidden">
                <div class="p-xxl-3 p-lg-2 p-3 position-relative flex-grow-1">
                    <img src="{{ asset('public/front/images/solution-layer.svg') }}" alt="solution" class="img-fluid mb-2">
                    <h4><b>Golden Harbour LLC Headquarters</b></h4>
                    <ul class="contact_itme">
                        <li class="d-flex gap-3">
                            <span><img width="24px" heght="24px" src="{{ asset('public/front/images/location.svg') }}"
                                    alt="location"></span>
                            <a href="https://maps.app.goo.gl/sHmPu8GbRgfhXCWZ9" target="_blank">Plot No. 3690251, Al Quoz Ind. Area 4, P.O. Box 13840, Dubai, UAE</a>
                        </li>
                        <li class="d-flex gap-3">
                            <span><img width="24px" heght="24px" src="{{ asset('public/front/images/email.svg') }}"
                                    alt="email"></span>
                            <a href="mailto:sales@goldenharbour.ae">sales@goldenharbour.ae</a>
                        </li>
                        <li class="d-flex gap-3"><span>
                                <img width="24px" heght="24px"
                                    src="{{ asset('public/front/images/telephone.svg') }}" alt="telephone"></span>
                            <a href="tel:+97143472152">+971 4 347 2152</a>
                        </li>
                        <li class="d-flex gap-3">
                            <span><img width="24px" heght="24px" src="{{ asset('public/front/images/telephone.svg') }}"
                                    alt="telephone"></span>
                                    <a href="tel: +97143243640"> +971 4 324 3640</a>
                        </li>
                    </ul>
                    <h2 class="contact-map_img_dubai main_head position-absolute">Dubai</h2>
                </div>
                <div class="position-relative text-center contact-map_back_img map_back_img1 py-4">
                    <a href="https://maps.app.goo.gl/sHmPu8GbRgfhXCWZ9" type="submit"
                        class="btn btn--ripple contact-btn-hover" id="ripple"> Get Directions
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="white" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="d-flex">
            <div class="contact-map_card  d-flex flex-column overflow-hidden">
                <div class="p-xxl-3 p-lg-2 p-3 position-relative flex-grow-1">
                    <img src="{{ asset('public/front/images/solution-layer.svg') }}" alt="solution" class="img-fluid mb-2">
                    <h4><b>Golden Harbour Technical Dept. Trdg. Imp</b></h4>
                    <ul class="contact_itme">
                        <li class="d-flex gap-3">
                            <span><img width="24px" heght="24px" src="{{ asset('public/front/images/location.svg') }}"
                                    alt="location"></span>
                            <a href="https://maps.app.goo.gl/2FA5hrYfj8mjCcuo6">Mussafah M-37, Abu Dhabi, UAE</a>
                        </li>
                        <li class="d-flex gap-3">
                            <span><img width="24px" heght="24px" src="{{ asset('public/front/images/email.svg') }}"
                                    alt="email"></span>
                            <a href="mailto:sales.adh@goldenharbour.ae">sales.adh@goldenharbour.ae</a>
                        </li>
                        <li class="d-flex gap-3"><span>
                                <img width="24px" heght="24px"
                                    src="{{ asset('public/front/images/telephone.svg') }}" alt="telephone"></span>
                            <a href="tel:+97125506844">+971 2 550 6844</a>
                        </li>
                        <!--<li class="d-flex gap-3">-->
                        <!--    <span><img width="24px" heght="24px" src="{{ asset('public/front/images/telephone.svg') }}"-->
                        <!--            alt="telephone"></span>-->
                        <!--            <a href="tel:+97148876793">+971 4 887 6793</a>-->
                        <!--</li>-->
                    </ul>
                    <h2 class="contact-map_img_dubai main_head position-absolute">ABU DHABI</h2>
                </div>
                <div class="position-relative text-center contact-map_back_img map_back_img2 py-4">
                    <a href="https://maps.app.goo.gl/2FA5hrYfj8mjCcuo6" type="submit"
                        class="btn btn--ripple contact-btn-hover" id="ripple"> Get Directions
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="white" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="d-flex">
            <div class="contact-map_card  d-flex flex-column overflow-hidden">
                <div class="p-xxl-3 p-lg-2 p-3 position-relative flex-grow-1">
                    <img src="{{ asset('public/front/images/solution-layer.svg') }}" alt="solution" class="img-fluid mb-2">
                    <h4><b>Golden Harbour Oil & Gas FZCO</b></h4>
                    <ul class="contact_itme">
                        <li class="d-flex gap-3"><span><img width="24px" heght="24px"
                                    src="{{ asset('public/front/images/location.svg') }}" alt="location"></span>
                                    <a href="https://maps.app.goo.gl/TmgLmhZS5jmBr8wH9">P.O. Box 13840, RA08 – NB03 Jebel Ali Free Zone Dubai, UAE</a>
                        </li>
                        <li class="d-flex gap-3">
                            <span><img width="24px" heght="24px" src="{{ asset('public/front/images/email.svg') }}" alt="email"></span>
                            <a href="mailto:Jafza@goldenharbour.ae">Jafza@goldenharbour.ae</a>
                        </li>
                        <li class="d-flex gap-3">
                            <span><img width="24px" heght="24px" src="{{ asset('public/front/images/phone.svg') }}" alt="phone"></span>
                            <a href="tel:+97148876953">+971 4 887 6953</a>
                        </li>
                        
                    </ul>
                    <h2 class="contact-map_img_dubai main_head position-absolute">JEBEL ALI</h2>
                </div>
                <div class="position-relative text-center contact-map_back_img map_back_img3 py-4">
                    <a href="https://maps.app.goo.gl/TmgLmhZS5jmBr8wH9" type="submit"
                        class="btn btn--ripple contact-btn-hover" id="ripple"> Get Directions
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="white" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="d-flex">
            <div class="contact-map_card  d-flex flex-column overflow-hidden">
                <div class="p-xxl-3 p-lg-2 p-3 position-relative flex-grow-1">
                    <img src="{{ asset('public/front/images/solution-layer.svg') }}" alt="solution" class="img-fluid mb-2">
                    <h4><b>Golden Harbour General Trading W.L.L.</b></h4>
                    <ul class="contact_itme">
                        <li class="d-flex gap-3"><span><img width="24px" heght="24px"
                                    src="{{ asset('public/front/images/location.svg') }}" alt="location"></span>
                                    <a href="https://maps.app.goo.gl/dCDUAZLU2s4SUAy69">Flat 3, Building 50486, HIDD, Kingdom of Bahrain</a>
                        </li>
                        <li class="d-flex gap-3"><span><img width="24px" heght="24px"
                                    src="{{ asset('public/front/images/email.svg') }}" alt="email"></span>
                                    <a href="mailto:sales@goldenharbour.bh">sales@goldenharbour.bh</a>
                        </li>
                        <li class="d-flex gap-3"><span><img width="24px" heght="24px"
                                    src="{{ asset('public/front/images/phone.svg') }}" alt="phone"></span>
                                    <a href="tel:+97317611505">+973 1 761 1505</a>
                        </li>
                        <li class="d-flex gap-3"><span><img width="24px" heght="24px" src="{{ asset('public/front/images/telephone.svg') }}"
                                    alt="telephone"></span>
                                    <a href="tel:+97338055353">+973 3 805 5353</a>
                        </li>
                    </ul>
                    <h2 class="contact-map_img_dubai main_head position-absolute">BAHRAIN</h2>
                </div>

                <div class="position-relative text-center contact-map_back_img map_back_img4 py-4">
                    <a href="https://maps.app.goo.gl/dCDUAZLU2s4SUAy69" type="submit"
                        class="btn btn--ripple contact-btn-hover" id="ripple"> Get Directions
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="white" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section_space" id="build-together">
    <div class=" container-fluid my-5">
         <div class=" text-center">
        <h2 class="main_head text-center">Let’s Build Something Great Together</h2>
        <div class="effect_line position-relative col-md-5"></div>
    </div>

    <div class="row my-5">
        <div class="col-lg-5 col-xl-5 p-3 d-md-flex justify-content-md-center">
            <img src="{{ asset('public/front/images/photography-watercolor-software-developer-clipart 1.png') }}" alt="A man working on a laptop"
                class="img-fluid rounded">
        </div>
        <div class="contact_input col-lg-6 col-xl-6 p-3">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                @error('g-recaptcha-response')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            <form id="contactform" method="post" action="{{ route('contactstore') }}">
                @csrf
                <input type="hidden" name="hiddenvalue" value="1">
            
                <div class="row mb-4">
                    <div class="col-md-6 mb-4 mb-lg-0">
                        <label for="first-name" class="form-label"><b>First Name *:</b></label>
                        <input type="text" class="form-control px-0" id="firstname" name="firstname" required
                            oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/\s+/g, ' ').trimStart();"
                            placeholder="Enter your First Name" maxlength="40" minlength="2">
                    </div>
                    <div class="col-md-6">
                        <label for="last-name" class="form-label"><b>Last Name *:</b></label>
                        <input type="text" class="form-control px-0" id="lastname" name="lastname" required
                            oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/\s+/g, ' ').trimStart();"
                            placeholder="Enter your Last Name" maxlength="40" minlength="2">
                    </div>
                </div>
            
                <div class="row mb-4">
                    <div class="col-md-6 mb-4 mb-lg-0">
                        <label for="email" class="form-label"><b>Email ID *:</b></label>
                        <input type="email" class="form-control px-0" id="email" name="email"
                            placeholder="Enter your email" required maxlength="50" minlength="5">
                        <div id="email-error" style="color: red; display: none;"></div>
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label"><b>Phone Number *:</b></label>
                        <input type="tel" class="form-control px-0" id="number" name="number" maxlength="15" minlength="10"
                            required oninput="this.value = this.value.replace(/[^0-9+]/g, '').replace(/(?!^)\+/g, '').slice(0, 15);"
                            placeholder="Enter your Phone Number" pattern="\d{10,15}"
                            title="Phone number should be between 10 to 15 digits">
                    </div>
                </div>
            
                <div class="row mb-4">
                    <div class="col-md-6 mb-4 mb-lg-0">
                        <label for="company" class="form-label"><b>Company Name *:</b></label>
                        <input type="text" class="form-control px-0" id="company_name" name="company_name"
                            placeholder="Enter your Company Name" required maxlength="100" minlength="2">
                    </div>
                    <div class="col-md-6">
                        <label for="city" class="form-label"><b>City *:</b></label>
                        <input type="text" class="form-control px-0" id="city" name="city" required
                            placeholder="Enter your City Name" maxlength="30" minlength="2">
                    </div>
                </div>
            
                <div class="row mb-4">
                    <div class="col-md-6 mb-4 mb-lg-0">
                        <label for="subject" class="form-label"><b>Subject *:</b></label>
                        <input type="text" class="form-control px-0" id="subject" name="subject"
                            placeholder="Enter your Subject" required maxlength="50" minlength="2">
                    </div>
                    <div class="col-md-6">
                        <label for="message" class="form-label"><b>Message :</b></label>
                        <textarea class="form-control px-0" id="message" name="message" rows="1"
                            placeholder="Enter your Message" ></textarea>
                    </div>
                </div>
            
                <div class="col-lg-12">
                    <div class="form_item">
                        <div id="contact-recaptcha"></div>
                        <div id="recaptcha-error" class="error-message" style="color: red; margin-top: 5px;"></div>
                        @error('g-recaptcha-response')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            
                <button type="submit" class="btn btn--ripple" id="ripple">Submit
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="white" stroke-width="1.5"
                            stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
    </div>
</section>




<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (localStorage.getItem('scrollToBuildTogether') === '1') {
            localStorage.removeItem('scrollToBuildTogether');
            var target = document.getElementById('build-together');
            if (target) {
                setTimeout(function () {
                    target.scrollIntoView({ behavior: 'smooth' });
                }, 300);
            }
        }
    });
</script>
@include('layouts.frontfooter')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (localStorage.getItem('scrollToBuildTogether') === '1') {
            localStorage.removeItem('scrollToBuildTogether');
            var target = document.getElementById('build-together');
            if (target) {
                setTimeout(function () {
                    target.scrollIntoView({ behavior: 'smooth' });
                }, 300);
            }
        }
    });
</script>
<script>
$(document).ready(function() {

    $("#contactform").validate({
        rules: {
            firstname: {
                required: true
            },
            lastname: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            number: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 15
            },
            company_name: {
                required: true
            },
            city: {
                required: true
            },
            subject: {
                required: true
            },
            'g-recaptcha-response': {
                required: true
            }
        },
        messages: {
            firstname: {
                required: "Please enter your first name."
            },
            lastname: {
                required: "Please enter your last name."
            },
            email: {
                required: "Please enter your email address.",
                email: "Please enter a valid email address."
            },
            number: {
                required: "Please enter your phone number.",
                digits: "Please enter only digits.",
                minlength: "Phone number must be between 10 to 15 digits",
                maxlength: "Phone number cannot exceed 15 digits."
            },
            company_name: {
                required: "Please enter your company name."
            },
            city: {
                required: "Please enter your city."
            },
            subject: {
                required: "Please enter your subject."
            },
            'g-recaptcha-response': {
                required: "Please verify that you are not a robot."
            }
        },
        errorPlacement: function(error, element) {
            error.appendTo(element.parent());
        },
        submitHandler: function(form) {
            // Clear previous errors
            $('#email-error').empty().hide();
            $('#recaptcha-error').empty().hide();
            const email = $('[name="email"]').val();
            const emailDomain = email.split('@')[1];
            const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

            // if (!emailPattern.test(email)) {
            //     $('#email-error').html('Please enter a valid email address.').show();
            //     return false;
            // }
            // if (!emailDomain || emailDomain.indexOf('.') === -1) {
            //     $('#email-error').html('Please enter a valid email address with a proper domain.')
            //         .show();
            //     return false;
            // }
            // const domainParts = emailDomain.split('.');
            // if (domainParts.length < 2 || domainParts[domainParts.length - 1].length < 2) {
            //     $('#email-error').html('Please enter a valid email address with a proper domain.')
            //         .show();
            //     return false;
            // }
            const fakeDomains = [
                'mailinator.com', '10minutemail.com', 'guerrillamail.com', 'tempmail.com',
                'temp-mail.org', 'throwawaymail.com', 'maildrop.cc', 'dispostable.com',
                'getairmail.com', 'moakt.com', 'spamgourmet.com', 'yopmail.com',
                'sharklasers.com', 'mailnesia.com', 'fakemail.net', 'emailondeck.com',
                'trashmail.com', 'mintemail.com', 'mytemp.email'
            ];
            if (fakeDomains.includes(emailDomain)) {
                $('#email-error').html('Please provide a valid email address.').show();
                return false;
            }

            let recaptchaResponse = grecaptcha.getResponse(contactCaptchaWidgetId);
            if (recaptchaResponse === "") {
                $('#recaptcha-error').html("Please verify that you are not a robot.").show();
                return false;
            } else {
                $('#recaptcha-error').empty().hide();
            }
              // Disable submit button and change text
            const $submitBtn = $('#contactform').find(':submit');
            $submitBtn.prop('disabled', true).text('Submitting...');

            form.submit(); // Proceed with form submission
        }
    });
});
</script>
<style>
.error {
    color: red;
}
</style>