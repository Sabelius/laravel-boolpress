@extends('layouts.app')


@section("content")
<div class="container">
    <div class="row justify-content-center">
        <h1 class="pt-2 text-uppercase">Post:</h1>
    </div>
    <div class="row justify-content-center">
        <div class="text-center card m-2 col-12" style="width: 18rem;">
            <div class="card-body">
                <h6 class="card-title"><em>{{$post->user->name}}</em></h6>
                @forelse ($post->user->roles as $role)
                    <h6>{{$role->name}}</h6>
                @empty
                    Nessun ruolo assegnato
                @endforelse
                <h6 class="card-title">Scritto il : {{$post->published_at}}</h6>
                <h6 class="card-title">@if ($post->category) {{$post->category->name}} @else Nessuna categoria @endif</h6>
                {{-- <h6 class="card-title">{{$post->tags()->name}}</h6> --}}
                @forelse ($post->tags as $tag)
                  <h6 class="card-title">{{$tag->name}}</h6>
                @empty
                    <h6>Il post non ha tag.</h6>
                @endforelse
                <h5 class="card-title text-uppercase pt-2">{{$post->post_name}}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{$post->post_description}}</h6>
                <p class="card-text">{{$post->content}}</p>
            </div>
        </div>
    </div>
    <div class="travel-main-page pt-2 d-flex justify-content-center">
        <a href="{{route("admin.posts.index")}}" class="btn btn-success">Torna alla pagina dei post</a>
    </div>
    <div class="travel-main-page pt-2 d-flex justify-content-center">
        <a href="{{route("admin.posts.edit", $post)}}" class="btn btn-success">Modifica post</a>
    </div>
    <div class="container pt-2 text-center">
        <form id="form-delete" action="{{route('admin.posts.destroy', $post)}}" method="POST">
            @method("delete")
            @csrf
            <button type="submit" class="btn btn-danger">Cancella post</button>
        </form>
    </div>
</div>
@endsection
