@extends('layouts.app')

@section("content")
<div class="post container text-center pt-2">
    <h1>Modifica post:</h1>
</div>
<div class="post container text-center pt-5">
    <form action="{{route('admin.posts.update', $post)}}" method="POST">
        @method("PUT")
        @csrf
        <div class="pt-2">
            <label for="name" class="form-label">Autore:</label>
            <input type="text" placeholder="nome autore" name="author" value="{{$post->url}}">
        </div>
        <div class="pt-2">
            <label for="name" class="form-label">Data creazione:</label>
            <input type="text" placeholder="data" name="post_creation_date" value="{{$post->url}}"> 
        </div>
        <div class="pt-2">
            <label for="name" class="form-label">Titolo Post:</label>
            <input type="text" placeholder="titolo" name="post_name" value="{{$post->url}}"> 
        </div>
        <div class="pt-2">
            <label for="name" class="form-label">Descrizione:</label>
            <input type="text" placeholder="descrizione" name="post_description" value="{{$post->url}}"> 
        </div>
        <div class="pt-2">
            <label for="name" class="form-label">Testo:</label>
            <input type="text" placeholder="testo" name="content" value="{{$post->url}}"> 
        </div>
        <div class="pt-2">
            <button type="submit" class="btn btn-success">Modifica post</button>
        </div>
    </form>
</div>
@endsection