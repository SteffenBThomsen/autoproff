<?php

namespace AutoProff\App;

class Router
{
    /**
     * @param string $uri
     * @param array $params
     * @return JsonResponse
     */
    public function response(string $uri, array $params): JsonResponse
    {
        $parts = explode('/', $uri, 3);

        $controller = $parts[0] ?? null;
        if (is_null($controller)) {
            return new JsonResponse([], "Controller Not Found", 404);
        }

        $class = "AutoProff\\app\\Controllers\\" . ucfirst($controller) . "Controller";
        $controller = new $class;

        $action = $parts[1] ?? null;
        if (is_null($action)) {
            return new JsonResponse([], "Action Not Found", 404);
        }

        switch ($action) {
            case "index":
                return $controller->{$action}();
            case "destroy":
            case "update":
                $identifier = $parts[2] ?? null;
                if (is_null($identifier)) {
                    return new JsonResponse([], "Not Found", 404);
                }

                return $controller->{$action}($identifier, $params);
            case "create":
                return $controller->{$action}($params);
            case "show":
                $identifier = $parts[2] ?? null;
                if (is_null($identifier)) {
                    return new JsonResponse([], "Not Found", 404);
                }

                return $controller->{$action}($identifier);
            default:
                return new JsonResponse([], "Method Not Found", 404);
        }
    }
}