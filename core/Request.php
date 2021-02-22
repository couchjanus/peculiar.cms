<?php

class Request 
{
    public function uri():string{
        $uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        return trim($uri, '/') ?? '';
    }
}