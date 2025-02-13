{{-- Employee Dashboard --}}
@extends('layouts.app')
@section('content')
<div class="container mt-5">
    <h2>Employee Dashboard</h2>
    <ul>
        <li><a href="{{ route('sales.index') }}">Record Sales</a></li>
        <li><a href="{{ route('inventory.index') }}">Check Inventory</a></li>
    </ul>
</div>
@endsection