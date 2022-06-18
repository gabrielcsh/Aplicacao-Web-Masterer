<?php

namespace App\Helpers;

interface ClientHtppInterface
{
    public static function get(string $uri, array $parameters = []);

    public static function post(string $uri, array $data);

    public static function put(string $uri, array $data);

    public static function delete(string $uri, array $data = []);
}
