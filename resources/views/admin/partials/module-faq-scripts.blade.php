@once
<script>
$(document).ready(function() {
    const faqToolbar = [
        ['style', ['style']],
        ['font', ['bold', 'italic', 'underline', 'clear']],
        ['fontname', ['fontname']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']],
        ['insert', ['link', 'picture', 'hr']],
        ['view', ['fullscreen', 'codeview']],
        ['help', ['help']]
    ];

    function initFaqEditors(context) {
        $(context).find('.module-faq-answer').each(function() {
            if (!$(this).next('.note-editor').length) {
                $(this).summernote({
                    placeholder: 'Enter answer here...',
                    height: 180,
                    toolbar: faqToolbar
                });
            }
        });
    }

    function faqRow() {
        return `
            <div class="module-faq-item border rounded p-3 mb-3">
                <div class="row g-3">
                    <div class="col-md-12">
                        <label class="form-label">Question</label>
                        <input type="text" name="faq_question[]" class="form-control">
                    </div>
                    <div class="col-md-12">
                        <label class="form-label">Answer</label>
                        <textarea name="faq_answer[]" class="form-control module-faq-answer"></textarea>
                    </div>
                    <div class="col-md-12 text-end">
                        <button type="button" class="btn btn-danger btn-sm remove-module-faq">Remove</button>
                    </div>
                </div>
            </div>
        `;
    }

    initFaqEditors(document);

    $(document).on('click', '.add-module-faq', function() {
        const wrapper = $(this).closest('.card').find('.module-faq-wrapper');
        const item = $(faqRow());
        wrapper.append(item);
        initFaqEditors(item);
    });

    $(document).on('click', '.remove-module-faq', function() {
        const item = $(this).closest('.module-faq-item');
        const wrapper = item.closest('.module-faq-wrapper');

        if (wrapper.find('.module-faq-item').length === 1) {
            item.find('input').val('');
            item.find('.module-faq-answer').summernote('code', '');
            return;
        }

        item.find('.module-faq-answer').summernote('destroy');
        item.remove();
    });
});
</script>
@endonce
