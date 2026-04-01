<div class="modal fade" id="e-catalogue" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Request for Latest Catalogue</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="col-md-12">
                <div class="stepper_wrapper">
                   <form id="catalogueform" action="{{route('catalogue.submit')}}" class="contact_input" method="post" enctype="multipart/form-data">
                      @csrf
                       <div class="row mb-4 gap-xxl-3 gap-lg-3">
                            <div class="col-md-12 mb-3">
                                <label for="name" class="form-label"><b>Full Name *:</b></label>
                                <input type="text" class="form-control px-0" id="catalogue-fullname" name="fullname" maxlength="70"
                                    oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/\s+/g, ' ').trimStart();"
                                    placeholder="Enter your full name">
                            </div>
                            <div class="col-md-12 mb-3 ">
                                <label for="location" class="form-label"><b>Company Name *:</b></label>
                                <input type="text" class="form-control px-0" id="catalogue-company_name"  name="company_name" maxlength="60" placeholder="Enter your company name"
                                oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/\s+/g, ' ').trimStart();">
                            </div>
                              <div class="col-md-12 mb-3">
                                    <label for="phone" class="form-label"><b>Contact Number *:</b></label>
                                    <input type="text" class="form-control px-0" id="catalogue-phone" name="phone" maxlength="15"
                                        minlength="10" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 15);"
                                        placeholder="Enter your contact number"
                                        title="Contact number should be between 10 to 15 digits">
                                </div>
                                
                                <div class="col-md-12 mb-3">
                                    <label for="email" class="form-label"><b>Email Address*</b></label>
                                    <input type="email" class="form-control px-0" id="catalogue-email" name="email" maxlength="60"
                                        placeholder="Enter your email">
                                </div>
                            <div class="col-md-12 mb-3">
                                <label for="Profile" class="form-label"><b>Message *</b></label>
                                 <input type="text" id="catalogue-message" name="message" class="form-control px-0" placeholder="Enter your message">
                            </div>
                            <!-- <div class="col-md-12 ">
                                <label for="Upload" class="form-label"><b>Upload Resume *:</b></label>
                                <input type="file" class="form-control px-0" id="Upload" placeholder="Enter your Subject">
                            </div> -->
                            <div class="col-lg-12">
                                <div class="form_item">
                                    <div id="catalogue-recaptcha-container"></div> <!-- Empty for JS rendering -->
                                    <input type="hidden" name="g-recaptcha-response" id="catalogue-g-recaptcha-response" />
                                    <div id="catalogue-error-static-recaptcha" class="text-danger mt-1"></div>
                                    @error('g-recaptcha-response')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn--ripple " >Submit <svg xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="white" stroke-width="1.5"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Understood</button>
      </div> -->
    </div>
  </div>
</div>
<script src="https://www.google.com/recaptcha/api.js?render=explicit" async defer></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    if (window.location.hash === "#e-catalogue") {
        var myModal = new bootstrap.Modal(document.getElementById('e-catalogue'));
        myModal.show();
    }
});
</script>
<script>


const fakeDomains = [
    'mailinator.com', '10minutemail.com', 'guerrillamail.com', 'tempmail.com',
    'temp-mail.org', 'throwawaymail.com', 'maildrop.cc', 'dispostable.com',
    'getairmail.com', 'moakt.com', 'spamgourmet.com', 'yopmail.com',
    'sharklasers.com', 'mailnesia.com', 'fakemail.net', 'emailondeck.com',
    'trashmail.com', 'mintemail.com', 'mytemp.email'
];

let catalogueRecaptchaWidgetId = null;
let catalogueRecaptchaRendered = false;
let formSubmitting = false;

function renderCatalogueRecaptcha() {
    if (catalogueRecaptchaRendered) return;
    catalogueRecaptchaRendered = true;
    $('#catalogue-recaptcha-container').css('display', 'block');
    catalogueRecaptchaWidgetId = grecaptcha.render('catalogue-recaptcha-container', {
        'sitekey': '6LcrR-grAAAAAJQi2hs3EmXwPw0f6AtPiAhDHUh9',
        'callback': function (token) {
            $('#catalogue-g-recaptcha-response').val(token);
            $('#catalogue-error-static-recaptcha').text('');
        }
    });
}

function showError(el, msg) {
    el.addClass('is-invalid');
    el.next('.text-danger').remove();
    el.after(`<div class="text-danger mt-1">${msg}</div>`);
}

function clearError(el) {
    el.removeClass('is-invalid');
    el.next('.text-danger').remove();
}

$(document).ready(function () {
    const form = $('#catalogueform');
    const submitBtn = form.find('button[type="submit"]');
    $('#catalogue-recaptcha-container').hide();

    // Render reCAPTCHA on first input
    form.find('input, textarea').one('input', function () {
        renderCatalogueRecaptcha();
    });

    // Auto validate required fields on input
    const requiredFields = [
        { id: '#catalogue-fullname', name: 'Full name' },
        { id: '#catalogue-company_name', name: 'Company name' },
        { id: '#catalogue-message', name: 'Message' },
        { id: '#catalogue-email', name: 'Email' },
        { id: '#catalogue-phone', name: 'Contact number' }
    ];

    requiredFields.forEach(field => {
        $(field.id).on('input', function () {
            const val = $(this).val().trim();
            if (val !== '') {
                clearError($(this));
            } else {
                showError($(this), `${field.name} is required.`);
            }
        });
    });

    // Email validate on blur
    $('#catalogue-email').on('blur', function () {
        const val = $(this).val().trim();
        const pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const domain = val.split('@')[1]?.toLowerCase();

        if (val === '') {
            showError($(this), 'Email is required.');
        } else if (!pattern.test(val)) {
            showError($(this), 'Please enter a valid email address.');
        } else if (fakeDomains.includes(domain)) {
            showError($(this), 'Invalid email addresses are not allowed.');
        } else {
            clearError($(this));
        }
    });

    // Phone validate on blur
    $('#catalogue-phone').on('blur', function () {
        const val = $(this).val().trim();
        if (val === '') {
            showError($(this), 'Contact number is required.');
        } else if (val.length < 10 || val.length > 15) {
            showError($(this), 'Contact number must be between 10 and 15 digits.');
        } else {
            clearError($(this));
        }
    });

    // Form submission
    form.on('submit', function (e) {
        e.preventDefault();
        if (formSubmitting) return;

        let isValid = true;
        submitBtn.prop('disabled', true);

        const fullName = $('#catalogue-fullname').val().trim();
        const company = $('#catalogue-company_name').val().trim();
        const message = $('#catalogue-message').val().trim();
        const email = $('#catalogue-email').val().trim();
        const phone = $('#catalogue-phone').val().trim();
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const emailDomain = email.split('@')[1]?.toLowerCase();

        // Required field checks
        if (fullName === '') {
            showError($('#catalogue-fullname'), 'Full name is required.');
            isValid = false;
        }
        if (company === '') {
            showError($('#catalogue-company_name'), 'Company name is required.');
            isValid = false;
        }
        if (message === '') {
            showError($('#catalogue-message'), 'Message is required.');
            isValid = false;
        }

        // Email validation
        if (email === '') {
            showError($('#catalogue-email'), 'Email is required.');
            isValid = false;
        } else if (!emailPattern.test(email)) {
            showError($('#catalogue-email'), 'Please enter a valid email address.');
            isValid = false;
        } else if (fakeDomains.includes(emailDomain)) {
            showError($('#catalogue-email'), 'Invalid email addresses are not allowed.');
            isValid = false;
        }

        // Phone validation
        if (phone === '') {
            showError($('#catalogue-phone'), 'Contact number is required.');
            isValid = false;
        } else if (phone.length < 10 || phone.length > 15) {
            showError($('#catalogue-phone'), 'Contact number must be between 10 and 15 digits.');
            isValid = false;
        }

        // CAPTCHA validation
        if (catalogueRecaptchaRendered) {
            const token = $('#catalogue-g-recaptcha-response').val();
            if (!token) {
                $('#catalogue-error-static-recaptcha').text('Please complete the reCAPTCHA.');
                isValid = false;
            }
        }

        if (isValid) {
            formSubmitting = true;
            window.open('public/catalogue/GH_Catalogue.pdf', '_blank'); // Replace with actual path
            form.off('submit').submit();
        } else {
            submitBtn.prop('disabled', false);
        }
    });
});
</script>















