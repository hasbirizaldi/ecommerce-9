@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <h3 class="card-header text-center bg-primary text-white">Edit Product</h3>
                <div class="card-body">
                    <form action="{{ route('update_product', $product) }}" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" name="name" placeholder="Name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ $product->name }}" autofocus>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label>Description</label>
                            <input type="text" name="description" placeholder="Description" class="form-control  @error('description') is-invalid @enderror"
                            value="{{ $product->description }}">
                            @error('description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group  mb-3">
                            <label>Price</label>
                            <input type="number" name="price" placeholder="Price" class="form-control @error('price') is-invalid @enderror"
                            value={{ $product->price }}>
                            @error('price')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group  mb-3">
                            <label>Stock</label>
                            <input type="number" name="stock" placeholder="Stock" class="form-control @error('stock') is-invalid @enderror"
                            value={{ $product->stock }}>
                            @error('stock')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group  mb-3">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror">
                            @error('image')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <button type="submit" class="btn btn-sm btn-primary mt-3">Update Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
