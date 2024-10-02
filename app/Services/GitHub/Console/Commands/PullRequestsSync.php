<?php

namespace App\Services\GitHub\Console\Commands;

use App\Services\GitHub\Jobs\PullRequestsSync as JobsPullRequestsSync;
use Illuminate\Console\Command;

class PullRequestsSync extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'github:pull-requests-sync {repositoryFullName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        JobsPullRequestsSync::dispatch($this->argument('repositoryFullName'));
    }
}
