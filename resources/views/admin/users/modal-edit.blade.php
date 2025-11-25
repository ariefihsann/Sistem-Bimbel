<div class="modal fade" id="editUserModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <div class="modal-header bg-warning">
                <h4 class="modal-title text-white">Edit User</h4>

                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <form id="editUserForm" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-body">
                    <div class="mb-3">
                        <label>Name</label>
                        <input id="edit_name" name="name" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Email</label>
                        <input id="edit_email" name="email" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label>Role</label>
                        <select id="edit_role" name="role_id" class="form-control">
                            <option value="1">Admin</option>
                            <option value="2">User</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal">Cancel</button>

                    <button class="btn btn-warning text-white">Update User</button>
                </div>

            </form>

        </div>
    </div>
</div>