<?php

class Request 
{
    public $input = [];

    public function __construct()
    {
        $this->input = $this->prepareInput($_REQUEST, $_FILES);
    }

    public function uri():string{
        $uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
        return trim($uri, '/') ?? '';
    }

    private function prepareInput($post, $files){
        return array_merge($this->cleanInput($post), $files);
    }
    private function cleanInput($data){
        if(is_array($data)){
            $cleaned = [];
            foreach ($data as $key => $value) {
                $cleaned[$key] = $this->cleanInput($value);
            }
            return $cleaned;
        }
        return trim(htmlspecialchars($data, ENT_QUOTES));
    }

}