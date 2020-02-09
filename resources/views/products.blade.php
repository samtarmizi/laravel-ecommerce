@extends('layout')

@section('title', 'Products')
@section('content')
        <div class="row">
            @foreach($products as $product)
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <div class="thumbnail">
                        <img src="{{ $product->photo }}" width="150" height="150">
                        <div class="caption">
                            <h4>{{ $product->name }}</h4>
                            <p>{{ $product->description }}</p>
                            <p><strong>Price: </strong> {{ $product->price }}$</p>
                            <p class="btn-holder"><a href="{{ url('add-to-cart/'.$product->id) }}" class="btn btn-warning btn-block text-center" role="button">Add to cart</a> </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
@endsection
