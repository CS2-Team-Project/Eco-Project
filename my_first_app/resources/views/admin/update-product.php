@extends('admin.layout')

@section('content')
<h1>Edit Product: {{ $product->name }}</h1>

@if(session('success'))
    <p class="alert alert-success">{{ session('success') }}</p>
@endif

<form action="{{ route('admin.product.update', $product->id) }}" method="POST">
    @csrf
    <label>Stock (S):</label>
    <input type="number" name="stock_s" value="{{ $product->stock_s }}" min="0">

    <label>Stock (M):</label>
    <input type="number" name="stock_m" value="{{ $product->stock_m }}" min="0">

    <label>Stock (L):</label>
    <input type="number" name="stock_l" value="{{ $product->stock_l }}" min="0">

    <button type="submit">Update Product</button>
</form>

<a href="{{ route('admin.product') }}">Back to Products</a>
@endsection