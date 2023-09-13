
@extends('layouts.app')

@section('title', 'Detail Product')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card shadow">
                <h3 class="card-header text-center bg-primary text-white">Detail Product</h3>
                <div class="card-body">
                    <div class="d-flex justify-content-around">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="">
                                    <img src="{{ url('storage/products/'. $product->image) }}" alt="{{ $product->name }}" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="ms-3">
                                    <h1>{{ $product->name }}</h1>
                                    <h6>{{ $product->description }}</h6>
                                    <h3>Rp. {{ $product->price }}</h3>
                                    <hr>
                                    <p>Stock: {{ $product->stock }} Pcs</p>
                                    @if (!Auth::user()->is_admin)
                                    <form action="{{ route('add_to_cart', $product) }}" method="post">
                                        @csrf
                                        <div class="input-group mb-3">
                                            <input type="number" class="form-control" aria-describedby="basic-addon2"
                                                name="amount" value=1>
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="submit">Add to
                                                    cart</button>
                                            </div>
                                        </div>
                                    </form>
                                    @else
                                        <form action="{{ route('edit_product', $product) }}" method="get">
                                            <button type="submit" class="btn btn-primary">Edit product</button>
                                        </form>
                                    @endif
                                    @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection