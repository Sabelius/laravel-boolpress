@extends('layouts.app')

@section("content")
<div class="post container text-center pt-2">
    <h1>Modifica post:</h1>
</div>
<div class="post container text-center pt-5">
    <form action="{{route('admin.posts.update', $post)}}" method="POST">
        @method("PUT")
        @csrf
        <div class="form-group">
            <label for="name" class="form-label">Data creazione:</label>
            <input class="form-control" type="text" placeholder="data" name="post_creation_date" value="{{$post->published_at}}"> 
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