<?php

namespace App\Domains\Auth\Http\Controllers\Backend\User;

use App\Domains\Auth\Models\Feedback;
use App\Domains\Auth\Services\FeedbackService;

class FeedbackController
{
    private FeedbackService $feedbackService;

    public function __construct(FeedbackService $feedbackService)
    {
        $this->feedbackService = $feedbackService;
    }

    public function index()
    {
        return view('backend.auth.feedback.index');
    }

    public function destroy(Feedback $feedback)
    {
        $this->feedbackService->destroy($feedback);
        return redirect()->route('admin.debug.feedback.index')->withFlashSuccess(__('User feedback was permanently deleted.'));
    }
}
