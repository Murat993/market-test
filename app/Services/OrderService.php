<?php

namespace App\Services;


use App\Http\Requests\Api\Catalog\OrderRequest;
use App\Models\Order;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class OrderService
{
    public function getCurrentOrders(Authenticatable $user): Collection
    {
        return Order::with(['catalogs'])->where('user_id', $user->id)->get();
    }

    public function checkout(OrderRequest $request): void
    {
        $params = [
            'status' => Order::STATUS_NEW,
            'username' => $request['username'] ?? null,
            'email' => $request['email'] ?? null,
        ];

        if ($user = auth('sanctum')->user()) {
            $params['user_id'] = $user->id;
        }

        DB::transaction(function () use ($request, $params) {
            $order = Order::create($params);

            foreach ($request['catalog_ids'] as $catalog_id) {
                $order->ordersCatalogs()->create([
                    'catalog_id' => $catalog_id
                ]);
            }
        });
    }
}
