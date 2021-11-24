@extends('layouts.app')

@section("content")
<div class="post container text-center pt-2">
    <h1>Modifica post:</h1>
</div>
@if ($errors->any())
    <div class="alert alert-danger container">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<div class="post container text-center pt-5">
    <form action="{{route('admin.posts.update', $post)}}" method="POST" enctype="multipart/form-data">
        @method("PUT")
        @csrf
        <div class="form-group">
            <label for="date" class="form-label">Aggiornamento data:</label>
            <input class="form-control" type="text" placeholder="data" name="published_at" value="{{$post->published_at}}"> 
        </div>
        <div class="form-group">
            <label for="name" class="form-label">Titolo Post:</label>
            <input class="form-control" type="text" placeholder="titolo" name="post_name" value="{{$post->post_name}}"> 
        </div>
        <div class="form-group">
            <label for="category_id" class="form-label">Categoria:</label>
            <select name="category_id" id="category_id">
                <option>Senza categoria</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <h5 for="tag" class="h5">Tag:</h5>
            <div class="form-check form-check-inline">
                @foreach ($tags as $tag)
                <input class="form-check-input" type="checkbox" id="tag-{{$tag->id}}" value="{{$tag->id}}" name="tags[]"
                @if(in_array($tag->id, old("tags", $tagIds ? $tagIds : []))) checked @endif)>
                <label class="form-check-label mx-3" for="tag-{{$tag->id}}">{{$tag->name}}</label>
                @endforeach
            </div>
        </div>
        <div class="form-group">
            <h5 for="image">Immagine:</h5>
            <input class="form-control" type="file" placeholder="image" id="image" name="image" value="{{$post->image}}">
        </div>
        <div class="form-group">
            <label for="name" class="form-label">Descrizione:</label>
            <input class="form-control" type="text" placeholder="descrizione" name="post_description" value="{{$post->post_description}}"> 
        </div>
        <div class="form-group">
            <label for="name" class="form-label mx-1">Testo:</label>
            <textarea class="form-control" type="text" placeholder="testo" name="content" rows="10">{{$post->content}}</textarea>
        </div>
        <div class="pt-2">
            <button type="submit" class="btn btn-success">Modifica post</button>
        </div>
    </form>
</div>
@endsection