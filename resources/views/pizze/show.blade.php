@extends('layouts.app')
  
@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h2> Show Product</h2>
                    </div>
                    <div class="pull-right">
                        <a class="btn btn-primary" href="{{ route('pizza.index') }}"> Back</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        {{ $pizza->name }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Prezzo:</strong>
                        {{ $pizza->price }} €
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Ingredienti:</strong>
                        {{ $pizza->ingrediants }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Extra:</strong>
                        @foreach ($extraIdEsistenti as $item)
                            {{ $item->name }}{{-- 
                        --}}@if (!$loop->last){{--
                        --}},  
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   
@endsection