@extends('front.layouts.master')
@section('title',$article->title)
@section('bg',$article->image)
@section('content')
<?php
use Illuminate\Support\Str;
?>
                     <div class="col-md-9 mx-auto">

                       {{$article->content}}
                         <br><br><br><br><br><br><br>
                         <span class="text-danger">Okunma sayısı: <b>{{$article->hit}}</b></span>
                       </div>

          <div class="col-md-3">
              <div class="card">
                    <div class="card-header">
                        Kategoriler
         </div>
@include('front.widgets.categoryWidget')

          </div>

@endsection
