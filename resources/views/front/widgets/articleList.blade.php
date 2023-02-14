<?php
use Illuminate\Support\Str;
?>
@if(count($articles)>0)
@foreach ($articles as $article)
    <!-- Post preview-->
    <div class="post-preview">
        <a href="{{route('single',[$article->slug])}}">
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
@else <h1>Bu kategoriye ait yazı bulunamadı.</h1> @endif
{{$articles->links();}}
