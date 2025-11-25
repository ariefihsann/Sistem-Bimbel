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

                    <!-- EDIT BUTTON -->
                    <button class="btn btn-warning btn-sm btn-edit-module"
                        data-id="{{ $module->id }}"
                        data-title="{{ $module->title }}"
                        data-description="{{ $module->description }}"
                        data-order="{{ $module->order }}"
                        data-bs-toggle="modal"
                        data-bs-target="#editModuleModal">
                        <i class="fas fa-edit"></i>
                    </button>

                    <!-- DELETE BUTTON -->
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

<!-- IMPORT MODALS -->
@include('admin.modules.modal-create')
@include('admin.modules.modal-edit')

<!-- DELETE FORM -->
<form id="deleteModuleForm" method="POST">
    @csrf
    @method('DELETE')
</form>

@endsection

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    // Edit Module
    $('.btn-edit-module').click(function() {
        $('#edit_title').val($(this).data('title'));
        $('#edit_description').val($(this).data('description'));
        $('#edit_order').val($(this).data('order'));

        let id = $(this).data('id');
        $('#editModuleForm').attr('action', '/admin/modules/' + id);
    });

    // Delete Module
    $('.btn-delete-module').click(function() {
        if (confirm('Yakin ingin menghapus modul ini?')) {
            let id = $(this).data('id');
            let form = $('#deleteModuleForm');

            form.attr('action', '/admin/modules/' + id);
            form.submit();
        }
    });
</script>
@endpush