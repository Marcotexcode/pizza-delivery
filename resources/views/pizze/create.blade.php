@extends('layouts.app')
  
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Aggiungi Pizza</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('pizza.index') }}"> Back</a>
                    </div>
                </div>
            </div>       
            <form action="{{ route('pizza.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Prezzo:</strong>
                            <input type="text" name="price" class="form-control">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Ingredienti:</strong>
                            <textarea class="form-control" style="height:150px" name="ingrediants"></textarea>
                        </div>
                    </div>
                    <div class="card-text">
                        @foreach ($extraIndex as $index)
                            <div class="form-check">
                                <input class="form-check-input" name="extra_id[]" value="{{$index->id}}" type="checkbox" id="extraIndex">
                                <label for="extraIndex" class="form-check-label">
                                    {{$index->name}}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    

                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>              
            </form>
        </div>
    </div>
</div>
@endsection