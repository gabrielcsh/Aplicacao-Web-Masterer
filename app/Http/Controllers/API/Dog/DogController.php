<?php

namespace App\Http\Controllers\Api\Dog;

use App\Helpers\GuzzleHelper;
use App\Http\Controllers\Controller;
use App\Services\Dogs\Contracts\DogServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DogController extends Controller
{
    private $service;

    public function __construct(DogServiceInterface $service)
    {
        $this->service = $service;
    }

    public function getDog(Request $request, $codeDog)
    {
        $uri  = GuzzleHelper::formataUri(config('services.dog.rotas.consultar-dog'), $codeDog);
        $data = $this->service->listarDog($request, $uri);

        return $this->jsonResponse($data, Response::HTTP_OK);
    }
}
