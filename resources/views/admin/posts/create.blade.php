@extends('layouts.app')

@section("content")
<div class="post container text-center pt-2">
    <h1>Creazione nuovo post:</h1>
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
    <form action="{{route('admin.posts.store')}}" method="POST">
        @csrf
        <div class="form-group">
            <h5 for="date" class="form-h5">Data creazione:</h5>
            <input class="form-control" type="text" placeholder="data" name="published_at"> 
        </div>
        <div class="form-group">
            <h5 for="name" class="form-h5">Titolo Post:</h5>
            <input class="form-control" type="text" placeholder="titolo" name="post_name"> 
        </div>
        <div class="form-group">
            <h5 for="category_id" class="form-h5">Categoria:</h5>
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
                <input class="form-check-input" type="checkbox" id="tag-{{$tag->id}}" value="{{$tag->id}}" name="tags[]">
                <label class="form-check-label mx-3" for="tag-{{$tag->id}}">{{$tag->name}}</label>
                @endforeach
            </div>
        </div>
        <div class="form-group">
            <h5 for="name" class="form-h5">Descrizione:</h5>
            <input class="form-control" type="text" placeholder="descrizione" name="post_description"> 
        </div>
        <div class="form-group">
            <h5 for="name" class="form-h5 mx-1">Testo:</h5>
            <textarea class="form-control" type="text" placeholder="testo" name="content"></textarea>
        </div>
        <div class="pt-2">
            <button type="submit" class="btn btn-success">Aggiungi post</button>
        </div>
    </form>
</div>
@endsection