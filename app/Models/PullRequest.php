<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PullRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'api_id',
        'api_number',
        'api_state',
        'api_title',
        'api_created_at',
        'api_updated_at',
        'api_merged_at',
        'api_closed_at',
        'commits_total',
    ];
}
