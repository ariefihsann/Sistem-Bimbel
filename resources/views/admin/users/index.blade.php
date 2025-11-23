@extends('layouts.admin-layout')

@section('title', 'Data Users')

@section('content')
<h3 class="fw-bold mb-4">Data Users</h3>

<a class="btn btn-primary mb-3" href="{{ route('admin.users.create') }}">
    Tambah User
</a>

<div class="card p-3 shadow">
    {{-- table user --}}
</div>
@endsection