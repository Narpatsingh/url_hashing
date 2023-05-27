<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UrlHash extends Model
{
    use HasFactory;
    protected $table = 'url_hashes';
    protected $fillable = [
        'original_url',
        'click_limit',
        'hashed_url',
        'days_limit',
        'expired_at',
    ];

    protected $dates = [
        'expired_at',
    ];
}
