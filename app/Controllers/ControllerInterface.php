<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 26/05/2018
 * Time: 15:48
 */

namespace AutoProff\App\Controllers;


use AutoProff\App\JsonResponse;

interface ControllerInterface
{
    public function index(): JsonResponse;

    public function show(int $identifier): JsonResponse;

    public function create(array $params): JsonResponse;

    public function destroy(int $identifier): JsonResponse;

    public function update(int $identifier, array $params): JsonResponse;

    public function notImplemented(): JsonResponse;
}