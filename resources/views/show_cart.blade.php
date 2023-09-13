@extends('layouts.app')

@section('title', 'Cart')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <h3 class="card-header bg-primary text-white text-center">Cart</h3>

                    <div class="card-body ">
                        @if ($errors->any())
                            @foreach ($errors->all() as $error)
                                <span class="text-danger">{{ $error }}</span>
                            @endforeach
                        @endif

                        @php
                            $total_price = 0;
                        @endphp

                        <div class="card-group m-auto">
                            @foreach ($carts as $cart)
                                <div class="card shadow m-3" style="width: 14rem;">
                                    <img class="card-img-top img-fluid" src="{{ url('storage/products/' . $cart->product->image) }}">
                                    <div class="card-body">
                                        <h5 class="card-title text-center">{{ $cart->product->name }}</h5>
                                        <form action="{{ route('update_cart', $cart) }}" method="POST">
                                            @method('patch')
                                            @csrf
                                            <div class="input-group mb-3 ">
                                                <input type="number" class="form-control" aria-describedby="basic-addon2"
                                                    name="amount" value={{ $cart->amount }}>
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="submit">Update
                                                        amount</button>
                                                </div>
                                            </div>
                                        </form>
                                        <form action="{{ route('delete_cart', $cart) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i> Delete</button>
                                        </form>
                                    </div>
                                </div>
                                @php
                                
                                    $total_price += $cart->product->price * $cart->amount;
                                @endphp
                            @endforeach
                            
                        </div>
                        <div class="d-flex flex-column justify-content-end align-items-end">
                            <p>Total: Rp. {{ $total_price }}</p>
                            <form action="{{ route('checkout') }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-primary"
                                    @if ($carts->isEmpty()) disabled @endif><i class="bi bi-bag-check"></i> Checkout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
