@php
    $moduleFaqs = collect($faqs ?? [])->filter(function ($faq) {
        return trim((string) data_get($faq, 'question')) !== '' || trim(strip_tags((string) data_get($faq, 'answer'))) !== '';
    })->values();
    $faqId = $faqId ?? 'moduleFaq';
@endphp

@if ($moduleFaqs->isNotEmpty())
<section class="section_space">
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
</section>
@endif
