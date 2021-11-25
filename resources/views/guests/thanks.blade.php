@extends("layouts.app")
@section("content")
<div class="container">
    <div class="row justify-content-center">
        <h1 class="pt-2 text-uppercase">Grazie per averci contattato!</h1>
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
    <div class="row justify-content-center">
        <a href="{{route("guests.home")}}" class="btn btn-success">Torna alla home</a>
    </div>
</div>
@endsection