<div class="modal fade" id="e-catalogue" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header">
                <p class="modal-title mb-0 fs-5" id="staticBackdropLabel">
                    Request for Latest Catalogue
                </p>

                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close">
                </button>
            </div>

            <div class="modal-body">

                <div class="col-md-12">
                    <div class="stepper_wrapper">

                        <form id="catalogueform"
                              action="{{ route('catalogue.submit') }}"
                              class="contact_input"
                              method="post"
                              enctype="multipart/form-data">

                            @csrf

                            <div class="row mb-4 gap-xxl-3 gap-lg-3">

                                <!-- Full Name -->
                                <div class="col-md-12 mb-3">
                                    <label for="catalogue-fullname" class="form-label">
                                        <b>Full Name *:</b>
                                    </label>

                                    <input type="text"
                                           class="form-control px-0"
                                           id="catalogue-fullname"
                                           name="fullname"
                                           maxlength="70"
                                           oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/\s+/g, ' ').trimStart();"
                                           placeholder="Enter your full name">
                                </div>

                                <!-- Company Name -->
                                <div class="col-md-12 mb-3">
                                    <label for="catalogue-company_name" class="form-label">
                                        <b>Company Name *:</b>
                                    </label>

                                    <input type="text"
                                           class="form-control px-0"
                                           id="catalogue-company_name"
                                           name="company_name"
                                           maxlength="60"
                                           placeholder="Enter your company name"
                                           oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/\s+/g, ' ').trimStart();">
                                </div>

                                <!-- Contact Number -->
                                <div class="col-md-12 mb-3">
                                    <label for="catalogue-phone" class="form-label">
                                        <b>Contact Number *:</b>
                                    </label>

                                    <!-- User enters national/local number here -->
                                    <input type="tel"
                                           class="form-control"
                                           id="catalogue-phone"
                                           name="phone_national"
                                           placeholder="Enter your contact number"
                                           title="Contact number should be between 8 to 15 digits">

                                    <!-- Full international number sent to backend -->
                                    <input type="hidden"
                                           name="phone"
                                           id="catalogue-phone-full">
                                </div>

                                <!-- Email -->
                                <div class="col-md-12 mb-3">
                                    <label for="catalogue-email" class="form-label">
                                        <b>Email Address*</b>
                                    </label>

                                    <input type="email"
                                           class="form-control px-0"
                                           id="catalogue-email"
                                           name="email"
                                           maxlength="60"
                                           placeholder="Enter your email">
                                </div>

                                <!-- Message -->
                                <div class="col-md-12 mb-3">
                                    <label for="catalogue-message" class="form-label">
                                        <b>Message *</b>
                                    </label>

                                    <input type="text"
                                           id="catalogue-message"
                                           name="message"
                                           class="form-control px-0"
                                           placeholder="Enter your message">
                                </div>

                                <!-- reCAPTCHA -->
                                <div class="col-lg-12">
                                    <div class="form_item">

                                        <div id="catalogue-recaptcha-container"></div>

                                        <input type="hidden"
                                               name="g-recaptcha-response"
                                               id="catalogue-g-recaptcha-response">

                                        <div id="catalogue-error-static-recaptcha"
                                             class="text-danger mt-1">
                                        </div>

                                        @error('g-recaptcha-response')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror

                                    </div>
                                </div>

                                <!-- Submit -->
                                <div class="col-md-12">
                                    <button type="submit"
                                            class="btn btn--ripple">

                                        Submit

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             width="24"
                                             height="24"
                                             viewBox="0 0 24 24"
                                             fill="none">

                                            <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75"
                                                  stroke="white"
                                                  stroke-width="1.5"
                                                  stroke-linecap="round"
                                                  stroke-linejoin="round" />

                                        </svg>

                                    </button>
                                </div>

                            </div>

                        </form>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>


<!-- ========================================================= -->
<!-- intl-tel-input -->
<!-- ========================================================= -->

<link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/intl-tel-input@23.8.0/build/css/intlTelInput.css">

<script src="https://cdn.jsdelivr.net/npm/intl-tel-input@23.8.0/build/js/intlTelInput.min.js"></script>

<script src="https://www.google.com/recaptcha/api.js?render=explicit"
        async
        defer>
</script>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


<!-- ========================================================= -->
<!-- Open Catalogue Modal From URL Hash -->
<!-- ========================================================= -->

<script>
document.addEventListener("DOMContentLoaded", function () {

    if (window.location.hash === "#e-catalogue") {

        var modalElement = document.getElementById('e-catalogue');

        if (modalElement) {
            var myModal = new bootstrap.Modal(modalElement);
            myModal.show();
        }
    }

});
</script>


<!-- ========================================================= -->
<!-- intl-tel-input Styling -->
<!-- IMPORTANT: KEEP THIS STYLING -->
<!-- ========================================================= -->

<style>

.iti {
    width: 100%;
    display: block;
}

/* Phone input */
#catalogue-phone.iti__tel-input {
    padding-left: 92px !important;
    padding-right: 14px !important;
    height: 44px;
    border-radius: 6px;
    font-size: 15px;
    line-height: 1.4;
    display: flex;
    align-items: center;
}

/* Country flag container */
.iti__flag-container,
.iti__selected-flag {
    height: 100%;
    display: flex;
    align-items: center;
    padding-left: 10px;
    border-right: 1px solid #e2e2e2;
}

/* Dial code */
.iti__selected-dial-code {
    margin-left: 6px;
    color: #333;
    font-size: 15px;
    font-weight: 500;
    line-height: 1.4;
    display: inline-flex;
    align-items: center;
}

/* Arrow */
.iti__arrow {
    align-self: center;
}

/* Dropdown panel */
.iti__dropdown-content {
    width: 300px !important;
    max-width: 90vw !important;
    border-radius: 8px;
    border: 1px solid #e5e5e5;
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.14);
    background: #fff;
    overflow: hidden;
    z-index: 2000 !important;
}

/* Search box */
.iti__search-input {
    width: 100%;
    padding: 12px 14px 12px 34px !important;
    border: none;
    border-bottom: 1px solid #eee;
    font-size: 14px;
    outline: none;
    box-sizing: border-box;
}

/* Country list */
.iti__country-list {
    max-height: 260px;
    overflow-y: auto;
    margin: 0;
    padding: 4px 0;
}

/* Country item */
.iti__country {
    padding: 9px 14px;
    display: flex;
    align-items: center;
    gap: 10px;
    cursor: pointer;
    transition: background-color 0.15s ease;
}

/* Country name */
.iti__country-name {
    flex: 1;
    font-size: 14px;
    color: #333;
}

/* Dial code in dropdown */
.iti__dial-code {
    color: #999;
    font-size: 13px;
}

/* Hover */
.iti__country:hover,
.iti__country.iti__highlight {
    background-color: #f5f6f7;
}

/* Flag */
.iti__flag-box {
    width: 22px;
    border-radius: 2px;
    overflow: hidden;
}

</style>


<!-- ========================================================= -->
<!-- Catalogue Form JS -->
<!-- ========================================================= -->

<script>

const fakeDomains = [
    'mailinator.com',
    '10minutemail.com',
    'guerrillamail.com',
    'tempmail.com',
    'temp-mail.org',
    'throwawaymail.com',
    'maildrop.cc',
    'dispostable.com',
    'getairmail.com',
    'moakt.com',
    'spamgourmet.com',
    'yopmail.com',
    'sharklasers.com',
    'mailnesia.com',
    'fakemail.net',
    'emailondeck.com',
    'trashmail.com',
    'mintemail.com',
    'mytemp.email'
];

let formSubmitting = false;
let catalogueIti = null;

let catalogueRecaptchaWidgetId = null;
let catalogueRecaptchaRendered = false;


/* ========================================================= */
/* Error Functions */
/* ========================================================= */

function showError(el, msg) {

    el.addClass('is-invalid');

    el.next('.text-danger').remove();

    el.after(
        `<div class="text-danger mt-1">${msg}</div>`
    );
}


function clearError(el) {

    el.removeClass('is-invalid');

    el.next('.text-danger').remove();
}


/* ========================================================= */
/* reCAPTCHA */
/* ========================================================= */

function renderCatalogueRecaptcha() {

    if (catalogueRecaptchaRendered) {
        return;
    }

    if (typeof grecaptcha === 'undefined') {
        return;
    }

    catalogueRecaptchaRendered = true;

    $('#catalogue-recaptcha-container').css(
        'display',
        'block'
    );

    catalogueRecaptchaWidgetId = grecaptcha.render(
        'catalogue-recaptcha-container',
        {
            'sitekey': '6LcrR-grAAAAAJQi2hs3EmXwPw0f6AtPiAhDHUh9',

            'callback': function(token) {

                $('#catalogue-g-recaptcha-response')
                    .val(token);

                $('#catalogue-error-static-recaptcha')
                    .text('');
            }
        }
    );
}


/* ========================================================= */
/* Document Ready */
/* ========================================================= */

$(document).ready(function () {

    const form = $('#catalogueform');

    if (!form.length) {
        return;
    }

    const submitBtn = form.find(
        'button[type="submit"]'
    );


    /* ===================================================== */
    /* Initialize Country Code Selector */
    /* ===================================================== */

    const phoneInputField =
        document.querySelector('#catalogue-phone');


    if (
        phoneInputField &&
        window.intlTelInput
    ) {

        catalogueIti = window.intlTelInput(
            phoneInputField,
            {

                /* Default UAE */
                initialCountry: 'ae',

                /* Preferred countries */
                preferredCountries: [
                    'ae',
                    'in',
                    'sa',
                    'qa',
                    'om',
                    'kw',
                    'bh'
                ],

                /* Show separate dial code */
                separateDialCode: true,

                /* Country search */
                countrySearch: true,

                /* Keep dropdown compact */
                fixDropdownWidth: false,

                /* Important for Bootstrap modal */
                dropdownContainer:
                    document.getElementById(
                        'e-catalogue'
                    ),

                /* Utils */
                utilsScript:
                    'https://cdn.jsdelivr.net/npm/intl-tel-input@23.8.0/build/js/utils.js'
            }
        );


        /* Close dropdown when modal closes */

        const catalogueModal =
            document.getElementById('e-catalogue');

        if (catalogueModal) {

            catalogueModal.addEventListener(
                'hidden.bs.modal',
                function () {

                    if (
                        catalogueIti &&
                        typeof catalogueIti.close === 'function'
                    ) {
                        catalogueIti.close();
                    }

                }
            );
        }
    }


    /* ===================================================== */
    /* reCAPTCHA */
    /* ===================================================== */

    $('#catalogue-recaptcha-container').hide();


    /*
     * Wait until Google reCAPTCHA is loaded
     */
    if (typeof grecaptcha !== 'undefined') {

        renderCatalogueRecaptcha();

    } else {

        window.addEventListener(
            'load',
            function () {

                if (
                    typeof grecaptcha !== 'undefined'
                ) {
                    renderCatalogueRecaptcha();
                }

            }
        );
    }


    /* ===================================================== */
    /* Required Field Validation */
    /* ===================================================== */

    const requiredFields = [

        {
            id: '#catalogue-fullname',
            name: 'Full name'
        },

        {
            id: '#catalogue-company_name',
            name: 'Company name'
        },

        {
            id: '#catalogue-message',
            name: 'Message'
        },

        {
            id: '#catalogue-email',
            name: 'Email'
        },

        {
            id: '#catalogue-phone',
            name: 'Contact number'
        }

    ];


    requiredFields.forEach(function(field) {

        $(field.id).on(
            'input',
            function () {

                const val =
                    $(this).val().trim();

                if (val !== '') {

                    clearError($(this));

                } else {

                    showError(
                        $(this),
                        `${field.name} is required.`
                    );
                }

            }
        );

    });


    /* ===================================================== */
    /* Email Validation */
    /* ===================================================== */

    $('#catalogue-email').on(
        'blur',
        function () {

            const val =
                $(this).val().trim();

            const pattern =
                /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            const domain =
                val.split('@')[1]?.toLowerCase();


            if (val === '') {

                showError(
                    $(this),
                    'Email is required.'
                );

            } else if (!pattern.test(val)) {

                showError(
                    $(this),
                    'Please enter a valid email address.'
                );

            } else if (
                fakeDomains.includes(domain)
            ) {

                showError(
                    $(this),
                    'Invalid email addresses are not allowed.'
                );

            } else {

                clearError($(this));
            }

        }
    );


    /* ===================================================== */
    /* Phone Validation */
    /* ===================================================== */

    $('#catalogue-phone').on(
        'blur',
        function () {

            const val =
                $(this).val().trim();

            const digitsOnly =
                val.replace(/\D/g, '');


            if (val === '') {

                showError(
                    $(this),
                    'Contact number is required.'
                );

            } else if (
                digitsOnly.length < 8 ||
                digitsOnly.length > 15
            ) {

                showError(
                    $(this),
                    'Phone number must be between 8 and 15 digits.'
                );

            } else {

                clearError($(this));
            }

        }
    );


    /* ===================================================== */
    /* Form Submit */
    /* ===================================================== */

    form.on(
        'submit',
        function (e) {

            e.preventDefault();


            if (formSubmitting) {
                return;
            }


            let isValid = true;


            const btn = submitBtn;

            const originalText =
                btn.html();


            /*
             * Remove only field errors.
             * Do NOT remove reCAPTCHA.
             */

            $('.field-error').remove();

            $('.is-invalid').removeClass(
                'is-invalid'
            );


            /* Get values */

            const fullName =
                $('#catalogue-fullname')
                    .val()
                    .trim();

            const company =
                $('#catalogue-company_name')
                    .val()
                    .trim();

            const message =
                $('#catalogue-message')
                    .val()
                    .trim();

            const email =
                $('#catalogue-email')
                    .val()
                    .trim();

            const phone =
                $('#catalogue-phone')
                    .val()
                    .trim();


            /* Email */

            const emailPattern =
                /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

            const emailDomain =
                email.split('@')[1]
                    ?.toLowerCase();


            /* ================================================= */
            /* Full Name */
            /* ================================================= */

            if (!fullName) {

                showError(
                    $('#catalogue-fullname'),
                    'Full name is required.'
                );

                isValid = false;
            }


            /* ================================================= */
            /* Company */
            /* ================================================= */

            if (!company) {

                showError(
                    $('#catalogue-company_name'),
                    'Company name is required.'
                );

                isValid = false;
            }


            /* ================================================= */
            /* Message */
            /* ================================================= */

            if (!message) {

                showError(
                    $('#catalogue-message'),
                    'Message is required.'
                );

                isValid = false;
            }


            /* ================================================= */
            /* Email */
            /* ================================================= */

            if (!email) {

                showError(
                    $('#catalogue-email'),
                    'Email is required.'
                );

                isValid = false;

            } else if (
                !emailPattern.test(email)
            ) {

                showError(
                    $('#catalogue-email'),
                    'Invalid email.'
                );

                isValid = false;

            } else if (
                fakeDomains.includes(emailDomain)
            ) {

                showError(
                    $('#catalogue-email'),
                    'Fake email not allowed.'
                );

                isValid = false;
            }


            /* ================================================= */
            /* Phone */
            /* ================================================= */

            const digitsOnly =
                phone.replace(/\D/g, '');


            if (!phone) {

                showError(
                    $('#catalogue-phone'),
                    'Phone is required.'
                );

                isValid = false;

            } else if (
                digitsOnly.length < 8 ||
                digitsOnly.length > 15
            ) {

                showError(
                    $('#catalogue-phone'),
                    'Phone number must be between 8 and 15 digits.'
                );

                isValid = false;

            } else {

                /*
                 * IMPORTANT:
                 *
                 * Send complete international number
                 * to controller as "phone".
                 */

                if (
                    catalogueIti &&
                    typeof catalogueIti.getNumber === 'function'
                ) {

                    const fullPhoneNumber =
                        catalogueIti.getNumber();

                    $('#catalogue-phone-full')
                        .val(fullPhoneNumber);

                } else {

                    /*
                     * Fallback if intl-tel-input
                     * failed to initialize.
                     */

                    $('#catalogue-phone-full')
                        .val(phone);
                }
            }


            /* ================================================= */
            /* reCAPTCHA */
            /* ================================================= */

            let recaptchaToken = '';


            if (
                typeof grecaptcha !== 'undefined' &&
                catalogueRecaptchaWidgetId !== null
            ) {

                recaptchaToken =
                    grecaptcha.getResponse(
                        catalogueRecaptchaWidgetId
                    );
            }


            if (!recaptchaToken) {

                $('#catalogue-error-static-recaptcha')
                    .text('Please complete the captcha.')
                    .show();

                isValid = false;

            } else {

                $('#catalogue-g-recaptcha-response')
                    .val(recaptchaToken);

                $('#catalogue-error-static-recaptcha')
                    .text('');
            }


            /* ================================================= */
            /* Final Submit */
            /* ================================================= */

            if (isValid) {

                formSubmitting = true;

                btn
                    .prop('disabled', true)
                    .html('Submitting...');


                /*
                 * Remove submit handler and submit
                 * normally to Laravel route.
                 *
                 * This will hit:
                 *
                 * catalogue.submit
                 *
                 * -> CatelogueSubmit()
                 *
                 * -> Google Sheet
                 */

                setTimeout(function () {

                    form.off('submit');

                    form[0].submit();

                }, 100);


            } else {

                btn
                    .prop('disabled', false)
                    .html(originalText);
            }

        }
    );

});

</script>