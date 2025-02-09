{{-- Admin Dashboard --}}
@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <h2>Admin Dashboard</h2>
    <ul>
        <li><a href="{{ route('inventory.index') }}">Manage Inventory</a></li>
        <li><a href="{{ route('sales.index') }}">View Sales</a></li>
        <li><a href="{{ route('expenses.index') }}">Manage Expenses</a></li>
        <li><a href="{{ route('users.index') }}">Manage Users</a></li>
    </ul>
</div>
@endsection