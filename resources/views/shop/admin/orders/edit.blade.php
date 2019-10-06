@extends('layouts.app_admin')

@section('content')
    <section class="content-header">
        @component('shop.admin.components.breadcrumbs')
            @slot('title') Заказ № {{ $order->id }} @endslot
            @slot('parent') Главная @endslot
            @slot('active') Заказ № {{ $order->id }} @endslot
        @endcomponent
    </section>

@endsection
