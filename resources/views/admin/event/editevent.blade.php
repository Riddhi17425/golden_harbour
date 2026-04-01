@extends('admin.layouts.app')

@section('title', 'event Edit')

@section('content')
@push('styles')
<div class="container-xxl">
    <div class="row align-items-center">
        <div class="border-0 mb-4">
            <div
                class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">event Edit</h3>
            </div>
        </div>
    </div> <!-- Row end  -->
    <div class="card-body">
        <form method="post" enctype="multipart/form-data" action="{{ route('event.update', $data->id) }}">
            @csrf
            @method('PUT')
            <div class="row g-3 mb-3">
                <div class="col-lg-12">
                    <div class="card mb-3">
                        <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                            <h6 class="mb-0 fw-bold ">event Details</h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3 align-items-center">
                                <div class="col-md-6">
                                    <label class="form-label">Event Name</label>
                                    <input type="text" id="title" name="title" class="form-control"
                                        value="{{ $data->title }}">
                                    @if ($errors->has('title'))
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <label for="short_description" class="form-label"> Short description</label>
                                    <textarea id="short_description" name="short_description"
                                        class="form-control">{{ $data->short_description }}</textarea>
                                </div>
                                <div class="card mb-3">
                                    <div
                                        class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                        <h6 class="mb-0 fw-bold">Home Image</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-3 align-items-center">
                                            <div class="col-md-12">
                                                <label class="form-label" for="input-file-front"> Image Upload</label>
                                                <input type="file" id="input-file-front" name="home_image"
                                                    class="dropify"
                                                    data-default-file="{{ asset('public/event_home_image/' . $data->home_image) }}">
                                            </div>
                                            @if ($errors->has('home_image'))
                                            <span class="text-danger">{{ $errors->first('home_image') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Select Event Type</label>
                                    <select class="form-select" name="event_type" aria-label="Default select example">
                                        <option value="Current Events" @if($data->event_type ==
                                            'Current Events') selected="selected" @endif>Current Events</option>
                                        <option value="Upcoming Events" @if($data->event_type == 'Upcoming Events')
                                            selected="selected" @endif>Upcoming Events</option>
                                        <option value="Past Events" @if($data->event_type == 'Past Events')
                                            selected="selected" @endif>Past Events</option>
                                    </select>
                                    @if ($errors->has('event_type'))
                                    <span class="text-danger">{{ $errors->first('event_type') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Event Address</label>
                                    <input type="text" id="address" name="address"  value="{{ $data->address }}" required class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <label for="description" class="form-label">Venue</label>
                                    <textarea id="description" name="description" class="form-control"
                                        required>{{ $data->description }}</textarea>
                                    @if ($errors->has('description'))
                                    <span class="text-danger">{{ $errors->first('description') }}</span>
                                    @endif
                                </div>

                                <div class="col-md-6">
                                    <label for="date" class="form-label">Start Date</label>
                                    <input type="date" id="event_start_date" name="event_start_date"
                                        value="{{ $data->event_start_date }}" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="date" class="form-label">End Date</label>
                                    <input type="date" id="event_end_date" name="event_end_date"
                                        value="{{ $data->event_end_date }}" class="form-control">
                                </div>

                                <div class="card-body">
                                    <div class="row g-3 align-items-center">
                                        <div class="col-md-12">
                                            <label class="form-label" for="input-file-front">Images Upload</label>
                                            <input type="file" id="input-file-front" name="multiple_images[]"
                                                class="dropify" multiple>
                                            @if ($data->multiple_images)
                                            <div class="existing-images">
                                                @foreach (json_decode($data->multiple_images) ?? [] as $image)
                                                <div class="image-container" id="image-container-{{ $loop->index }}">
                                                    <img src="{{ asset('public/event_cat_files/' . basename($image)) }}"
                                                        class="img-thumbnail" width="150" height="150">
                                                    <button class="delete-btn btn btn-danger btn-sm" type="button"
                                                        onclick="deleteImage(this, '{{ basename($image) }}')">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                                @endforeach
                                            </div>
                                            @endif
                                            <input type="hidden" id="deleted_images" name="deleted_images" value="">
                                        </div>

                                        @if ($errors->has('multiple_images'))
                                        <span class="text-danger">{{ $errors->first('multiple_images') }}</span>
                                        @endif
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary py-2 px-5 text-uppercase btn-set-task w-sm-100">Save</button>
        </form>
    </div>
</div>
@endsection

<style>
.existing-images {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
}

.image-container {
    flex: 0 0 auto;
    text-align: center;
    position: relative;
}

.delete-btn {
    display: block;
    position: absolute;
    top: 5px;
    right: 5px;
    z-index: 10;
}

.image-container:hover .delete-btn {
    display: block;

}

img {
    max-width: 100%;
    height: auto;
}
</style>

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
    $('#short_description').summernote({
        placeholder: 'Enter here...',
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
        placeholder: 'Enter here...',
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
    var $modal = $('#modalCrop');
    var image = document.getElementById('image');
    var cropper;

    $("body").on("change", ".image", function(e) {
        var files = e.target.files;
        var done = function(url) {
            image.src = url;
            $modal.modal('show');
        };

        if (files && files.length > 0) {
            var reader = new FileReader();
            reader.onload = function(e) {
                done(reader.result);
            };
            reader.readAsDataURL(files[0]);
        }
    });

    $modal.on('shown.bs.modal', function() {
        cropper = new Cropper(image, {
            aspectRatio: 3 / 2,
            viewMode: 3,
        });
    }).on('hidden.bs.modal', function() {
        cropper.destroy();
        cropper = null;
    });

    $("#crop").click(function() {
        canvas = cropper.getCroppedCanvas({
            width: 400,
            height: 400,
        });

        canvas.toBlob(function(blob) {
            url = URL.createObjectURL(blob);
            var reader = new FileReader();
            reader.readAsDataURL(blob);
            reader.onloadend = function() {
                var base64data = reader.result;
                $modal.modal('hide');
                $('#cropped_image').val(base64data);
            };
        });
    });
});

$(document).ready(function() {
    ClassicEditor.create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });

    $('#myCartTable').addClass('nowrap').dataTable({
        responsive: true,
        columnDefs: [{
            targets: [-1, -3],
            className: 'dt-body-right'
        }]
    });

    $('.deleterow').on('click', function() {
        var tablename = $(this).closest('table').DataTable();
        tablename.row($(this).parents('tr')).remove().draw();
    });

    $('#optgroup').multiSelect({
        selectableOptgroup: true
    });
});

$(function() {
    $('.dropify').dropify();

    var drEvent = $('#dropify-event').dropify();
    drEvent.on('dropify.beforeClear', function(event, element) {
        return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
    });

    drEvent.on('dropify.afterClear', function(event, element) {
        alert('File deleted');
    });

    $('.dropify-fr').dropify({
        messages: {
            default: 'Glissez-déposez un fichier ici ou cliquez',
            replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
            remove: 'Supprimer',
            error: 'Désolé, le fichier trop volumineux'
        }
    });
});
document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('.add-more').addEventListener('click', function() {
        let row = document.querySelector('.template').cloneNode(true);
        row.classList.remove('template');
        row.style.display = 'flex';
        document.querySelector('.wattage-price-container').appendChild(row);
    });

    document.querySelector('.wattage-price-container').addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-row')) {
            e.target.closest('.wattage-price-row').remove();
        }
    });
});
</script>
<script>
var deletedImages = [];

function deleteImage(button, filename) {
    var imageContainer = button.closest('.image-container');
    imageContainer.remove();
    deletedImages.push(filename);
    document.getElementById('deleted_images').value = JSON.stringify(deletedImages);
}
</script>
@endpush