<?php

namespace App\Http\Controllers\Dashboard\Faqs;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\FaqRequest;
use App\Services\Faqs\FaqService;

class FaqController extends Controller
{
    public function __construct(protected FaqService $faqService)
    {
        //
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = $this->faqService->getFaqs();
        return view('dashboard.faq.index', compact('faqs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FaqRequest $request)
    {
        $faq = $this->faqService->createFaq($request->except(['_token']));
        if (!$faq) {
            return response()->json([
                'status' => 'error',
                'message' => __('dashboard.msg_error'),
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'message' => __('dashboard.msg_success'),
            'faq' => $faq,
        ], 201);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(FaqRequest $request, string $id)
    {
        $data = $request->except(['_token', '_method']);
        $faq = $this->faqService->updateFaq($id, $data);
        if (!$faq) {
            return response()->json([
                'status' => 'error',
                'message' => __('dashboard.msg_error'),
            ], 500);
        }
        $faqAfterUpdate = $this->faqService->getFaqById($id);
        return response()->json([
            'status' => 'success',
            'message' => __('dashboard.msg_success'),
            'faq' => $faqAfterUpdate,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $faq = $this->faqService->destroyFaq($id);
        if (!$faq) {
            return response()->json([
                'status' => 'error',
                'message' => __('dashboard.msg_error'),
            ], 500);
        }
        return response()->json([
            'status' => 'success',
            'message' => __('dashboard.msg_success'),
        ], 200);
    }
}
