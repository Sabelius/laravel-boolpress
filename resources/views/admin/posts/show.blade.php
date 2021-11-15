@extends('layouts.app')


@section("content")
<div class="container">
    <div class="row justify-content-center">
        <h1 class="pt-2 text-uppercase">Post:</h1>
    </div>
    <div class="row justify-content-center">
        <div class="text-center card m-2 col-12" style="width: 18rem;">
            <div class="card-body">
                <h6 class="card-title"><em>{{$post->author}}</em></h6>
                <h6 class="card-title">Scritto il : {{$post->post_creation_date}}</h6>
                <h5 class="card-title text-uppercase">{{$post->post_name}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{$post->post_description}}</h6>
                <p class="card-text">{{$post->content}}</p>
            </div>
        </div>
        <div class="travel-main-page pt-2 d-flex justify-content-center">
            <a href="{{route("admin.posts.index")}}" class="btn btn-success">Torna alla pagina dei viaggi</a>
        </div>
    </div>
</div>
@endsection