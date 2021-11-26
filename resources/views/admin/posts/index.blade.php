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
                  <h6 class="card-title">{{$post->user->name}}</h6>
                  <div class="d-flex justify-content-center">
                    <h6>Ruolo:</h6>
                    @forelse ($post->user->roles as $role)
                      <h6 class="mx-2">{{$role->name}}</h6>
                    @empty
                      <h6>Nessun ruolo assegnato</h6>
                    @endforelse
                  </div>
                  <a href="{{route("admin.posts.show",  $post)}}"><h5 class="card-title text-uppercase">{{$post->post_name}}</h5></a>
                  <h6 class="card-subtitle mb-2 pb-1">Categoria: @if ($post->category) {{$post->category->name}} @else Nessuna categoria @endif</h6>
                  <div class="d-flex justify-content-center">
                    <h6>Tag:</h6>
                    @forelse ($post->tags as $tag)
                      <h6 class="card-title mx-2">{{$tag->name}}</h6>
                    @empty
                      <h6>Il post non ha tag.</h6>
                    @endforelse
                  </div>
                  <h6 class="card-subtitle mb-2 text-muted">{{$post->post_description}}</h6>
                </div>
            </div>
        @endforeach
    </div>

    <div class="d-flex justify-content-center pt-5 ">
      {{$posts->links()}}
    </div>
</div>
@endsection