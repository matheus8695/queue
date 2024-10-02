<?php

namespace App\Services\GitHub\Jobs;

use App\Models\PullRequest;
use App\Services\GitHub\PullRequestService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Carbon;

class PullRequestSync implements ShouldQueue
{
    use Queueable;

    public function __construct(public string $repositoryFullName, public int $number)
    {
    }

    public function handle(): void
    {
        $pullRequest = (new PullRequestService())->getPullRequest($this->repositoryFullName, $this->number);

        PullRequest::create([
            'api_id'         => $pullRequest['id'],
            'api_number'     => $pullRequest['number'],
            'api_state'      => $pullRequest['state'],
            'api_title'      => $pullRequest['title'],
            'commits_total'  => $pullRequest['commits'],
            'api_created_at' => Carbon::parse($pullRequest['created_at'])->format('Y-m-d H:i:s'),
            'api_updated_at' => Carbon::parse($pullRequest['updated_at'])->format('Y-m-d H:i:s'),
            'api_merged_at'  => Carbon::parse($pullRequest['merged_at'])->format('Y-m-d H:i:s'),
            'api_closed_at'  => Carbon::parse($pullRequest['closed_at'])->format('Y-m-d H:i:s'),
        ]);
    }
}
