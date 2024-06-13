<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Url extends Model
{
    use HasFactory;


    protected $guarded = [];

    protected static function booted(): void {
        static::creating(function(Url $url) {

            $url->short_url = Str::random(30);
        });
    }
}
