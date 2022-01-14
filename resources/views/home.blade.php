@extends('layouts.app')

@section('content')
    <div class="container">
        
        <div class="row">
            <div class="col my-5">
                <form action="{{route('filtroName')}}" method="POST">
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">Trova pizza</label>
                      <input type="text" name="namePizza" class="form-control my-3" id="exampleInputEmail1">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
            </div>
        </div>
        
        <div class="row">
            <div class="col d-flex justify-content-between flex-wrap">
                @foreach ($ElencoPizze as $pizze)
                    <form action="{{ route('ordine.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="pizza_id" value="{{$pizze->id}}">
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
                                                <input class="form-check-input" name="extra_id[]" type="checkbox" value="{{$extra->id}}" id="flexCheckDefault">
                                                <label class="form-check-label" for="flexCheckDefault">
                                                    {{$extra->name}}
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label pt-3 text-center" for="">Quantità</label>
                                    <input class="form-input" placeholder="0" name="quantity" type="number">
                                </div>    
                                <button type="submit" href="#" class="btn btn-primary my-4">Aggiungi Carrello</button>
                            </div>
                        </div>
                    </form>                
                @endforeach     
            </div>
        </div>
        {!! $ElencoPizze->links() !!} 
        <div class="row">
            <div class="col">
                <h3 class="my-4">Totale carrello: {{$righeOrdine}}</h3>
            </div>
        </div>
    </div>
@endsection
