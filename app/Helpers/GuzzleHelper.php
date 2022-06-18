<?php

namespace App\Helpers;

use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class GuzzleHelper implements ClientHtppInterface
{
    public static function create(): PendingRequest
    {
        $cliente = auth()->user();
        $url     = config('constantes.ambiente.url.dog');

        if (empty($cliente)) {
            throw new UnauthorizedHttpException('Acesso Não Autorizado');
        }
        $usuario = $cliente->login_dog;
        $senha   = $cliente->senha_dog;

        return Http::withHeaders(self::headers())->baseUrl($url)->withBasicAuth($usuario, $senha);
    }

    public static function get(string $uri, array $parameters = [])
    {
        return self::create()->get($uri, $parameters);
    }

    public static function post(string $uri, array $data)
    {
        return self::create()->post($uri, $data);
    }

    public static function put(string $uri, array $data)
    {
        return self::create()->put($uri, $data);
    }

    public static function delete(string $uri, array $data = [])
    {
        return self::create()->delete($uri, $data);
    }

    public static function headers(array $headers = [])
    {
        return empty($headers) ? [
            "Content-Type" => "application/json; charset=utf-8",
            "Accept"       => "application/json"
        ] : $headers;
    }

    public static function formataUri(
        $uri,
        string $codeDog
    ) {
        if (self::verificaParametroNaUri($uri, ':codeDog')) {
            $uri = str_replace(":codeDog", $codeDog, $uri);
        }

        return $uri;
    }

    public static function verificaParametroNaUri($uri, $parametro)
    {
        if (preg_match('/' . $parametro . '.jpg/', $uri)) {
            return true;
        }

        return false;
    }
}
