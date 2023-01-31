@extends('front.layouts.master')
@section('title',$page->title)
@section('bg',$page->image)
@section('content')
    <?php
    use Illuminate\Support\Str;
    ?>
{{$page->content}}

//
@endsection




<!-- Main Content-->
<main class="mb-4">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">

        </div>
    </div>
</main>
