<?php

namespace App\Services\Faqs;

use App\Repositories\Faqs\FaqRepository;

class FaqService
{
    /**
     * Create a new class instance.
     */
    public function __construct(protected FaqRepository $faqsRepository)
    {
        //
    }

    public function getFaqById($id)
    {
        return $this->faqsRepository->getFaqById($id);
    }

    public function getFaqs()
    {
        return $this->faqsRepository->getFaqs();
    }

    public function createFaq($request)
    {
        return $this->faqsRepository->createFaq($request);
    }

    public function updateFaq($id, $data)
    {
        $faq = self::getFaqById($id);
        return $this->faqsRepository->updateFaq($faq, $data);
    }
    public function destroyFaq($id)
    {
        $faq = self::getFaqById($id);
        return $this->faqsRepository->deleteFaq($faq);
    }
}
