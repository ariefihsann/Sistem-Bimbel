@extends('layouts.admin-layout')

@section('content')

<h4>Tambah Module</h4>

<div class="card mt-3">
    <div class="card-body">

        <form action="{{ route('modules.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label>Judul Module</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="description" class="form-control" rows="4"></textarea>
            </div>

            <div class="mb-3">
                <label>Urutan</label>
                <input type="number" name="order" class="form-control" min="1" required>
            </div>

            <div class="mb-3">
                <label>Gambar (opsional)</label>
                <input type="file" name="image" class="form-control">
            </div>

            <button class="btn btn-success">Simpan</button>
            <a href="{{ route('modules.index') }}" class="btn btn-secondary">Kembali</a>

        </form>

    </div>
</div>

@endsection