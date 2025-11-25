@extends('layouts.admin-layout')
@section('title', 'Data Users')

@section('content')

<h3 class="fw-bold mb-4">Data Users</h3>

<button
    class="btn btn-primary"
    data-bs-toggle="modal"
    data-bs-target="#createUserModal">
    Tambah User
</button>




<div class="card shadow-sm p-4 table-container w-100" style="border-radius: 12px;">

    <div class="table-responsive">
        <table id="usersTable" class="table table-bordered table-striped w-100">
            <thead class="text-center align-middle">
                <tr>
                    <th width="60">ID</th>
                    <th width="90">Avatar</th>
                    <th width="200">Name</th>
                    <th width="260">Email</th>
                    <th width="120">Role</th>
                    <th width="170">Created At</th>
                    <th width="170">Updated At</th>
                    <th width="150">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($users as $user)
                <tr class="align-middle">

                    <td class="text-center">{{ $user->id }}</td>

                    <td class="text-center">
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}"
                            width="45" class="rounded-circle">
                    </td>

                    <td class="fw-semibold">{{ $user->name }}</td>

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

                        <!-- EDIT -->
                        <button class="btn btn-warning btn-sm btn-edit-user"
                            data-id="{{ $user->id }}"
                            data-name="{{ $user->name }}"
                            data-email="{{ $user->email }}"
                            data-role="{{ $user->role_id }}"
                            data-bs-toggle="modal"
                            data-bs-target="#editUserModal">
                            <i class="fas fa-edit"></i>
                        </button>

                        <button class="btn btn-sm btn-danger btn-delete-user"
                            data-id="{{ $user->id }}"
                            data-bs-toggle="modal"
                            data-bs-target="#deleteUserModal">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>

                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</div>



<!-- MODALS -->
@push('modals')
@include('admin.users.modal-edit')
@include('admin.users.modal-create')
@include('admin.users.modal-delete')
@endpush



<!-- FORM DELETE -->
<form id="deleteUserForm" method="POST" style="display:none;">
    @csrf
    @method('DELETE')
</form>

@endsection

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



@section('scripts')
<script>
    $(document).ready(function() {

        // Klik Edit
        $(document).on('click', '.btn-edit-user', function() {
            let id = $(this).data('id');
            $('#edit_name').val($(this).data('name'));
            $('#edit_email').val($(this).data('email'));
            $('#edit_role').val($(this).data('role'));

            // Set action form agar ke /admin/users/{id}
            $('#editUserForm').attr('action', '/admin/users/' + id);

            console.log('Edit form action set to:', '/admin/users/' + id);
        });

        // Klik Delete
        $(document).on('click', '.btn-delete-user', function() {
            let id = $(this).data('id');
            if (confirm('Yakin ingin menghapus user ini?')) {
                $('#deleteUserForm').attr('action', '/admin/users/' + id).submit();
            }
        });
    });
</script>
@endsection