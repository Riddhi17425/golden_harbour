<?php

namespace App\Http\Controllers\admin\Concerns;

use Illuminate\Http\Request;

trait StoresFaqJson
{
    protected function makeFaqList(Request $request): ?array
    {
        $questions = $request->input('faq_question', []);
        $answers = $request->input('faq_answer', []);
        $faqs = [];

        foreach ($questions as $index => $question) {
            $question = trim((string) $question);
            $answer = $answers[$index] ?? '';

            if ($question === '' && trim(strip_tags((string) $answer)) === '') {
                continue;
            }

            $faqs[] = [
                'question' => $question,
                'answer' => $answer,
            ];
        }

        return empty($faqs) ? null : $faqs;
    }
}
