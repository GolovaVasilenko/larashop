<?php

namespace App\Http\Controllers\Shop\Admin;

use Illuminate\Http\Request;


class MainController extends AdminBaseController
{
    public function index()
    {
        return view('shop.admin.index');
    }
}
