@extends('layouts.dashboard-layout')

@section('content')

<h1 class="mb-4">Admin Dashboard</h1>

<div class="row">
    <div class="col-md-4">
        <div class="card p-3 shadow-sm">
            <h5>Total Users</h5>
            <h3>{{ $totalUsers }}</h3>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3 shadow-sm">
            <h5>Total Modules</h5>
            <h3>{{ $totalModules }}</h3>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card p-3 shadow-sm">
            <h5>Total Materi</h5>
            <h3>{{ $totalMateri }}</h3>
        </div>
    </div>
</div>

@endsection
