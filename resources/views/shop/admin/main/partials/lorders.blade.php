<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Последние заказы</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                <i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body" style="">
        <div class="table-responsive">
            <table class="table no-margin">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Покупатель</th>
                    <th>Статус</th>
                    <th>Сумма</th>
                </tr>
                </thead>
                <tbody>
                @foreach($lastOrders as $order)
                    <tr>
                        <td><a href="">{{ $order->id }}</a></td>
                        <td><a href="">{{ ucfirst($order->name) }}</a></td>
                        <td>
                            @if($order->status == 0)
                                <span class="label label-success">Новый</span>
                            @elseif($order->status == 1)
                                <span class="label label-info">Завершен</span>
                            @elseif($order->status == 2)
                                <span class="label label-danger">Удален</span>
                            @endif
                        </td>
                        <td>
                            <div class="sparkbar" data-color="#00a65a">{{ $order->sum }}</div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!-- /.box-body -->
    <div class="box-footer clearfix" >
        <a href="" class="btn btn-info btn-sm btn-flat pull-left">Все заказы</a>
    </div>
    <!-- /.box-footer-->
</div>
