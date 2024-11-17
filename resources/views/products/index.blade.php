@extends('layouts.app')

@section('content')
<div class="row">
    @foreach($products as $product)
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <p class="card-text">${{ number_format($product->price, 2) }}</p>
                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Buy Now</a>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
