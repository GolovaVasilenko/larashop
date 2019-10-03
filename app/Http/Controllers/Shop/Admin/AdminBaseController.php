<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Http\Controllers\Shop\BaseController as MainBaseController;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminBaseController extends MainBaseController
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('status');
    }
}
