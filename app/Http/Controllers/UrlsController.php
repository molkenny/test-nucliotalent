<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostUrlRequest;
use App\Services\TinyUrlService;

class UrlsController extends Controller
{

    public function shortUrls(PostUrlRequest $request, TinyUrlService $tinyUrlService){
        try {
            $url = $request->url;
            $tinyUrl = $tinyUrlService->getTinyUrl($url);
            return response()->json([
                "url" => $tinyUrl
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "err" => [
                    "msg" => "Server Error"
                ]
            ],500);
        }

    }
}
