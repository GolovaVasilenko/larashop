@extends('layouts.app_admin')

@section('content')
    <section class="content-header">
        @component('shop.admin.components.breadcrumbs')
            @slot('parent') Панель управления @endslot
                @slot('active') active @endslot
        @endcomponent
    </section>
@endsection
