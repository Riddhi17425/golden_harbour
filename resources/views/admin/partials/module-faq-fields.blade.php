@php
    $moduleFaqs = collect($faqs ?? [])->map(function ($faq) {
        return (object) $faq;
    });
    if ($moduleFaqs->isEmpty()) {
        $moduleFaqs = collect([(object) ['question' => '', 'answer' => '']]);
    }
@endphp

<div class="card mb-3 p-3">
    <div class="card-header py-3 p-0 d-flex justify-content-between align-items-center bg-transparent border-bottom-0">
        <h6 class="mb-0 fw-bold">FAQ Information</h6>
        <button type="button" class="btn btn-primary btn-sm add-module-faq">Add More</button>
    </div>
    <div class="module-faq-wrapper">
        @foreach ($moduleFaqs as $faq)
            <div class="module-faq-item border rounded p-3 mb-3">
                <div class="row g-3">
                    <div class="col-md-12">
                        <label class="form-label">Question</label>
                        <input type="text" name="faq_question[]" class="form-control" value="{{ $faq->question }}">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Answer</label>
                        <textarea name="faq_answer[]" class="form-control module-faq-answer">{!! $faq->answer !!}</textarea>
                    </div>
                    <div class="col-md-12 text-end">
                        <button type="button" class="btn btn-danger btn-sm remove-module-faq">Remove</button>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
