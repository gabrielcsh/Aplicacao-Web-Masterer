<?php

namespace App\Services\Dogs;

use App\Helpers\GuzzleHelper;
use Illuminate\Http\Request;

class DogService implements Contracts\DogServiceInterface
{

    public function listarDog(Request $request, $uri)
    {
        $response = GuzzleHelper::get($uri, $request->query());

        $responseJson = $response->json();

        return $responseJson;
    }
}
