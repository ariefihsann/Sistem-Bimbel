<!-- MODAL CREATE USER -->
<div class="modal fade" id="createUserModal" tabindex="-1"
     aria-labelledby="createUserModalLabel" aria-hidden="true">

    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header bg-primary">
                <h4 class="modal-title text-white" id="createUserModalLabel">
                    <i class="fas fa-user-plus me-2"></i> Create New User
                </h4>

                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <!-- Modal Form create -->
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf

                <div class="modal-body">

                    <!-- Name -->
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" name="name"
                               class="form-control"
                               required placeholder="Enter user name">
                    </div>

                    <!-- Email -->
                    <div class="form-group mt-2">
                        <label for="email">Email Address</label>
                        <input type="email" name="email"
                               class="form-control"
                               required placeholder="Enter email">
                    </div>

                    <!-- Password -->
                    <div class="form-group mt-2">
                        <label for="password">Password</label>
                        <input type="password" name="password"
                               class="form-control"
                               required placeholder="Enter password">
                    </div>

                    <!-- Role -->
                    <div class="form-group mt-2">
                        <label for="role_id">Role</label>
                        <select name="role_id" class="form-control" required>
                            <option value="1">Admin</option>
                            <option value="2">User</option>
                        </select>
                    </div>

                </div>

                <!-- Modal Footer -->
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default"
                            data-dismiss="modal">
                        <i class="fas fa-times me-1"></i> Cancel
                    </button>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Save User
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
