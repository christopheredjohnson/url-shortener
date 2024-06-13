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

            $url->short_url = Url::generateUniqueShortUrl(30);
        });
    }

    static function generateUniqueShortUrl($length = 10)
    {
        $randomString = Str::random($length);

        // Check if the generated string already exists in the database
        while (Url::where('short_url', $randomString)->exists()) {
            $randomString = Str::random($length); // Regenerate random string if it exists
        }

        return $randomString;
    }
}
