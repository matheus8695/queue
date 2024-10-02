<?php

namespace App\Services\GitHub;

use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

class PullRequestService
{
    public function getPullRequests(string $repositoryFullName, int $page = 1): array
    {
        $url = 'repos/' . $repositoryFullName . '/pulls?state=all&page=' . $page;
        $response = (new Client())->http()->get($url);
        
        return $response->json();
    }

    public function getPullRequest(string $repositoryFullName, int $number): array
    {
        $url = 'repos/' . $repositoryFullName . '/pulls/' . $number;
        $response = (new Client())->http()->get($url);

        return $response->json();
    }
}
