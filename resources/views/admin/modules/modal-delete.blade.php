<div class="modal fade" id="deleteModuleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title">Hapus Modul</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    onclick="event.stopPropagation()"></button>
            </div>

            <form id="deleteModuleForm" action="" method="POST" onsubmit="event.stopPropagation();">
                @csrf
                @method('DELETE')

                <div class="modal-body" onclick="event.stopPropagation()">
                    <p class="mb-0">Yakin ingin menghapus modul ini?</p>
                </div>

                <div class="modal-footer" onclick="event.stopPropagation()">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        onclick="event.stopPropagation()">
                        Batal
                    </button>

                    <button type="submit" class="btn btn-danger" onclick="event.stopPropagation()">
                        Hapus
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>