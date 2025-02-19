{{-- Expenses Page --}}
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
        background-color: #f9fafb;
        color: #333;
    }

    .expenses-container {
        width: 80%;
        margin: 0 auto;
        padding: 30px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .expenses-title {
        font-size: 28px;
        font-weight: 600;
        margin-bottom: 15px;
        color: #333;
    }

    .expenses-description {
        font-size: 18px;
        color: #555;
        margin-top: 10px;
    }

    /* Adding some spacing and modern design touches */
    .expenses-container p {
        margin-top: 20px;
        line-height: 1.6;
    }
</style>

<div class="expenses-container">
    <h2 class="expenses-title">Expenses Management</h2>
    <p class="expenses-description">Record and manage business expenses.</p>
</div>
@endsection
