@extends('admin.layouts.app')

@section('title', 'Edit Industry')

@section('content')
<div class="container-xxl">
    <div class="row align-items-center">
        <div class="border-0 mb-4">
            <div
                class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Edit Industry</h3>
            </div>
        </div>
    </div>

    <div class="card-body">
        <form method="post" enctype="multipart/form-data" action="{{ route('industry.update', $data->id) }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $data->id }}" />

            <div class="col-xl-12 col-lg-8">
                <div class="card mb-3 p-3">
                    <div class="card-header py-3 p-0 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold">Industry Information</h6>
                    </div>
                    <div class="row g-3 align-items-center">
                        <div class="col-md-6">
                            <label class="form-label">Title</label>
                            <input type="text" id="title" name="title" value="{{ $data->title }}" required
                                class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="short_description" class="form-label"> Short description</label>
                            <textarea id="short_description" name="short_description"
                                class="form-control">{{ $data->short_description }}</textarea>
                        </div>
                        <!--<div class="col-md-12">-->
                        <!--    <label for="bottom_description" class="form-label">Bottom Description</label>-->
                        <!--    <textarea id="bottom_description" name="bottom_description" class="form-control">{{ $data->bottom_description }}</textarea>-->
                        <!--</div>-->
                        <div class="card mb-3">
                            <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                <h6 class="mb-0 fw-bold">Home Image</h6>
                            </div>
                            <div class="card-body">
                                <div class="row g-3 align-items-center">
                                    <div class="col-md-12">
                                        <label class="form-label" for="input-file-front"> Image Upload</label>
                                        <input type="file" id="input-file-front" name="home_image" class="dropify"
                                            data-default-file="{{ asset('public/industry_home_image/' . $data->home_image) }}">
                                    </div>
                                    @if ($errors->has('home_image'))
                                    <span class="text-danger">{{ $errors->first('home_image') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Sub Title</label>
                            <input type="text" id="sub_title" name="sub_title" value="{{ $data->sub_title }}" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Alt</label>
                            <input type="text" id="alt" name="alt" value="{{ $data->alt }}"
                                 class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="description" class="form-label"> Description</label>
                            <textarea id="description" name="description" class="form-control">{{ $data->description }}</textarea>
                        </div>
                        
                        <div class="card mb-3">
                            <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                <h6 class="mb-0 fw-bold">Image</h6>
                            </div>
                            <div class="card-body">
                                <div class="row g-3 align-items-center">
                                    <div class="col-md-12">
                                        <label class="form-label" for="input-file-front"> Image Upload</label>
                                        <input type="file" id="input-file-front" name="image" class="dropify"
                                            data-default-file="{{ asset('public/industry_image/' . $data->image) }}">
                                    </div>
                                    @if ($errors->has('image'))
                                    <span class="text-danger">{{ $errors->first('image') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
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
<!-- Dropify CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/dropify/dist/css/dropify.min.css">
@endpush

@push('scripts')
<!-- Summernote JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
<!-- Dropify JS -->
<script src="https://cdn.jsdelivr.net/npm/dropify/dist/js/dropify.min.js"></script>

<script>
$(document).ready(function() {
    $('.dropify').dropify();
    $('#short_description').summernote({
        placeholder: 'Enter Short Description here...',
        height: 300,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['insert', ['link', 'picture', 'hr']],
            ['view', ['fullscreen', 'codeview']],
            ['help', ['help']]
        ]
    });
    $('#description').summernote({
        placeholder: 'Enter Description here...',
        height: 300,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['insert', ['link', 'picture', 'hr']],
            ['view', ['fullscreen', 'codeview']],
            ['help', ['help']]
        ]
    });
});
</script>
@endpush