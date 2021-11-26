@extends("layouts.app")
@section("content")
<div class="container">
    <div class="row justify-content-center">
        <h1 class="pt-2 text-uppercase">Contact Us:</h1>
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
        <div class="text-center card m-2 col-12" style="width: 18rem;">
            <div class="card-body">
                <form action="{{route('guests.sender')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <h5 for="name" class="form-h5">Nome:</h5>
                        <input class="form-control" type="text" placeholder="Inserisci nome" name="name"> 
                    </div> 
                    <div class="form-group">
                        <h5 for="email_address" class="form-h5">Indirizzo Email:</h5>
                        <input class="form-control" type="text" placeholder="Inserisci indirizzo email" name="email_address"> 
                    </div> 
                    <div class="form-group">
                        <h5 for="message" class="form-h5">Messaggio:</h5>
                        <textarea class="form-control" type="text" placeholder="Inserisci messaggio" name="message"></textarea>
                    </div>
                    <div class="d-flex justify-content-around">
                        <button type="submit" class="btn btn-success">Invia</button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection