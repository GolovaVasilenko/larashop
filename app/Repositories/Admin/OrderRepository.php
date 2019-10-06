<?php


namespace App\Repositories\Admin;


use App\Models\Admin\Order;
use App\Repositories\CoreRepository;

class OrderRepository extends CoreRepository
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function getModelClass()
    {
        return Order::class;
    }

    public function getAllOrders($perPage)
    {
        $orders = $this->startConditions()::withTrashed()
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->join('order_products', 'order_products.order_id', 'orders.id')
            ->select(
                'orders.id',
                'orders.user_id',
                'orders.status',
                'orders.created_at',
                'orders.updated_at',
                'orders.currency',
                'users.name',
                \DB::raw('ROUND(SUM(order_products.price), 2) AS sum'))
            ->groupBy('orders.id')
            ->orderBy('orders.status')
            ->orderBy('orders.id')
            ->toBase()
            ->paginate($perPage);

        return $orders;
    }

    public function getListOrders()
    {
        return $this->startConditions()::withTrashed()
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->join('order_products', 'order_products.order_id', 'orders.id')
            ->select(
                'orders.id',
                'orders.user_id',
                'orders.status',
                'orders.created_at',
                'orders.updated_at',
                'orders.currency',
                'users.name',
                \DB::raw('ROUND(SUM(order_products.price), 2) AS sum'))
            ->groupBy('orders.id')
            ->orderBy('orders.status')
            ->orderBy('orders.id', 'DESC')
            ->toBase()
            ->latest();
    }

    public function getOneOrder($order_id)
    {
        return $this->startConditions()::withTrashed()
            ->join('users', 'orders.user_id', '=', 'users.id')
            ->join('order_products', 'order_products.order_id', 'orders.id')
            ->select(
                'orders.*',
                'users.name',
                \DB::raw('ROUND(SUM(order_products.price), 2) AS sum'))
            ->where('orders.id', $order_id)
            ->groupBy('orders.id')
            ->first();
    }

    public function getOrderProducts($order_id)
    {
        return \DB::table('order_products')
            ->where('order_id', $order_id)
            ->get();
    }
}
