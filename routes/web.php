<?php

use App\Models\PullRequest;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\{Http, Route};

Route::get('/', function () {
    $pullRequests = Http::get('http://api.github.com/repos/laravel/laravel/pulls?state=all');

    foreach ($pullRequests->json() as $pullRequest) {
        PullRequest::create([
            'api_id'         => $pullRequest['id'],
            'api_number'     => $pullRequest['number'],
            'api_state'      => $pullRequest['state'],
            'api_title'      => $pullRequest['title'],
            'api_created_at' => Carbon::parse($pullRequest['created_at'])->format('Y-m-d H:i:s'),
            'api_updated_at' => Carbon::parse($pullRequest['updated_at'])->format('Y-m-d H:i:s'),
            'api_merged_at'  => Carbon::parse($pullRequest['merged_at'])->format('Y-m-d H:i:s'),
            'api_closed_at'  => Carbon::parse($pullRequest['closed_at'])->format('Y-m-d H:i:s'),
        ]);
    }
});
