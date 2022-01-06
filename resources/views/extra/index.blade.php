@extends('layouts.app')
 
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="row my-3">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-right">
                            <a class="btn btn-success" href="{{ route('extras.create') }}"> Create New Product</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <table class="table table-bordered">
                            <tr>
                                <th>Nome</th>
                                <th>Prezzo €</th>
                                <th width="280px">Action</th>
                            </tr>
                            @foreach ($extra as $extras)
                                <tr>
                                    <td>{{ $extras->name }}</td>
                                    <td>{{ $extras->price }}</td>
                                    <td>
                                        <form action="{{ route('extras.destroy', $extras->id) }}" method="POST">
                                            <a class="btn btn-info" href="{{ route('extras.show', $extras->id) }}">Show</a>
                                            <a class="btn btn-primary" href="{{ route('extras.edit', $extras->id) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"  class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection