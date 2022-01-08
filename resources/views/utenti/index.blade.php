@extends('layouts.app')
 
@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col">
                        <table class="table table-bordered">
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Livello</th>
                                <th width="280px">Action</th>
                            </tr>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->access_level }}</td>
                                    <td>
                                        <form action="{{ route('utente.destroy', $user->id) }}" method="POST">
                                            <a class="btn btn-primary" href="{{ route('utente.edit', $user->id) }}">Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"  class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                        {!! $users->links() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection