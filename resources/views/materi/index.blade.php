<h1>Materi untuk Modul: {{ $module->name }}</h1>

<ul>
    @foreach($materi as $item)
    <li>{{ $item->judul }}</li>
    @endforeach
</ul>