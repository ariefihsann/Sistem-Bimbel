<div class="modal fade" id="createModuleModal">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header bg-primary text-white">
                <h4 class="modal-title">Tambah Modul</h4>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('admin.modules.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="modal-body">

                    <div class="form-group">
                        <label>Judul Modul</label>
                        <input name="title" class="form-control" required>
                    </div>

                    <div class="form-group mt-2">
                        <label>Deskripsi</label>
                        <textarea name="description" class="form-control"></textarea>
                    </div>

                    <div class="form-group mt-2">
                        <label>Urutan</label>
                        <input name="order" type="number" class="form-control" required>
                    </div>

                    <div class="form-group mt-2">
                        <label>Gambar (opsional)</label>
                        <input name="image" type="file" class="form-control">
                    </div>

                </div>

                <div class="modal-footer">
                    <button class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary">Simpan</button>
                </div>

            </form>

        </div>
    </div>
</div>