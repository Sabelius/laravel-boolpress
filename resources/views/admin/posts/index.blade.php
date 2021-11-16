@extends('layouts.app')


@section("content")
<div class="container">
    <div class="row justify-content-center">
        <h1 class="pt-2 text-uppercase">Posts:</h1>
    </div>
    <div class="row travel-main-page p-3 justify-content-center">
        <a href="{{route("admin.posts.create")}}">Crea nuovo post</a>
    </div>
    <div class="row justify-content-center">
        @foreach ($posts as $post)
            <div class="text-center card m-2" style="width: 18rem;">
                <div class="card-body">
                  <h6 class="card-title">{{$post->author}}</h6>
                  <a href="{{route("admin.posts.show",  $post)}}"><h5 class="card-title text-uppercase">{{$post->post_name}}</h5></a>
                  <h6 class="card-subtitle mb-2 text-muted pb-2">@if ($post->category) {{$post->category->name}} @else Nessuna categoria @endif</h6>
                  <h6 class="card-subtitle mb-2 text-muted">{{$post->post_description}}</h6>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection