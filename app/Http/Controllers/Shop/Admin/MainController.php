<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Repositories\Admin\MainRepository;
use App\Repositories\Admin\OrderRepository;
use App\Repositories\Admin\ProductRepository;
use Illuminate\Http\Request;
use MetaTag;

class MainController extends AdminBaseController
{
    private $orderRepository;
    private $productRepository;

    public function __construct()
    {
        parent::__construct();

        $this->orderRepository = app(OrderRepository::class);
        $this->productRepository = app(ProductRepository::class);
    }

    public function index()
    {
        $perPageOrders = 8;
        $perPageProducts = 6;

        MetaTag::setTags(['title' => 'Админ панел сайта']);

        $countOrders = MainRepository::getCountOrders();
        $countProducts = MainRepository::getCountProducts();
        $countUsers = MainRepository::getCountUsers();
        $countCategories = MainRepository::getCountCategories();

        $lastOrders = $this->orderRepository->getAllOrders($perPageOrders);
        $lastProducts = $this->productRepository->getLastProducts($perPageProducts);

        return view('shop.admin.main.index', [
            'countOrders'     => $countOrders,
            'countProducts'   => $countProducts,
            'countUsers'      => $countUsers,
            'countCategories' => $countCategories,
            'lastOrders'      => $lastOrders,
            'lastProducts'    => $lastProducts,
        ]);
    }
}
