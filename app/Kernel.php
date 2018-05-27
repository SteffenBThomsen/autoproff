<?php

namespace AutoProff\App;


class Kernel
{
    /**
     * @return JsonResponse
     */
    public function handleResponse(): JsonResponse
    {
        $router = new Router();

        return $router->response(
            $this->getRequestUri(),
            $this->getRequestParams()
        );
    }


    /**
     * @return array
     */
    private function getRequestParams(): array
    {
        return array_merge(
            $_GET,
            $_POST
        );
    }


    /**
     * @return string
     */
    private function getRequestUri(): string
    {
        $part = "api/";
        $uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
        return substr($uri, strpos($uri, $part) + strlen($part));
    }
}

