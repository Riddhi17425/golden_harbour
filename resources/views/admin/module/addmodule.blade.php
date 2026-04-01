@extends('admin.layouts.app')

@section('title', 'Module List Add')

@section('content')
<div class="container-xxl">
    <div class="row align-items-center">
        <div class="border-0 mb-4">
            <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Module List Add</h3>
            </div>
        </div>
    </div>

    <div class="card-body">
        <form method="post" enctype="multipart/form-data" action="{{ route('module.store') }}">
            @csrf
            <div class="col-xl-12 col-lg-8">
                <div class="card mb-3 p-3">
                    <div class="card-header py-3 p-0 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold">Module List Information</h6>
                    </div>
                    <div class="row g-3 align-items-center">
                        <div class="col-md-12">
                            <label class="form-label" for="title">Title</label>
                            <textarea type="text" id="title" name="title"  class="form-control">{{ old('title') }}</textarea>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="url">Detail Title</label>
                            <input type="text" id="detail_title" name="detail_title" value="{{ old('detail_title') }}"  class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label" for="url">Module URL</label>
                            <input type="text" id="url" name="url" value="{{ old('url') }}"  class="form-control">
                        </div>

                        <div class="col-md-12">
                            <label class="form-label" for="icondescription">module Icon Description</label>
                            <textarea id="icondescription" name="icondescription" class="form-control">{{ old('icondescription') }}</textarea>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="description">module Image Description</label>
                            <textarea id="description" name="description" class="form-control">{{ old('description') }}</textarea>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label" for="flowchart">Main Image</label>
                            <input type="file" id="flowchart" name="flowchart" class="form-control">
                        </div>

                        <div class="col-md-12">
                            <label class="form-label" for="icon">Icon</label>
                            <input type="file" id="icon" name="icon" class="form-control">
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="alt">Alt Tag</label>
                            <input type="text" id="alt" name="alt" value="{{ old('alt') }}"  class="form-control">
                        </div>

                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary btn-set-task w-sm-100 py-2 px-5 text-uppercase">Save</button>
        </form>
    </div>
</div>
@endsection


@push('styles')
<!-- Summernote CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">

<!-- Cropper CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css">

<!--plugin css file -->
<link rel="stylesheet" href="{!! asset('public/admin_public/dist/assets/plugin/multi-select/css/multi-select.css') !!}">
<link rel="stylesheet"
    href="{!! asset('public/admin_public/dist/assets/plugin/bootstrap-tagsinput/bootstrap-tagsinput.css') !!}">
<link rel="stylesheet" href="{!! asset('public/admin_public/dist/assets/plugin/dropify/dist/css/dropify.min.css') !!}">
<link rel="stylesheet"
    href="{!! asset('public/admin_public/dist/assets/plugin/datatables/responsive.dataTables.min.css') !!}">
<link rel="stylesheet"
    href="{!! asset('public/admin_public/dist/assets/plugin/datatables/dataTables.bootstrap5.min.css') !!}">
@endpush

@push('scripts')
<!-- Summernote JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
<!-- Cropper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
<script src="{!! asset('public/admin_public/dist/assets/plugin/multi-select/js/jquery.multi-select.js') !!}"></script>
<script src="{!! asset('public/admin_public/dist/assets/plugin/bootstrap-tagsinput/bootstrap-tagsinput.js') !!}">
</script>
<script src="{!! asset('public/admin_public/dist/assets/bundles/dropify.bundle.js') !!}"></script>
<script src="{!! asset('public/admin_public/dist/assets/bundles/dataTables.bundle.js') !!}"></script>

<script>
    $(document).ready(function() {
        $('#icondescription').summernote({
            placeholder: 'Enter module icondescription here...',
            height: 300
        });
        $('#title').summernote({
            placeholder: 'Enter module Title here...',
            height: 300
        });
        $('#description').summernote({
            placeholder: 'Enter module description here...',
            height: 300
        });

    });
</script>
@endpush

