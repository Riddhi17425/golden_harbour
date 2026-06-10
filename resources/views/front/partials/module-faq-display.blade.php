@php
    $moduleFaqs = collect($faqs ?? [])->filter(function ($faq) {
        return trim((string) data_get($faq, 'question')) !== '' || trim(strip_tags((string) data_get($faq, 'answer'))) !== '';
    })->values();
    $faqId = $faqId ?? 'moduleFaq';
@endphp

@if ($moduleFaqs->isNotEmpty())
@php    
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
        }, $moduleFaqs->all()),
    ];

    $faqData = \App\Models\Faq::whereNull('deleted_at')->get();
@endphp
<script type="application/ld+json">
    {!! json_encode($faqSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
{{-- <section class="section_space">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="main_head main_head_line">FAQs</h2>
            </div>
            <div class="col-md-12">
                <div class="accordion" id="{{ $faqId }}">
                    @foreach ($moduleFaqs as $faq)
                        <div class="accordion-item">
                            <h3 class="accordion-header" id="{{ $faqId }}Heading{{ $loop->index }}">
                                <button class="accordion-button {{ $loop->first ? '' : 'collapsed' }}" type="button"
                                    data-bs-toggle="collapse"
                                    data-bs-target="#{{ $faqId }}Collapse{{ $loop->index }}"
                                    aria-expanded="{{ $loop->first ? 'true' : 'false' }}"
                                    aria-controls="{{ $faqId }}Collapse{{ $loop->index }}">
                                    {{ data_get($faq, 'question') }}
                                </button>
                            </h3>
                            <div id="{{ $faqId }}Collapse{{ $loop->index }}"
                                class="accordion-collapse collapse {{ $loop->first ? 'show' : '' }}"
                                aria-labelledby="{{ $faqId }}Heading{{ $loop->index }}"
                                data-bs-parent="#{{ $faqId }}">
                                <div class="accordion-body">
                                    {!! data_get($faq, 'answer') !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section> --}}

<section class="container my-5">
    <div class="row FAQ_Listing_main">
        <div class="col-lg-12 FAQ_Listing_child_2">
            <div id="{{ $faqId }}" class="content fade show active">
                @foreach ($moduleFaqs as $faq)
                    <div class="dropdown p-3 mb-3">
                        <div class="dropdown__top d-flex justify-content-between align-items-center">
                            <b>{{ data_get($faq, 'question') }}</b>
                            <img class="img-fluid rotate-icon" width="20"
                                src="{{ asset('public/front/images/Group 66 (1).svg') }}"
                                alt="Dropdown Icon">
                        </div>
                        <div class="dropdown__btm">
                            {!! data_get($faq, 'answer') !!}
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endif

<script>
$(document).ready(function () {
    // Open first FAQ by default
    $('.dropdown:first').addClass('open');
    $('.dropdown:first .dropdown__btm').show();
    $('.dropdown:first .rotate-icon').addClass('rotate');

    $('.dropdown__top').on('click', function () {
        var $dropdown = $(this).closest('.dropdown');
        var $content = $dropdown.find('.dropdown__btm');
        var $icon = $dropdown.find('.rotate-icon');

        if ($dropdown.hasClass('open')) {
            $dropdown.removeClass('open');
            $content.slideUp(300);
            $icon.removeClass('rotate');
        } else {
            // Close all others
            $('.dropdown').removeClass('open');
            $('.dropdown__btm').slideUp(300);
            $('.rotate-icon').removeClass('rotate');

            // Open current
            $dropdown.addClass('open');
            $content.slideDown(300);
            $icon.addClass('rotate');
        }
    });

});
</script>