@include('layouts.frontheader')
<section class=" news_details_header_main my-5">
    <div class=" container-fluid px-lg-0">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <div class="col"></div>
            <div class="col-12 col-lg-5 me-30">
                <div class="">
                    <h6 class="main_routing_home">
                        <a href="{{url('/')}}">HOME ></a>
                       <span>RESOURCE > </span>
                       <span class="routing_home_news"> Career Opportunities</span>
                    </h6>
                    <h1 class="main_head">Career Opportunities</h1>
                    <h2 class="main_head_small">big opportunity starts here!</h2>
                    <p class="card-text ">we are always looking for talented individuals who are eager to innovate, collaborate, and grow. Whether you're an experienced professional or just starting your career, we offer opportunities that match your skills and aspirations.
                    </p>
                </div>
            </div>
            <div class="col-12 col-lg-6 d-flex justify-content-end">
                <img src="{{ asset('public/front/images/headerbanner/ourculture_hed_img.png') }}" class="img-fluid" alt="ourculture hed img">
            </div>
        </div>
    </div>
</section>
<section class="section_space position-relative">
    <div class="container">
        <div class="row sidebar">
            <div class="col-md-7 ">
                <h2 class="main_head main_head_line">{{ $job->title}}</h2>
                <ul class="two-column-list item_disc_gold mt-3">
                    {!! $job->details !!}
                </ul>
                {!! $job->description !!}
            </div>
            <div class="col-md-5 sticky-sidebar">
                <div class="">
                    <form class="apply-form contact_input" id="vacancyform" method="Post" action="{{ route('vacancystore') }}" enctype="multipart/form-data">
                        @csrf
                        <!-- First Name and Last Name in a single row -->
                        <h4 class="sub-main-head">Apply Now</h4>
                        <div class="row mb-4 gap-4">
                            <div class="col-md-12">
                                <label for="name" class="form-label"><b>Full Name *:</b></label>
                                <input type="text" class="form-control px-0" id="name" name="name" maxlength="50"
                                    oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/\s+/g, ' ').trimStart();"
                                    placeholder="Enter your First Name">
                                 <div id="name-error" style="color: red; display: none;"></div>
                            </div>

                            <div class="col-md-12 ">
                                <label for="email" class="form-label"><b>Email ID *:</b></label>
                                <input type="email" class="form-control px-0" id="email" name="email" maxlength="60"
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
                            <div class="col-md-12  ">
                                <label for="location" class="form-label"><b>Current Location :</b></label>
                                <input type="text" class="form-control px-0" id="location" name="current_location" maxlength="100" placeholder="Enter your Location">
                            </div>
                            <div class="col-md-12">
                                <label for="Profile" class="form-label"><b>LinkedIn Profile :</b></label>
                                <input type="text" class="form-control px-0" id="profile" name="linked_link" maxlength="50" placeholder="Enter your LinkedIn Profile">
                            </div>
                                <input type="hidden" name="applied_for" value="{{ $job->title }}"> 
                            <div class="col-md-12">
                                <label for="uploadResume" class="form-label"><b>Upload Resume *:</b></label>
                                <label class="custom-file-upload">
                                    <input type="file" id="uploadResume" name="resume_path" accept=".pdf,.doc,.docx">
                                    <p>Attach Your Resume In PDF, Word Format</p>
                                    <p><small>Max Size: 5 Mb</small></p>
                                </label>
                                <div id="uploadResume-error" style="color: red; display: none;"></div>
                            </div>
                            <div class="form-group">
                                <div class="g-recaptcha" data-sitekey="6LcsVn0rAAAAAAFsfEMC6Y7LXXKYzurDb7GDAAJY" data-callback="verifyCaptcha"></div>
                                <small id="recaptcha-error" style="color: red; display: none;"></small>
                            </div>
                            <!-- <div class="col-md-12 ">
                                <label for="Upload" class="form-label"><b>Upload Resume *:</b></label>
                                <input type="file" class="form-control px-0" id="Upload" placeholder="Enter your Subject">
                            </div> -->
                            <div class="col-md-12">
                                <button type="submit" class="btn btn--ripple " id="submitButton">Submit <svg xmlns="http://www.w3.org/2000/svg"
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
    </div>
</section>
<script>
    document.getElementById('uploadResume').addEventListener('change', function() {
    if (this.files.length > 0) {
        this.nextElementSibling.innerHTML = `<p>${this.files[0].name}</p>`;
    }
});

</script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@include('layouts.frontfooter')

<script>
   function verifyCaptcha() {
      $('#recaptcha-error').text('').hide();
   }

   $(document).ready(function () {
      // Realtime input validation
      $('#vacancyform input, #vacancyform textarea').on('input', function () {
         let field = $(this);
         let fieldId = field.attr('id');
         let errorId = '#' + fieldId + '-error';
         let value = field.val().trim();

         if (value === '') {
            $(errorId).text('This field is required').show();
         } else {
            $(errorId).text('').hide();
         }

         if (fieldId === 'email') {
            if (!/^\S+@\S+\.\S+$/.test(value)) {
               $(errorId).text('Please enter a valid email').show();
            } else {
               $(errorId).text('').hide();
            }
         }

         if (fieldId === 'phone') {
            if (!/^\d{10,15}$/.test(value)) {
               $(errorId).text('Phone number must be 10-15 digits').show();
            } else {
               $(errorId).text('').hide();
            }
         }
      });

      // Form submit validation
      $('#vacancyform').on('submit', function (e) {
         e.preventDefault();
         let isValid = true;

         // Basic required field checks (REMOVED: location, profile)
         $('#name, #email, #phone').each(function () {
            let field = $(this);
            let errorId = '#' + field.attr('id') + '-error';
            let value = field.val().trim();

            if (value === '') {
               $(errorId).text('This field is required').show();
               isValid = false;
            } else {
               $(errorId).text('').hide();
            }
         });

         // Email format and domain check
         let email = $('#email').val().trim();
         const emailError = $('#email-error');
         const fakeDomains = [
            'mailinator.com', '10minutemail.com', 'guerrillamail.com', 'tempmail.com',
            'temp-mail.org', 'throwawaymail.com', 'maildrop.cc', 'dispostable.com',
            'getairmail.com', 'moakt.com', 'spamgourmet.com', 'yopmail.com',
            'sharklasers.com', 'mailnesia.com', 'fakemail.net', 'emailondeck.com',
            'trashmail.com', 'mintemail.com', 'mytemp.email'
         ];

         if (email === '') {
            emailError.text('Please enter your email').show();
            isValid = false;
         } else if (!/^\S+@\S+\.\S+$/.test(email)) {
            emailError.text('Please enter a valid email').show();
            isValid = false;
         } else {
            const domain = email.split('@')[1];
            if (fakeDomains.includes(domain)) {
               emailError.text('Please provide a valid email address.').show();
               isValid = false;
            } else {
               emailError.text('').hide();
            }
         }

         // Phone validation
         let phone = $('#phone').val().trim();
         const phoneError = $('#phone-error');
         if (phone === '') {
            phoneError.text('Please enter your phone number').show();
            isValid = false;
         } else if (!/^\d{10,15}$/.test(phone)) {
            phoneError.text('Phone number must be 10-15 digits').show();
            isValid = false;
         } else {
            phoneError.text('').hide();
         }

         // Resume file validation
         let fileInput = $('#uploadResume').get(0);
         let file = fileInput.files[0];
         const resumeError = $('#uploadResume-error');

         if (!file) {
            resumeError.text('Please upload your resume').show();
            isValid = false;
         } else if (file.size > 5 * 1024 * 1024) {
            resumeError.text('Resume must be less than or equal to 5MB').show();
            isValid = false;
         } else {
            resumeError.text('').hide();
         }

         // reCAPTCHA validation
         if (grecaptcha.getResponse() === '') {
            $('#recaptcha-error').text('Please complete the reCAPTCHA').show();
            isValid = false;
         } else {
            $('#recaptcha-error').text('').hide();
         }

         // Final submit
         if (isValid) {
            const $btn = $('#submitButton');
            $btn.prop('disabled', true).text('Submitting...');
            this.submit(); // Correct way to submit form
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