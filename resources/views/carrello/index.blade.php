@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col d-flex justify-content-between flex-wrap">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">Quantità</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Extra</th>
                    <th scope="col">Prezzo €</th>
                    <th scope="col">Azioni</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($rigaOrdini as $rigaOrdine)
                        <tr>
                            <th scope="row">{{$rigaOrdine->quantity}}</th>
                            <td>{{$rigaOrdine->pizza->name}}</td>
                            <td>  
                                {{-- $rigaOrdine fare la  relazione e dato che e una collection
                                usare il foreach --}}
                                @foreach ($rigaOrdine->row_order_extras as $rigaOrdneExtra)
                                    {{$rigaOrdneExtra->extra->name}},   
                                @endforeach
                            </td>
                            <td>{{$rigaOrdine->pizza->price}}</td>
                            <td>
                                <form action="{{route('carrello.destroy', $rigaOrdine->id)}}" method="POST">
                                    <a class="btn btn-primary" href="{{ route('carrello.edit', $rigaOrdine->id) }}">Modifica</a>
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-primary" href="">Elimina</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
            <a class="btn btn-primary" href="">Invia</a>
        </div>
    </div>
</div>
@endsection
