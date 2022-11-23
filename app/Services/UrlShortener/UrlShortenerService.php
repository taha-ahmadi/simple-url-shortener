<?php

namespace App\Services\UrlShortener;

use App\Services\UrlShortener\Repositories\UrlShortenerRepository;

class UrlShortenerService
{
    private UrlShortenerRepository $shortenerRepository;

    public function __construct(UrlShortenerRepository $repository)
    {
        $this->shortenerRepository = $repository;
    }

    public function storeUrl(int $userId, string $url): void
    {
        $this->shortenerRepository->storeUrl($userId, $url);
    }

    public function getTopVisits(int $count)
    {
        return $this->shortenerRepository->getTopVisits($count);
    }

    public function getAllUrls(int $userId)
    {
        return $this->shortenerRepository->getAllUrls($userId);
    }
}
