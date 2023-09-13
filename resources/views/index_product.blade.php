@extends('layouts.app')

@section('title', 'All Product')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <h3 class="card-header text-center bg-primary text-white">All Product</h3>

                <div class="card-group m-auto">
                    <div class="row">
                        @foreach ($products as $product)
                        <div class="col-md-3">
                            <div class="card m-1 shadow">
                                <img class="card-img-top img-thumbnail" style="height: 200px" src="{{ url('storage/products/'. $product->image) }}" alt="{{ $product->name }}">
                                <div class="card-body">
                                    <h4 class="card-text text-center">{{ $product->name }}</h4>
                                    <p class="card-text text-center">Rp. {{ $product->price }}</p>
                                    <div class="form-group d-flex">
                                        <form action="{{ route('show_product', $product) }}" method="GET">
                                            <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-eye-fill"></i> Show Detail</button>
                                        </form>
                                        @if (Auth::check() && Auth::user()->is_admin)
                                        <form action="{{ route('delete_product', $product) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger ms-2">Delete product</button>
                                        </form>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
