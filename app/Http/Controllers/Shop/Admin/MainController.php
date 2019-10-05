<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Repositories\Admin\MainRepository;
use Illuminate\Http\Request;
use MetaTag;

class MainController extends AdminBaseController
{
    public function index()
    {
        MetaTag::setTags(['title' => 'Админ панел сайта']);

        $countOrders = MainRepository::getCountOrders();
        $countProducts = MainRepository::getCountProducts();
        $countUsers = MainRepository::getCountUsers();
        $countCategories = MainRepository::getCountCategories();

        return view('shop.admin.index', [
            'countOrders'     => $countOrders,
            'countProducts'   => $countProducts,
            'countUsers'      => $countUsers,
            'countCategories' => $countCategories,
        ]);
    }
}
