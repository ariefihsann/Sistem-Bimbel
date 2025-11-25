@extends('layouts.admin')

@section('content')

<div class="content-wrapper p-4">

    <h3 class="fw-bold mb-4">Manajemen Modul</h3>

    <!-- ERROR ALERT -->
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="row">
        @foreach ($modules as $module)
        <div class="col-md-4 mb-4">
            <div class="course-card">

                <div class="course-icon">
                    <i class="fas fa-laptop-code"></i>
                </div>

                <div class="course-content">
                    <h6>{{ $module->title }}</h6>
                    <p class="small text-muted">{{ $module->description }}</p>
                </div>

                <div class="d-flex justify-content-end p-2">

                    <!-- EDIT MODULE -->
                    <button class="btn btn-warning btn-sm btn-edit-module"
                        data-id="{{ $module->id }}"
                        data-title="{{ $module->title }}"
                        data-description="{{ $module->description }}"
                        data-order="{{ $module->order }}"
                        data-bs-toggle="modal"
                        data-bs-target="#editModuleModal">
                        <i class="fas fa-edit"></i>
                    </button>

                    <!-- DELETE MODULE -->
                    <button class="btn btn-danger btn-sm ms-2 btn-delete-module"
                        data-id="{{ $module->id }}">
                        <i class="fas fa-trash"></i>
                    </button>

                </div>

            </div>
        </div>
        @endforeach
    </div>

    <!-- CREATE BUTTON -->
    <div class="d-flex justify-content-end mt-4">
        <button class="btn btn-primary rounded-circle"
            data-bs-toggle="modal"
            data-bs-target="#createModuleModal"
            style="width: 55px; height: 55px; font-size: 26px;">
            +
        </button>
    </div>

</div>

<!-- DELETE FORM -->
<form id="deleteModuleForm" method="POST">
    @csrf
    @method('DELETE')
</form>

@endsection


@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Saat tombol edit diklik
    $(document).on('click', '.btn-edit-module', function() {
        let id = $(this).data('id'); // ambil id module

        // isi modal dengan data dari tombol
        $('#edit_title').val($(this).data('title'));
        $('#edit_description').val($(this).data('description'));
        $('#edit_order').val($(this).data('order'));

        // ubah action form agar jadi PUT ke /admin/modules/{id}
        $('#editModuleForm').attr('action', '/admin/modules/' + id);

        // debug di console
        console.log('Form action:', $('#editModuleForm').attr('action'));
    });
</script>
@endsection




@push('modals')
@include('admin.modules.modal-edit')
@include('admin.modules.modal-create')
@endpush