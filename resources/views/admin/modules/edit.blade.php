@extends('layouts.admin-layout')

@section('content')

<h4>Edit Module</h4>

<div class="card mt-3">
    <div class="card-body">

        <form action="{{ route('modules.update', $module->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Judul Module</label>
                <input type="text" name="title" value="{{ $module->title }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="description" class="form-control" rows="4">{{ $module->description }}</textarea>
            </div>

            <div class="mb-3">
                <label>Urutan</label>
                <input type="number" name="order" value="{{ $module->order }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Gambar (opsional)</label>
                <input type="file" name="image" class="form-control">

                @if ($module->image)
                <img src="{{ asset('storage/' . $module->image) }}" width="80" class="mt-2">
                @endif
            </div>

            <button class="btn btn-success">Update</button>
            <a href="{{ route('modules.index') }}" class="btn btn-secondary">Kembali</a>

        </form>

    </div>
</div>

@endsection