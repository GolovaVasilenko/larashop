<div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Последние добавленные товары</h3>

        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                <i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <ul class="products-list product-list-in-box">
            @foreach($lastProducts as $product)
                <li class="item">
                    <div class="product-img" >
                    @empty($product->img)
                       <img src="{{ asset('images/no_image.png') }}" alt="" />
                    @else
                       <img src="{{ asset('uploads/single/' . $product->img) }}" height="50" alt="" />
                    @endempty
                    </div>
                    <div class="product-info">
                        <a href="" class="product-title">{{ $product->title }}
                        <span class="label label-warning pull-right">{{ $product->price }} </span></a>
                        <span class="product-description">{{ $product->description }}</span>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    <!-- /.box-body -->
    <div class="box-footer clearfix" >
        <a href="" class="btn btn-info btn-sm btn-flat pull-left">Все продукты</a>
    </div>
    <!-- /.box-footer-->
</div>
