<?php

namespace App\Repositories\Faqs;

use App\Models\Faq;

class FaqRepository
{
    public function getFaqById(string $id)
    {
        $faq = Faq::find($id);
        return $faq?? abort(404);
    }
    public function getFaqs()
    {
        return Faq::orderBy('id', 'asc')->get();
    }
    public function createFaq($request)
    {
        return Faq::create($request);
    }
    public function updateFaq($faq, $data)
    {
        return $faq->update($data);
    }
    public function deleteFaq($faq)
    {
        return $faq->delete();
    }
}
