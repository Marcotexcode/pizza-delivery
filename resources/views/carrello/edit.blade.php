@extends('layouts.app')
   
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Modifica pizza</h2>
                </div>
                <div class="pull-right my-3">
                    <a class="btn btn-primary" href="{{ route('carrello.index') }}"> Back</a>
                </div>
            </div>
        </div>   
        <form action="{{ route('carrello.update',$rigaOrdine->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card" style="width: 18rem;">
                <img class="card-img-top" src="https://d1e3z2jco40k3v.cloudfront.net/-/media/drog19/recipe-images/pizza-margherita-con-basilico_2000.jpg?rev=c0ef67e2f4684f9dbbcf1a54188cc5b0&vd=20200707T052020Z&hash=097A78228B5887F0247E9EFAB27CE958" alt="Card image cap">
                <div class="card-body p-1 text-center">
                    <h2 class="card-title p-3 text-center">{{$rigaOrdine->pizza->name}}</h2>
                    <h5 class="card-title p-1 text-center">Ingredienti</h5>
                    <p class="card-text text-center">{{$rigaOrdine->pizza->ingrediants}}</p>
                    <h5 class="p-1 text-center">Extra</h5>
                    <div class="row">
                        <div class="card-text">
                            @foreach ($elencoExtra as $elenco)
                                <div class="form-check">
                                    <input {{ in_array( $elenco->id, $extraIdEsistenti ) ? 'checked' : '' }} class="form-check-input"   name="extra_id[]" type="checkbox" value="{{$elenco->id}}" id="flexCheckDefault">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{$elenco->name}}  
                                    </label>
                                </div>
                            @endforeach
                        </div> 
                    </div>
                    <div class="form-check">
                        <label class="form-check-label pt-3 text-center" for="">Quantità</label>
                        <input class="form-input" name="quantity" value="{{$rigaOrdine->quantity }}" type="number">
                    </div>    
                    <button type="submit" href="#" class="btn btn-primary my-4">Modifica pizza</button>
                </div>
            </div>
        </form>  
    </div>
@endsection