@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col d-flex justify-content-between flex-wrap">
            @foreach ($ElencoPizze as $pizze)
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="https://d1e3z2jco40k3v.cloudfront.net/-/media/drog19/recipe-images/pizza-margherita-con-basilico_2000.jpg?rev=c0ef67e2f4684f9dbbcf1a54188cc5b0&vd=20200707T052020Z&hash=097A78228B5887F0247E9EFAB27CE958" alt="Card image cap">
                    <div class="card-body p-1 text-center">
                        <h2 class="card-title p-3 text-center">{{$pizze->name}}</h2>
                        <h5 class="card-title p-1 text-center">Ingredienti</h5>
                        <p class="card-text text-center">{{$pizze->ingrediants}}.</p>
                        <h5 class="p-1 text-center">Extra</h5>
                        <div class="row">
                            <div class="card-text">
                                @foreach ($ElencoExtra as $extra)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            {{$extra->name}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label pt-3 text-center" for="">Quantità</label>
                            <input class="form-input" placeholder="0" type="number">
                        </div>    

                        <a href="#" class="btn btn-primary my-4">Aggiungi Carrello</a>
                    </div>
                </div>
            @endforeach     
        </div>
    </div>
</div>
@endsection


{{-- <div class="row justify-content-center">
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
</div> --}}