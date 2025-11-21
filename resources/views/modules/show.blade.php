@extends('layouts.admin') {{-- sesuaikan dengan layout milikmu --}}

@section('content')

<div class="container mt-4">

    <!-- Judul Modul -->
    <h3 class="mb-0">{{ $module->title }}</h3>
    <p class="text-muted">{{ $module->description }}</p>

    <hr>

    <!-- List Materi -->
    <h5>Daftar Materi</h5>

    @if($module->materis->count() == 0)
    <div class="alert alert-warning mt-3">
        Belum ada materi pada modul ini.
    </div>
    @endif

    <div class="list-group mt-3">

        @foreach ($module->materis as $materi)
        <a href="#" class="list-group-item list-group-item-action">

            <div class="d-flex justify-content-between">
                <div>
                    <strong>{{ $materi->judul }}</strong>
                    <br>
                    <small class="text-muted">{{ $materi->deskripsi }}</small>
                </div>

                @if($materi->file)
                <span class="badge bg-primary">Download</span>
                @endif
            </div>

        </a>
        @endforeach

    </div>

</div>

@endsection