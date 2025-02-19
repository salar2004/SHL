{{-- Goods Index Page --}}
@extends('layouts.app')

@section('content')
<style>
    /* General styles */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f7fb;
        color: #333;
    }

    .goods-container {
        width: 85%;
        margin: 0 auto;
        padding: 30px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .goods-title {
        font-size: 30px;
        font-weight: 600;
        color: #333;
        margin-bottom: 20px;
    }

    .goods-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .goods-table th, .goods-table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .goods-table th {
        background-color: #007bff;
        color: white;
    }

    .goods-table tr:hover {
        background-color: #f1f1f1;
    }

    .goods-table td a {
        text-decoration: none;
        color: #007bff;
        font-weight: bold;
        transition: color 0.3s;
    }

    .goods-table td a:hover {
        color: #0056b3;
    }

    .add-button {
        display: inline-block;
        padding: 10px 20px;
        background-color: #28a745;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        margin-top: 20px;
        transition: background-color 0.3s;
    }

    .add-button:hover {
        background-color: #218838;
    }
</style>

<div class="goods-container">
    <h2 class="goods-title">Goods Index</h2>

    <a href="{{ route('goods.create') }}" class="add-button">Add New Good</a>

    <table class="goods-table">
        <thead>
            <tr>
                <th>Good Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($goods as $good)
            <tr>
                <td>{{ $good->name }}</td>
                <td>{{ $good->category->name }}</td>
                <td>${{ number_format($good->price, 2) }}</td>
                <td>
                    <a href="{{ route('goods.edit', $good->id) }}">Edit</a> |
                    <a href="{{ route('goods.destroy', $good->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $good->id }}').submit();">Delete</a>

                    <form id="delete-form-{{ $good->id }}" action="{{ route('goods.destroy', $good->id) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
