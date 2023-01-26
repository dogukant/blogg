@extends('front.layouts.master')
@section('title','Anasayfa')
@section('content')
<?php
use Illuminate\Support\Str;
?>
        <!-- Main Content-->        
               <div class="col-md-9 mx-auto">
                @foreach ($articles as $article)
                    <!-- Post preview-->
                    <div class="post-preview">
                        <a href="{{route('single',$article->slug)}}">
                            <img src="{{$article->image}}" />
                            <h2 class="post-title">{{$article->title}}</h2>
                            <h3 class="post-subtitle">{{str::limit($article->content,50)}}</h3>
                        </a>
                        <p class="post-meta">Kategori:
                            
                            <a href="#!">{{$article->getCategory->name}}</a>
                            
                           <span class="float-end">{{$article->updated_at->diffForHumans()}}</span> </p> 
                    </div>
                    @if(!$loop->last)
                    <hr>
                    @endif
                 @endforeach
        
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