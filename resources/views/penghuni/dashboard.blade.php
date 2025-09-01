@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Penghuni Dashboard</div>

                <div class="card-body">
                    <h2>Welcome, {{ Auth::user()->name }}!</h2>
                    <p>You are logged in as a Penghuni.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
