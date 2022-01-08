@extends('layouts.app')
 
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="row my-3">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('pizza.create') }}"> Create New Product</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <table class="table table-bordered">
                            <tr>
                                <th>Nome</th>
                                <th>Prezzo €</th>
                                <th>Ingredienti</th>
                                <th width="280px">Action</th>
                            </tr>
                            @foreach ($pizze as $pizza)
                                <tr>
                                    <td>{{ $pizza->name }}</td>
                                    <td>{{ $pizza->price }}</td>
                                    <td>{{ $pizza->ingrediants }}</td>
                                    <td>
                                        <form action="{{ route('pizza.destroy', $pizza->id) }}" method="POST">
                                            <a class="btn btn-info" href="{{ route('pizza.show', $pizza->id) }}">Show</a>
                                            <a class="btn btn-primary" href="{{ route('pizza.edit', $pizza->id) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"  class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {!! $pizze->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection