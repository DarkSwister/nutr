<?php

namespace App\Domains\Auth\Events\Feedback;

use App\Domains\Auth\Models\Feedback;
use Illuminate\Queue\SerializesModels;

/**
 * Class UserCreated.
 */
class FeedbackCreated
{
    use SerializesModels;

    /**
     * @var
     */
    public $feedback;

    /**
     * @param $feedback
     */
    public function __construct(Feedback $feedback)
    {
        $this->feedback = $feedback;
    }
}
