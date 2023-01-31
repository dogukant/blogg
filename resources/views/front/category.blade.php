@extends('front.layouts.master')
@section('title',$category->name.' Kategorisi')
@section('content')
    <?php
    use Illuminate\Support\Str;
    ?>
    <!-- Main Content-->
    <div class="col-md-9 mx-auto">
        @include('front.widgets.articleList');

    <!-- Divider-->
        <hr class="my-4" />
        <!-- Pager-->
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-header">
                Kategoriler
            </div>
            @include('front.widgets.categoryWidget')
        </div>
    </div>

@endsection
