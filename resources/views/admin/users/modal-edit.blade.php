<!-- MODAL EDIT USER -->
<div class="modal fade" id="editUserModal" tabindex="-1" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- HEADER -->
            <div class="modal-header bg-warning">
                <h4 class="modal-title text-white">
                    <i class="fas fa-edit me-2"></i> Edit User
                </h4>

                <button type="button" class="close text-white"
                        data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <!-- FORM -->
            <form id="editUserForm" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-body">

                    <!-- Name -->
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" id="edit_name"
                               name="name" class="form-control"
                               required>
                    </div>

                    <!-- Email -->
                    <div class="form-group mt-2">
                        <label>Email</label>
                        <input type="email" id="edit_email"
                               name="email" class="form-control"
                               required>
                    </div>

                    <!-- Role -->
                    <div class="form-group mt-2">
                        <label>Role</label>
                        <select id="edit_role"
                                name="role_id" class="form-control">
                            <option value="1">Admin</option>
                            <option value="2">User</option>
                        </select>
                    </div>

                </div>

                <!-- FOOTER -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">
                        Cancel
                    </button>

                    <button type="submit"
                            class="btn btn-warning text-white">
                        Update User
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>
