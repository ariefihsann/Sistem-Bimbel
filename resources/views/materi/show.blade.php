<div class="container">

    <div class="row">

        <!-- Sidebar kiri -->
        <div class="col-md-3">

            <!-- Daftar Modul -->
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

            <!-- Daftar Materi berdasarkan modul -->
            <h4>Daftar Materi</h4>
            <ul>
                @foreach ($module->materis as $m)
                <li>
                    <a href="{{ route('materi.show', ['moduleId' => $module->id, 'materiId' => $m->id]) }}">
                        {{ $m->judul }}
                    </a>
                </li>
                @endforeach
            </ul>

        </div>

        <!-- Konten Kanan -->
        <div class="col-md-9">

            @if(isset($materi))

            <h2 class="materi-title">{{ $materi->judul }}</h2>

            <div class="materi-content">
                {!! $materi->deskripsi !!}
            </div>

            @if($materi->file)
            <p>
                <a href="{{ asset('storage/materi/' . $materi->file) }}" target="_blank">
                    Lihat Lampiran
                </a>
            </p>
            @endif

            @else
            <p>Pilih materi untuk melihat isi.</p>
            @endif

        </div>

    </div>

</div>