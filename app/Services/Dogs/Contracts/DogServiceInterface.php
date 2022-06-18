<?php

namespace App\Services\Dogs\Contracts;

use Illuminate\Http\Request;

interface DogServiceInterface
{
    public function listarDog(Request $request, $uri);
}
