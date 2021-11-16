@extends('layouts.app')

@section("content")
<div class="post container text-center pt-2">
    <h1>Creazione nuovo post:</h1>
</div>
<div class="post container text-center pt-5">
    <form action="{{route('admin.posts.store')}}" method="POST">
        @csrf
        <div class="pt-2">
            <label for="name" class="form-label">Autore:</label>
            <input type="text" placeholder="nome autore" name="author">
        </div>
        <div class="pt-2">
            <label for="name" class="form-label">Data creazione:</label>
            <input type="text" placeholder="data" name="published_at"> 
        </div>
        <div class="pt-2">
            <label for="name" class="form-label">Titolo Post:</label>
            <input type="text" placeholder="titolo" name="post_name"> 
        </div>
        <div class="pt-2">
            <label for="category_id" class="form-label">Categoria:</label>
            <select name="category_id" id="category_id">
                <option>Senza categoria</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="pt-2">
            <label for="name" class="form-label">Descrizione:</label>
            <input type="text" placeholder="descrizione" name="post_description"> 
        </div>
        <div class="pt-2 d-flex justify-content-center">
            <label for="name" class="form-label mx-1">Testo:</label>
            <textarea type="text" placeholder="testo" name="content"></textarea>
        </div>
        <div class="pt-2">
            <button type="submit" class="btn btn-success">Aggiungi post</button>
        </div>
    </form>
</div>
@endsection