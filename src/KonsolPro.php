<?php

namespace Timurrodya\KonsolPro;

use Illuminate\Http\Client\ConnectionException;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;

/**
 * Class KonsolPro
 *
 * @package Timurrodya\KonsolPro
 */
class KonsolPro
{
    public PendingRequest $client;

    public function __construct()
    {
        $baseUrl = sprintf(
            "%s/%s",
            rtrim((string) config('konsolpro.baseurl'), '/'),
            rtrim(config('konsolpro.version'), '/'),
        );

        $this->client = Http::withToken(config('konsolpro.token'))
            ->baseUrl($baseUrl)
            ->retry(3, 100, fn($exception): bool => $exception instanceof ConnectionException)
            ->acceptJson()
            ->contentType('application/json');
    }

    /**
     * Проверка работоспособности API
     *
     * @see https://konsol.readme.io/reference/health
     * @return bool
     */
    public function health(): bool
    {
        return $this->client->get('health')->ok();
    }
}
