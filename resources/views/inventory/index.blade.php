{{-- Inventory Index Page --}}
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

    .inventory-container {
        width: 85%;
        margin: 0 auto;
        padding: 30px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    .inventory-title {
        font-size: 30px;
        font-weight: 600;
        color: #333;
        margin-bottom: 20px;
    }

    .inventory-table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .inventory-table th, .inventory-table td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    .inventory-table th {
        background-color: #007bff;
        color: white;
    }

    .inventory-table tr:hover {
        background-color: #f1f1f1;
    }

    .inventory-table td a {
        text-decoration: none;
        color: #007bff;
        font-weight: bold;
        transition: color 0.3s;
    }

    .inventory-table td a:hover {
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

<div class="inventory-container">
    <h2 class="inventory-title">Inventory Index</h2>

    <a href="{{ route('inventory.create') }}" class="add-button">Add New Item</a>

    <table class="inventory-table">
        <thead>
            <tr>
                <th>Item Name</th>
                <th>Category</th>
                <th>Stock Quantity</th>
                <th>Price</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($inventoryItems as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->category->name }}</td>
                <td>{{ $item->stock_quantity }}</td>
                <td>${{ number_format($item->price, 2) }}</td>
                <td>
                    <a href="{{ route('inventory.edit', $item->id) }}">Edit</a> |
                    <a href="{{ route('inventory.destroy', $item->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item->id }}').submit();">Delete</a>

                    <form id="delete-form-{{ $item->id }}" action="{{ route('inventory.destroy', $item->id) }}" method="POST" style="display: none;">
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
