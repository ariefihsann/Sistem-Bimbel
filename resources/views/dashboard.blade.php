@extends('layouts.dashboard-layout')

@section('sidebar')
@include('partials.sidebar-student')
@endsection

@section('content')
<h1>Selamat Datang, {{ auth()->user()->name }}!</h1>
{{-- konten khusus siswa di sini --}}
@endsection