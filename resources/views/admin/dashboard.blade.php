{{-- Admin Dashboard --}}
@extends('layouts.app')

@section('content')
<div class="dashboard-container">
    <h2 class="dashboard-title">Admin Dashboard</h2>
    <div class="dashboard-links">
        <ul class="dashboard-list">
            <li><a href="{{ route('inventory.index') }}" class="dashboard-link">Manage Inventory</a></li>
            <li><a href="{{ route('sales.index') }}" class="dashboard-link">View Sales</a></li>
            <li><a href="{{ route('expenses.index') }}" class="dashboard-link">Manage Expenses</a></li>
            <li><a href="{{ route('users.index') }}" class="dashboard-link">Manage Users</a></li>
        </ul>
    </div>
</div>
@endsection
