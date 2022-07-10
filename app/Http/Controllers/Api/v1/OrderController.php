<?php

namespace App\Http\Controllers\Api\v1;


use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\Api\Catalog\OrderRequest;
use App\Http\Resources\OrderCollection;
use App\Services\OrderService;
use Illuminate\Http\Response;

class OrderController extends BaseController
{
    private $service;

    public function __construct(OrderService $service)
    {
        $this->service = $service;
    }

    /**
     * index
     * Метод для получения списка заказов авторизированного пользователя
     */
    public function index()
    {
        try {
            $user = auth('sanctum')->user();
            $orders = $this->service->getCurrentOrders($user);

            return new OrderCollection($orders);
        } catch (\Throwable $th) {
            return $this->handleError($th->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * checkout
     * Метод для оформления заказа
     */
    public function checkout(OrderRequest $request)
    {
        try {
            $this->service->checkout($request);

            return $this->handleResponse([], 'Orders accepted.', Response::HTTP_CREATED);
        } catch (\Throwable $th) {
            return $this->handleError($th->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
