@extends('layouts.app')

@section("content")
<div class="post container text-center pt-2">
    <h1>Creazione nuovo post:</h1>
</div>
<div class="comic container text-center pt-5">
    <form action="{{route('admin.posts.store')}}" method="POST">
        @csrf
        <div class="pt-2">
            <label for="name" class="form-label">Autore:</label>
            <input type="text" placeholder="nome autore" name="author">
        </div>
        <div class="pt-2">
            <label for="name" class="form-label">Data creazione:</label>
            <input type="text" placeholder="data" name="post_creation_date"> 
        </div>
        <div class="pt-2">
            <label for="name" class="form-label">Titolo Post:</label>
            <input type="text" placeholder="titolo" name="post_name"> 
        </div>
        <div class="pt-2">
            <label for="name" class="form-label">Descrizione:</label>
            <input type="text" placeholder="descrizione" name="post_description"> 
        </div>
        <div class="pt-2">
            <label for="name" class="form-label">Testo:</label>
            <input type="text" placeholder="testo" name="content"> 
        </div>
        <div class="pt-2">
            <button type="submit" class="btn btn-success">Aggiungi post</button>
        </div>
    </form>
</div>
@endsection