@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <h3>{{ $product->name }}</h3>
        <p class="text-muted">{{ $product->description }}</p>
        <p class="fw-bold">${{ number_format($product->price, 2) }}</p>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


        <form action="{{ route('products.buy', $product->id) }}" method="POST">
            @csrf
            <script src="https://checkout.stripe.com/checkout.js"
                    class="stripe-button"
                    data-key="{{ env('STRIPE_KEY') }}"
                    data-amount="{{ $product->price * 100 }}"
                    data-name="{{ $product->name }}"
                    data-description="{{ $product->description }}"
                    data-currency="usd">
            </script>
        </form>
    </div>
</div>
@endsection
