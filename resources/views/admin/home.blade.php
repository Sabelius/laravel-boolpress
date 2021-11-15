@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container travel-main-page pt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a href="{{route("admin.posts.index")}}" class="btn btn-success">Vai alla pagina dei post</a>
        </div>
    </div>
</div>
@endsection
