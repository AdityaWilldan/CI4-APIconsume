<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Komik extends Controller
{
    protected $apiBase = 'https://weeb-scraper.onrender.com/api/komiku';

    public function index()
    {
        $search = $this->request->getGet('s') ?? '';
        $page   = $this->request->getGet('page') ?? 1;

        $query = [];
        if (!empty($search)) {
            $query['s'] = $search;
        }
        if ($page > 1) {
            $query['page'] = $page;
        }

        
        $client = \Config\Services::curlrequest();
        $response = $client->request('GET', $this->apiBase, [
            'query' => $query,
            'http_errors' => false, 
        ]);

        $result = json_decode($response->getBody(), true);

        if (!$result || !isset($result['data'])) {
            $result = ['data' => [], 'next_page' => null, 'prev_page' => null];
        }

        $pagination = $this->buildPagination($result['next_page'] ?? null, $result['prev_page'] ?? null, $search);

        $data = [
            'komik_list' => $result['data'],
            'search'     => $search,
            'next_page'  => $pagination['next'],
            'prev_page'  => $pagination['prev'],
        ];

        return view('komik/index', $data);
    }

    public function detail($param)
    {
        $client = \Config\Services::curlrequest();
        $url = $this->apiBase . '/' . $param;
        $response = $client->request('GET', $url, ['http_errors' => false]);
        $payload = json_decode($response->getBody(), true);
        $komik = $payload['data'] ?? null;

        if (!$komik) {
            return redirect()->to('/')->with('error', 'Komik tidak ditemukan');
        }

        return view('komik/detail', ['komik' => $komik]);
    }

    
    private function buildPagination(?string $nextApiUrl, ?string $prevApiUrl, string $search): array
    {
        $result = ['next' => null, 'prev' => null];

        if ($nextApiUrl) {
            $parsed = parse_url($nextApiUrl);
            parse_str($parsed['query'] ?? '', $queryParams);
            $result['next'] = '/?' . http_build_query([
                's'    => $queryParams['s'] ?? $search,
                'page' => $queryParams['page'] ?? 2,
            ]);
        }

        if ($prevApiUrl) {
            $parsed = parse_url($prevApiUrl);
            parse_str($parsed['query'] ?? '', $queryParams);
            $result['prev'] = '/?' . http_build_query([
                's'    => $queryParams['s'] ?? $search,
                'page' => $queryParams['page'] ?? 1,
            ]);
        }

        return $result;
    }
}
