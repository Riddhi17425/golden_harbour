@include('layouts.frontheader', [
    'og_image' => asset('public/front/images/headerbanner/faq_hed_img.png')
])
<section class=" news_details_header_main">
    <div class=" container-fluid px-lg-0">
        <div class="d-flex flex-wrap align-items-center justify-content-between">
            <div class="col"></div>
            <div class="col-12 col-lg-5 mt-5 me-30">
                <div class="">
                    <h6 class="main_routing_home"><a href="{{ url('/') }}">HOME ></a>
                       <span>RESOURCE > </span> <span  class="routing_home_news"> FAQ's</span>
                    </h6>
                    <h1 class="main_head">FAQs</h1>
                    <h2 class="main_head_small">Your Questions, Answered !</h2>
                    <p class="card-text ">At Golden Harbour, we believe clarity builds trust. This section answers key questions about our sourcing, standards, and operations, helping you move forward with confidence.
                    </p>
                </div>
            </div>

            <div class="col-12 col-lg-6 d-flex justify-content-end">
                 <img src="{{ asset('public/front/images/headerbanner/faq_hed_img.png') }}" class="img-fluid"
                    alt="faq-img">
                <!--<img src="{{ asset('public/front/images/faq-img.png') }}" class="FAQ_header_img1 w-100"-->
                <!--    alt="...">-->
                <!--<img src="{{ asset('public/front/images/Group 65.png') }}" class=" img-fluid FAQ_header_img3 " alt="...">-->
            </div>
        </div>
    </div>
</section>

<section class="container my-5">
    <div class="row FAQ_Listing_main">
        <div class="col-12 col-lg-7 mb-4 FAQ_Listing_child_1">
            <!--<ul class="nav nav-tabs row row-cols-2 row-cols-lg-4">-->
            <!--    @foreach ($faqData as $faq)-->
            <!--        <li class="nav-item">-->
            <!--            <a class="nav-link {{ $faq->id == '1' ? 'active' : '' }}" id="faq-tab-{{ $faq->id }}" data-bs-toggle="tab" href="#faq-content-{{ $faq->id }}" >-->
            <!--                {{ $faq->faq_name }}-->
            <!--            </a>-->
            <!--        </li>-->
            <!--    @endforeach-->
            <!--</ul>-->
        </div>
        <div class="col-lg-7 FAQ_Listing_child_2 ">
            @if(!empty($faqData))
                @php
                    $faqItems = [];
                
                    if (!empty($faqData)) {
                            foreach ($faqData as $faq) {
                    
                                $faqDatas = is_string($faq->title_description)
                                    ? json_decode($faq->title_description, true)
                                    : $faq->title_description;
                    
                                if (is_array($faqDatas)) {
                                    foreach ($faqDatas as $item) {
                    
                                        $question = trim(strip_tags($item['title'] ?? ''));
                                        $answer = trim(strip_tags($item['description'] ?? ''));
                    
                                        if ($question && $answer) {
                                            $faqItems[] = [
                                                'question' => $question,
                                                'answer' => $answer,
                                            ];
                                        }
                                    }
                                }
                            }
                        }
                    
                        $faqSchema = [
                            '@context' => 'https://schema.org',
                            '@type' => 'FAQPage',
                            'mainEntity' => array_map(function ($item) {
                                return [
                                    '@type' => 'Question',
                                    'name' => $item['question'],
                                    'acceptedAnswer' => [
                                        '@type' => 'Answer',
                                        'text' => $item['answer'],
                                    ],
                                ];
                            }, $faqItems),
                        ];
                    @endphp
            @endif
            @foreach ($faqData as $faq)
                @php
                $faqDatas = json_decode($faq->title_description, true);
                @endphp
                <div id="faq-content-{{ $faq->id }}" class="content fade {{ $faq->id == '1' ? 'show active' : '' }}">
                    @foreach ($faqDatas as $data)
                        <div class="dropdown  p-3 mb-3">
                            <div class="dropdown__top d-flex justify-content-between align-items-center">
                                <b>{{ $data['title'] }}</b>
                                <img class="img-fluid rotate-icon" width="20" src="{{ asset('public/front/images/Group 66 (1).svg') }}" alt="Dropdown Icon">
                            </div>
                            <p class="dropdown__btm">
                                  {!! strip_tags($data['description']) !!}
                            </p>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
        <div class="col-lg-5 faq_sticky">
            <div class="">
                <h2 class="main_head fs-2">Still Have Questions? Ask Us Here!</h2>
                <p class="card-text">If you couldn’t find the answer you were looking for, feel free
                    to ask us your query, and our team will get back to you as soon as possible.
                </p>
            </div>
            <div>
                <div id="faq-success-msg" class="alert alert-success" style="display: none;"></div>
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form method="post" action="{{ route('faqstore') }}" id="faqForm">
                    @csrf
                    <div class="row my-3 faq_input">
                        <div class="mb-4">
                            <label for="first-name" class="form-label"><b>Your Question *:</b></label>
                            <input type="text" class="form-control px-0" id="question" name="question" required
                                oninput="this.value = this.value.replace(/[^a-zA-Z\s]/g, '').replace(/\s+/g, ' ').trimStart();"
                                placeholder="Type your question here..." maxlength="150" minlength="5">
                        </div>
                        <div class="">
                            <label for="email" class="form-label"><b>Your Email Address *:</b></label>
                            <input type="email" class="form-control px-0" id="email" name="email" required
                                placeholder="Enter your email to receive a response..." maxlength="100" minlength="5">
                            <div id="email-error" style="color: red; display: none;"></div>
                        </div>
                    </div>
                
                    <button type="submit" class="btn btn--ripple" id="ripple">
                        Submit
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none">
                            <path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75"
                                stroke="white" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
@if(!empty($faqItems))
    <script type="application/ld+json">
        {!! json_encode($faqSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
    </script>
@endif

@include('layouts.frontfooter')


<script>
// $(document).ready(function() {
//     $('.nav-link').on('click', function(e) {
//         e.preventDefault();
//         const target = $(this).data('target');

//         $('.nav-link').removeClass('active');
//         $('.content').removeClass('active');


//         $(this).addClass('active');
//         $('#' + target).addClass('active');
//     });
// });

$(document).ready(function() {

    var $firstDropdown = $('.dropdown:first-child');
    $firstDropdown.addClass('open').find('.dropdown__btm').slideDown(500);
    $firstDropdown.find('.rotate-icon').addClass('rotate');


    $('.dropdown__top').click(function() {
        var $dropdown = $(this).closest('.dropdown');
        var $dropdownContent = $dropdown.find('.dropdown__btm');
        var $icon = $dropdown.find('.rotate-icon');


        $('.dropdown').not($dropdown).removeClass('open').find('.dropdown__btm').slideUp(500);
        $('.dropdown').not($dropdown).find('.rotate-icon').removeClass(
            'rotate');


        if ($dropdown.hasClass('open')) {
            $dropdown.removeClass('open');
            $dropdownContent.slideUp(500);
            $icon.removeClass('rotate');
        } else {
            $dropdown.addClass('open');
            $dropdownContent.slideDown(500);
            $icon.addClass('rotate');
        }
    });
});


$(document).ready(function () {
    $("#faqForm").validate({
        rules: {
            question: {
                required: true
            },
            email: {
                required: true,
                email: true
            }
        },
        messages: {
            question: {
                required: "Please enter your question."
            },
            email: {
                required: "Please enter your email address.",
                email: "Please enter a valid email address."
            }
        },
        errorPlacement: function (error, element) {
            error.appendTo(element.parent());
        },
        submitHandler: function (form) {
            $('#email-error').empty().hide();

            const email = $('[name="email"]').val();
            const emailDomain = email.split('@')[1];
            const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

            if (!emailPattern.test(email)) {
                $('#email-error').html('Please enter a valid email address.').show();
                return false;
            }

            const fakeDomains = [
                'tempmail.com', 'mailinator.com', 'guerrillamail.com', 'yopmail.com', '10minutemail.com', 'throwawaymail.com'
            ];

            if (fakeDomains.includes(emailDomain)) {
                $('#email-error').html('Please provide a valid email address.').show();
                return false;
            }

            // Disable the button
            const $btn = $('#ripple');
            $btn.prop('disabled', true).html('Submitting...');

            // AJAX submission
            $.ajax({
                url: "{{ route('faqstore') }}",
                type: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    question: $('#question').val(),
                    email: $('#email').val()
                },
                success: function (response) {
                    $('#faq-success-msg')
                        .removeClass('alert-danger')
                        .addClass('alert alert-success')
                        .text(response.message || "Your question has been submitted successfully.")
                        .fadeIn();

                    $('#faqForm')[0].reset();
                    $btn.prop('disabled', false).html('Submit <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>');

                    setTimeout(() => {
                        $('#faq-success-msg').fadeOut();
                    }, 5000);
                },
                error: function (xhr) {
                    let msg = "Something went wrong. Please try again.";
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        msg = xhr.responseJSON.message;
                    }
                    $('#faq-success-msg')
                        .removeClass('alert-success')
                        .addClass('alert alert-danger')
                        .text(msg)
                        .fadeIn();

                    $btn.prop('disabled', false).html('Submit <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"><path d="M4.5 19.5L19.5 4.5M19.5 4.5H8.25M19.5 4.5V15.75" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>');
                }
            });

            return false;
        }
    });
});
</script>
<style>
    .error {
        color: red;
    }
</style>