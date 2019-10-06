<?php

namespace App\Http\Controllers\Shop\Admin;

use App\Repositories\Admin\OrderRepository;
use Illuminate\Http\Request;
use Datatables;


class OrderController extends AdminBaseController
{
    private $orderRepository;

    public function __construct()
    {
        parent::__construct();

        $this->orderRepository = app(OrderRepository::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        \MetaTag::setTags(['title' => 'Список заказов - Админ Панель']);
        return view('shop.admin.orders.index');
    }

    public function ajaxData()
    {
        return datatables()->of($this->orderRepository->getListOrders())
            ->addColumn('action', function($data) {
                $button = '<a href="' . route('shop.admin.orders.edit', ['id' => $data->id]) . '" name="edit"
                        id="' . $data->id . '" title="edit" 
                        class="edit btn btn-info btn-sm">
                        <i class="fa fa-edit"></i></a>';
                $button .= "&nbsp;&nbsp;&nbsp;";
                $button .= '<a href="' . route('shop.admin.orders.destroy', ['id' => $data->id]) . '" name="delete"
                        id="' . $data->id . '" title="delete"
                        class="delete btn btn-danger btn-sm remove-item-js">
                        <i class="fa fa-times"></i></a>';
                return $button;
            })
            ->editColumn('status', function($data) {
                if($data->status == 0) {
                    $html = 'Новый';
                } else if($data->status == 1) {
                    $html = 'Завершен';
                } else {
                    $html = 'Удален';
                }
                return $html;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = $this->orderRepository->getById($id);
        if(!$item) {
            abort(404);
        }

        \MetaTag::setTags(['title' => "Заказ № {$item->id} - Админ Панель"]);

        $order = $this->orderRepository->getOneOrder($item->id);
        $orderProducts = $this->orderRepository->getOrderProducts($item->id);

        return view('shop.admin.orders.edit', [
            'orderProducts' => $orderProducts,
            'order'         => $order,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
