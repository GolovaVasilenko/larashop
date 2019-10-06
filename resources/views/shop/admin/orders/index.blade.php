@extends('layouts.app_admin')

@section('content')
    <section class="content-header">
        @component('shop.admin.components.breadcrumbs')
            @slot('title') Список Заказов @endslot
            @slot('parent') Главная@endslot
            @slot('active') Заказы @endslot
        @endcomponent
    </section>
    <section class="content">
        <div class="row">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Заказы</h3>
                </div>
                <div class="box-body">
                    <table id="orders-table" class="table table-striped table-responsive">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Покупатель</th>
                            <th>Статус</th>
                            <th>Сумма</th>
                            <th>Дата Создания</th>
                            <th>Дата Изменения</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        jQuery(document).ready(function($) {
            $('#orders-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: { url: '{{ route("shop.admin.orders.ajax") }}', type: "POST" },
                columns: [
                    { data: 'id', name: 'orders.id' },
                    { data: 'name', name: 'users.name' },
                    { data: 'status', name: 'orders.status' },
                    { data: 'sum', name: 'sum' },
                    { data: 'created_at', name: 'orders.created_at' },
                    { data: 'updated_at', name: 'orders.updated_at' },
                    { data: 'action', name: 'action', orderable: false }
                ]
            });
        });
    </script>
@endsection
