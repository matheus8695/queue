<?php

namespace App\Services\GitHub\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class PullRequestReviewersRequestedSync implements ShouldQueue
{
    use Queueable;

    public function __construct()
    {
        
    }
}
