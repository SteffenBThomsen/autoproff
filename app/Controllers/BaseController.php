<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 27/05/2018
 * Time: 18:24
 */

namespace AutoProff\App\Controllers;


use AutoProff\App\JsonResponse;

class BaseController
{
    public function notImplemented(): JsonResponse
    {
        return new JsonResponse([], "Not Implemented", 400);
    }
}