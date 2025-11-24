@extends('layouts.admin-layout')

@section('title', 'Data Users')

@section('content')

<h3 class="fw-bold mb-4">Data Users</h3>

<!-- Tombol Create User -->
<button class="btn btn-primary mb-3"
        data-toggle="modal" data-target="#createUserModal">
    Tambah User
</button>

<!-- CARD TABLE USERS -->
<div class="card shadow-sm p-3">
    <table id="usersTable" class="table table-bordered table-striped w-100">
        <thead class="text-center">
            <tr>
                <th>ID</th>
                <th>Avatar</th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th width="150px">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($users as $user)
            <tr>
                <td class="text-center">{{ $user->id }}</td>

                <td class="text-center">
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}"
                         width="40" class="rounded-circle">
                </td>

                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>

                <td class="text-center">
                    @if($user->role_id == 1)
                        <span class="badge bg-danger">Admin</span>
                    @else
                        <span class="badge bg-info">User</span>
                    @endif
                </td>

                <td>{{ $user->created_at }}</td>
                <td>{{ $user->updated_at }}</td>

                <td class="text-center">

                    <!-- BTN EDIT -->
                    <button class="btn btn-sm btn-warning btn-edit-user"
                            data-id="{{ $user->id }}"
                            data-name="{{ $user->name }}"
                            data-email="{{ $user->email }}"
                            data-role="{{ $user->role_id }}"
                            data-toggle="modal"
                            data-target="#editUserModal">
                        <i class="fas fa-edit"></i>
                    </button>

                    <!-- BTN DELETE -->
                    <button class="btn btn-sm btn-danger btn-delete-user"
                            data-id="{{ $user->id }}">
                        <i class="fas fa-trash"></i>
                    </button>

                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>

<!-- MODALS -->
@include('admin.users.modal-create')
@include('admin.users.modal-edit')

<!-- FORM DELETE -->
<form id="deleteUserForm" method="POST" style="display:none;">
    @csrf
    @method('DELETE')
</form>

@endsection


@section('scripts')
<script>
    // EDIT USER
    $(document).on('click', '.btn-edit-user', function() {
        let id = $(this).data('id');
        $('#edit_name').val($(this).data('name'));
        $('#edit_email').val($(this).data('email'));
        $('#edit_role').val($(this).data('role'));

        $('#editUserForm').attr('action', '/admin/users/' + id);
    });

    // DELETE USER
    $(document).on('click', '.btn-delete-user', function() {
        if (confirm('Yakin ingin menghapus user ini?')) {
            let id = $(this).data('id');
            $('#deleteUserForm')
                .attr('action', '/admin/users/' + id)
                .submit();
        }
    });
</script>
@endsection
