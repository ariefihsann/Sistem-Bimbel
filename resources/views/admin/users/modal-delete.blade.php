 <!-- DELETE CONFIRM MODAL (Bootstrap 5) -->
 <div class="modal fade" id="deleteUserModal" tabindex="-1" aria-hidden="true">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">

             <div class="modal-header bg-danger text-white">
                 <h5 class="modal-title">Hapus User</h5>
                 <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
             </div>

             <form id="deleteUserForm" method="POST">
                 @csrf
                 @method('DELETE')

                 <div class="modal-body">
                     <p class="mb-0">Yakin ingin menghapus user ini?</p>
                 </div>

                 <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                         Batal
                     </button>

                     <button type="submit" class="btn btn-danger">
                         Hapus
                     </button>
                 </div>

             </form>

         </div>
     </div>
 </div>