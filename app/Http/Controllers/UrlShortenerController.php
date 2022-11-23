<?php

namespace App\Http\Controllers;

use App\Services\UrlShortener\UrlShortenerService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class UrlShortenerController extends Controller
{
    private UrlShortenerService $urlShortenerService;

    public function __construct(UrlShortenerService $urlShortenerService)
    {
        $this->urlShortenerService = $urlShortenerService;
    }

    public function index(Request $request): \Illuminate\Contracts\Pagination\LengthAwarePaginator
    {
        $request->validate([
            'user_id' => 'required|exists:short_urls',
        ]);

        return $this->urlShortenerService->getAllUrls($request->get('user_id'));
    }

    public function store(Request $request): \Illuminate\Http\JsonResponse
    {
        $request->validate([
            'user_id' => 'required|exists:short_urls',
            'url' => 'required|url'
        ]);

        $this->urlShortenerService->storeUrl($request->get('user_id'), $request->get('url'));

        return Response::json([
            "short url created"
        ], \Symfony\Component\HttpFoundation\Response::HTTP_OK);
    }

    public function topVisits(Request $request)
    {
        $request->validate([
            'count' => 'required|integer'
        ]);

        return $this->urlShortenerService->getTopVisits($request->get('count'));
    }
}
