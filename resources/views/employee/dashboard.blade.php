{{-- Employee Dashboard --}}
@extends('layouts.app')

@section('content')
<div class="employee-dashboard-container">
    <h2 class="employee-dashboard-title">Employee Dashboard</h2>
    <div class="employee-dashboard-links">
        <ul class="employee-dashboard-list">
            <li><a href="{{ route('sales.index') }}" class="employee-dashboard-link">Record Sales</a></li>
            <li><a href="{{ route('inventory.index') }}" class="employee-dashboard-link">Check Inventory</a></li>
        </ul>
    </div>
</div>
@endsection
