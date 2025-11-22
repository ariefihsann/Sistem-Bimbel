@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">

        <!-- Sidebar kiri -->
        <div class="col-md-3">

            <h4>Daftar Modul</h4>
            <ul>
                @foreach ($modules as $mod)
                <li>
                    <a href="{{ route('materi.index', $mod->id) }}">
                        {{ $mod->title }}
                    </a>
                </li>
                @endforeach
            </ul>

            <hr>

            <h4>Daftar Materi</h4>
            <ul>
                @foreach ($materis as $m)

                @php
                $done = auth()->user()->completedMateri->contains($m->id);
                @endphp

                <li class="{{ $activeMateri->id == $m->id ? 'fw-bold text-primary' : '' }}">
                    <a href="{{ route('materi.show', [$module->id, $m->id]) }}">
                        {{ $m->judul }}
                    </a>
                    {!! $done ? "<span class='text-success fw-bold'>✔</span>" : "" !!}
                </li>
                @endforeach
            </ul>

            <hr>

            <div class="card p-3 shadow-sm">
                <h5>Progress Modul</h5>

                <div class="d-flex justify-content-between">
                    <strong>{{ $progress }}%</strong>
                    <span>{{ $completedCount }}/{{ $totalMateri }} Materi</span>
                </div>

                <div class="progress mt-2">
                    <div class="progress-bar bg-success"
                        style="width: {{ $progress }}%">
                    </div>
                </div>

                <div class="mt-2 d-flex justify-content-between">
                    <small>Materi Dikerjakan: {{ $completedCount }}</small>
                    <small>Materi Tersisa: {{ $totalMateri - $completedCount }}</small>
                </div>
            </div>

        </div>

        <!-- Konten Materi -->
        <div class="col-md-9">

            <h2 class="materi-title">{{ $activeMateri->judul }}</h2>

            <div class="materi-content">
                {!! $activeMateri->deskripsi !!}
            </div>

            @if($activeMateri->file)
            <p>
                <a href="{{ asset('storage/materi/' . $activeMateri->file) }}" target="_blank">
                    Lihat Lampiran
                </a>
            </p>
            @endif

            <div class="d-flex justify-content-between mt-4">

                @if ($previousMateri)
                <a href="{{ route('materi.show', [$module->id, $previousMateri->id]) }}"
                    class="btn btn-outline-primary">
                    ← Sebelumnya
                </a>
                @else
                <span></span>
                @endif

                @if ($nextMateri)
                <a href="{{ route('materi.show', [$module->id, $nextMateri->id]) }}"
                    class="btn btn-primary">
                    Selanjutnya →
                </a>
                @endif

            </div>

        </div>

    </div>
</div>

@endsection