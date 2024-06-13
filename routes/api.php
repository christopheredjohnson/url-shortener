<?php

use App\Models\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('shorten', function(Request $request) {
    $validated = $request->validate([
        'url' => 'required',
    ]);

    $url = Url::create([
        'original_url' => $validated['url']
    ]);

    return $url->short_url;
});

Route::get('/{url:short_url}', function (Url $url) {

    // Increment click count
    $url->increment('click_count');

    return response()->redirectTo($url->original_url);
});
