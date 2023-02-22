<?php

namespace App\Services;

class TinyUrlService
{
    public function getTinyUrl($url)
    {
        try {
            $httpClient = new \GuzzleHttp\Client();
            $request = $httpClient->get("https://tinyurl.com/api-create.php?url=$url");
            return $request->getBody()->getContents();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
