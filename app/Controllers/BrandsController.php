<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 27/05/2018
 * Time: 18:23
 */

namespace AutoProff\App\Controllers;


use AutoProff\App\JsonResponse;
use AutoProff\App\Models\Brand;
use AutoProff\App\Models\Model;

class BrandsController extends BaseController implements ControllerInterface
{
    public function index(): JsonResponse
    {
        return new JsonResponse(Brand::all()->toArray());
    }

    public function show(int $identifier): JsonResponse
    {
        return $this->notImplemented();
    }

    public function create(array $params): JsonResponse
    {
        return $this->notImplemented();
    }

    public function destroy(int $identifier): JsonResponse
    {
        return $this->notImplemented();
    }

    public function update(int $identifier, array $params): JsonResponse
    {
        return $this->notImplemented();
    }
}