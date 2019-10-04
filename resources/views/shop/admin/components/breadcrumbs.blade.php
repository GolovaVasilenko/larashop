@isset($title) <h2>{{ $title }}</h2> @endisset

    <ol class="breadcrumb">
        <li><a href="{{ 'shop.admin.index.index' }}"><i class="fa fa-dashboard"></i>{{ $parent }}</a></li>
        <li><i class="active"></i>{{ $active }}</li>
    </ol>
