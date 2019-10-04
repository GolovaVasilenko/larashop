<?php

namespace App\Http\Controllers\Shop\Admin;

use Illuminate\Http\Request;
use MetaTag;

class MainController extends AdminBaseController
{
    public function index()
    {
        MetaTag::setTags(['title' => 'Админ панел сайта']);
        return view('shop.admin.index');
    }
}
