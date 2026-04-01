@include('layouts.frontheader', [
    'og_image' => asset('public/front/images/no-vacancy.png')
])
<section class="news_details_header_main my-5">
    <div class="container-fluid px-lg-0">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <div class="col"></div>
            <div class="col-12 col-lg-5 me-30">
                <div class="">
                    <h6 class="main_routing_home">
                        <a href="{{ url('/') }}">HOME ></a>
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
<section class="">
    <div class="container">
        <div class="row g-3 g-md-5">
            <div class="col-lg-12 col-md-12 mb-4 ">
                <div class="row align-items-center">
                    <div class="col-lg-6 mb-4">
                        <img src="{{ asset('public/front/images/no-vacancy.png') }}" loading="lazy"  alt="no vacancies" class="img-fluid">
                    </div>
                    <div class="col-lg-6 mb-4">
                        <h2 class="main_head">No Vacancies at the Moment</h2>
                        <a href="#applicationForm" class="btn btn--ripple mb-4" id="ripple">Apply Now
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                        <p>Currently, we do not have specific openings listed, but we welcome applications from skilled individuals in sales, logistics, technical support, and operations. If you’re ready to be part of a company that values growth and reliability, we’d love to hear from you.
                        How to Apply: Please send your resume and a cover letter to <b><a href="mailto:careers@goldenharbour.ae">careers@goldenharbour.ae</a></b>. We’ll reach out if your profile matches our needs.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 novacancy">
                <form class="apply-form contact_input" id="applicationForm" method="POST" action="{{ route('novacancy.store') }}" enctype="multipart/form-data" novalidate>
                    @csrf
                    <h4 class="sub-main-head">Apply Now</h4>
                    <div class="row mb-4 gy-4">
                        <div class="col-md-6">
                            <label for="name" class="form-label"><b>Full Name *:</b></label>
                            <input type="text" class="form-control px-0" id="fullname" name="fullname" maxlength="70"
                                   oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/\s+/g, ' ').trimStart();"
                                   placeholder="Enter your First Name">
                            <span id="error-fullname" class="text-danger" style="color: red; display: none;"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label"><b>Email ID *:</b></label>
                            <input type="email" class="form-control px-0" id="email" name="email" maxlength="60"
                                   placeholder="Enter your email">
                            <span id="error-email" class="text-danger" style="color: red; display: none;"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="phone" class="form-label"><b>Phone Number *:</b></label>
                            <input type="text" class="form-control px-0" id="phone" name="phone" maxlength="15"
                                   minlength="10" oninput="this.value = this.value.replace(/[^0-9+]/g, '').replace(/(?!^)\+/g, '').slice(0, 15);"
                                   placeholder="Enter your Phone Number" pattern="\d{10,15}"
                                   title="Phone number should be between 10 to 15 digits">
                            <span id="error-phone" class="text-danger" style="color: red; display: none;"></span>
                        </div>
                        <div class="col-md-6">
                            <label for="location" class="form-label"><b>Current Location *:</b></label>
                            <input type="text" class="form-control px-0" id="Location" name="current_location" maxlength="100" placeholder="Enter your Location">
                            <span id="error-location" class="text-danger" style="color: red; display: none;"></span>
                        </div>
                        <div class="col-md-12">
                            <label for="Profile" class="form-label"><b>LinkedIn Profile :</b></label>
                            <input type="text" class="form-control px-0" id="linkedInprofile" name="linked_in" maxlength="50" placeholder="Enter your LinkedIn Profile">
                            <!-- Removed validation span since LinkedIn validation is removed -->
                        </div>
                        
                            <div class="col-md-12 ">
                                <label for="uploadResume" class="form-label"><b>Upload Resume *:</b></label>
                                <label class="custom-file-upload">
                                    <input type="file" name="resume" id="uploadResume" accept=".pdf,.doc,.docx">
                                    <p class="file-name">Attach Your Resume In PDF, Word Format</p>
                                    <p><small>Max Size: 5 Mb</small></p>
                                    <div id="error-uploadResume" class="text-danger text-center" style="color: red;"></div>
                                </label>
                            </div>
                        <div class="col-lg-12">
                            <div class="form_item">
                                <div class="g-recaptcha" data-sitekey="6LcrR-grAAAAAJQi2hs3EmXwPw0f6AtPiAhDHUh9" data-callback="recaptchaVerified"></div>
                                <div id="recaptcha-error" class="error-message text-danger" style="color: red; margin-top: 5px; display: none;"></div>
                                @error('g-recaptcha-response')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" id="submitBtn" class="btn btn--ripple">Apply Now
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script>
    // jQuery or Vanilla JS to update file name
    document.getElementById('uploadResume').addEventListener('change', function () {
        const fileName = this.files[0]?.name || 'Attach Your Resume In PDF, Word Format';
        this.closest('.custom-file-upload').querySelector('.file-name').textContent = fileName;
    });
</script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    const blurred = {};
    const fakeDomains = ['mailinator.com', 'tempmail.com', '10minutemail.com', 'yopmail.com'];

    function validateEmailFormat(email) {
        const regex = /^\S+@\S+\.\S+$/;
        return regex.test(email);
    }

    function isFakeDomain(email) {
        const domain = email.split('@')[1]?.toLowerCase();
        return fakeDomains.includes(domain);
    }

    // FULL NAME
    $('#fullname').on('input', function () {
        const val = $(this).val().trim();
        if (val === '') {
            $('#error-fullname').text('Please enter your full name').show();
        } else {
            $('#error-fullname').hide();
        }
    });

    // EMAIL
    $('#email').on('input', function () {
        if (!blurred.email) $('#error-email').hide();
    });

    $('#email').on('blur', function () {
        blurred.email = true;
        const val = $(this).val().trim();
        if (val === '') {
            $('#error-email').text('Please enter your email').show();
        } else if (!validateEmailFormat(val)) {
            $('#error-email').text('Please enter a valid email address').show();
        } else if (isFakeDomain(val)) {
            $('#error-email').text('Disposable email addresses are not allowed').show();
        } else {
            $('#error-email').hide();
        }
    });

    // PHONE
    $('#phone').on('input', function () {
        if (!blurred.phone) $('#error-phone').hide();
    });

    $('#phone').on('blur', function () {
        blurred.phone = true;
        const val = $(this).val().trim();
        if (val === '') {
            $('#error-phone').text('Please enter your phone number').show();
        } else if (!/^\d{10,15}$/.test(val)) {
            $('#error-phone').text('Phone number must be 10 to 15 digits').show();
        } else {
            $('#error-phone').hide();
        }
    });

    // CURRENT LOCATION
    $('#Location').on('input', function () {
        if (!blurred.location) $('#error-location').hide();
    });

    $('#Location').on('blur', function () {
        blurred.location = true;
        const val = $(this).val().trim();
        if (val === '') {
            $('#error-location').text('Please enter your location').show();
        } else {
            $('#error-location').hide();
        }
    });

    // RESUME
    $('#uploadResume').on('change', function () {
        const file = this.files[0];
        if (!file) {
            $('#error-uploadResume').text('Please upload your resume').show();
        } else if (!['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'].includes(file.type)) {
            $('#error-uploadResume').text('Only PDF or Word (DOC/DOCX) files are allowed').show();
        } else if (file.size > 5 * 1024 * 1024) {
            $('#error-uploadResume').text('File size must be less than 5MB').show();
        } else {
            $('#error-uploadResume').hide();
            this.nextElementSibling.querySelector('.file-name').innerHTML = `<p>${file.name}</p>`;
        }
    });

    // reCAPTCHA
    window.recaptchaVerified = function () {
        $('#recaptcha-error').hide();
    };

    // FORM SUBMIT
    $('#applicationForm').on('submit', function (e) {
        let isValid = true;

        const fullName = $('#fullname').val().trim();
        const email = $('#email').val().trim();
        const phone = $('#phone').val().trim();
        const location = $('#Location').val().trim();
        const resume = $('#uploadResume')[0].files[0];

        // FULL NAME
        if (fullName === '') {
            $('#error-fullname').text('Please enter your full name').show();
            isValid = false;
        } else {
            $('#error-fullname').hide();
        }

        // EMAIL
        if (email === '') {
            $('#error-email').text('Please enter your email').show();
            isValid = false;
        } else if (!validateEmailFormat(email)) {
            $('#error-email').text('Please enter a valid email address').show();
            isValid = false;
        } else if (isFakeDomain(email)) {
            $('#error-email').text('Disposable email addresses are not allowed').show();
            isValid = false;
        } else {
            $('#error-email').hide();
        }

        // PHONE
        if (phone === '') {
            $('#error-phone').text('Please enter your phone number').show();
            isValid = false;
        } else if (!/^\d{10,15}$/.test(phone)) {
            $('#error-phone').text('Phone number must be 10 to 15 digits').show();
            isValid = false;
        } else {
            $('#error-phone').hide();
        }

        // CURRENT LOCATION
        if (location === '') {
            $('#error-location').text('Please enter your location').show();
            isValid = false;
        } else {
            $('#error-location').hide();
        }

        // RESUME
        if (!resume) {
            $('#error-uploadResume').text('Please upload your resume').show();
            isValid = false;
        } else if (!['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'].includes(resume.type)) {
            $('#error-uploadResume').text('Only PDF or Word (DOC/DOCX) files are allowed').show();
            isValid = false;
        } else if (resume.size > 5 * 1024 * 1024) {
            $('#error-uploadResume').text('File size must be less than 5MB').show();
            isValid = false;
        } else {
            $('#error-uploadResume').hide();
        }

        // CAPTCHA
        if (typeof grecaptcha !== 'undefined' && grecaptcha.getResponse() === '') {
            $('#recaptcha-error').text('Please verify that you are not a robot').show();
            isValid = false;
        } else {
            $('#recaptcha-error').hide();
        }

        if (!isValid) {
            e.preventDefault();
        } else {
            $(this).find('button[type="submit"]').prop('disabled', true).text('Submitting...');
        }
    });
});
</script>
<style>
    .text-danger {
        color: red;
        font-size: 0.9rem;
    }
</style>
@include('layouts.frontfooter')