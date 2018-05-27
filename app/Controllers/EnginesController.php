<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 27/05/2018
 * Time: 18:23
 */

namespace AutoProff\App\Controllers;


use AutoProff\App\JsonResponse;
use AutoProff\App\Models\Engine;

class EnginesController extends BaseController implements ControllerInterface
{

    public function index(): JsonResponse
    {
        return new JsonResponse(Engine::all()->toArray());
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

    public function search(array $params): JsonResponse
    {
        return $this->notImplemented();
    }
}