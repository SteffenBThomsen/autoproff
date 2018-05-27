<?php


namespace AutoProff\App\Controllers;

use AutoProff\App\JsonResponse;
use AutoProff\App\Logger;
use AutoProff\App\Models\Car;

class CarsController extends BaseController implements ControllerInterface
{

    public function index(): JsonResponse
    {
        return new JsonResponse(Car::all()->toArray());
    }

    public function create(array $params): JsonResponse
    {
        try {

            $car = new Car();
            $car->fill($params)->save();

            return new JsonResponse($car->fresh()->toArray());
        } catch(\Exception $exception) {
            Logger::log($exception->getMessage());
            return new JsonResponse([], "Bad Request", 400);
        }
    }

    public function destroy(int $identifier): JsonResponse
    {
        try {
            Car::findOrFail($identifier)->delete();
            return new JsonResponse([]);
        }  catch(\Exception $exception) {
            return new JsonResponse([], "Failed to delete", 400);
        }
    }

    public function update(int $identifier, array $params): JsonResponse
    {
        return $this->notImplemented();
    }

    public function search(array $params): JsonResponse
    {
        return $this->notImplemented();
    }

    public function show(int $identifier): JsonResponse
    {
        return $this->notImplemented();
    }
}