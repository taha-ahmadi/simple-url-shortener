<?php

namespace App\Services\UrlShortener\Repositories;

use App\Models\ShortUrl;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;

class UrlShortenerRepository
{
    const PER_PAGE = 20;

    public function storeUrl(int $userId, string $url): void
    {
        $randStr = Str::random(4);
        $shortUrl = new ShortUrl();
        $shortUrl->user_id = $userId;
        $shortUrl->url = $url;
        $shortUrl->code = $randStr;
        $shortUrl->save();

        Redis::zadd("visits", 0, $randStr);
    }

    public function getTopVisits(int $count)
    {
        return Redis::zrevrange('visits', 0, $count, 'WITHSCORES');
    }

    public function getAllUrls(int $userId)
    {
        return ShortUrl::query()->where('user_id', $userId)->paginate(self::PER_PAGE);
    }
}
