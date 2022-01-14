@extends('layouts.app')
   
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2>Edit pizza</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('pizza.index') }}"> Back</a>
                    </div>
                </div>
            </div>        
            <form action="{{ route('pizza.update',$pizza->id) }}" method="POST">
                @csrf
                @method('PUT')  
                 <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <input type="text" name="name" value="{{ $pizza->name }}" class="form-control" placeholder="Name">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Prezzo:</strong>
                            <input type="text" name="price" value="{{ $pizza->price }}" class="form-control" placeholder="Name">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Ingredienti:</strong>
                            <textarea class="form-control" style="height:150px" name="ingrediants" placeholder="Detail">{{ $pizza->ingrediants }}</textarea>
                        </div>
                    </div>
                    <h5 class="my-3">Extra</h5>
                    <div class="row">
                        <div class="col">
                            @foreach ($elenchiExtra as $elencoExtra)
                            <div class="form-check">
                                <input {{ in_array( $elencoExtra->id, $extraIdEsistenti ) ? 'checked' : '' }} type="checkbox" value="{{$elencoExtra->id}}" name="extra_id[]" id="elencoExtra">
                                <label class="form-check-label" for="elencoExtra">
                                    {{$elencoExtra->name}}
                                </label>
                            </div>
                            @endforeach
                        </div>
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