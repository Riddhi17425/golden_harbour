@extends('admin.layouts.app')

@section('title', 'Agencies Edit')

@section('content')
@push('styles')
<div class="container-xxl">
    <div class="row align-items-center">
        <div class="border-0 mb-4">
            <div
                class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Agencies Edit</h3>
            </div>
        </div>
    </div> <!-- Row end  -->
    <div class="card-body">
        <form method="post" enctype="multipart/form-data" action="{{ route('agencies.update', $data->id) }}">
            @csrf
            @method('PUT')
            <div class="row g-3 mb-3">
                <div class="col-lg-12">
                    <div class="card mb-3">
                        <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                            <h6 class="mb-0 fw-bold ">Agencies Details</h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3 align-items-center">
                                <div class="col-md-6">
                                    <label class="form-label">Agencies Name</label>
                                    <input type="text" id="title" name="title" class="form-control"
                                        value="{{ $data->title }}">
                                    @if ($errors->has('title'))
                                    <span class="text-danger">{{ $errors->first('title') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Country</label>
                                    <input type="text" id="country" name="country" class="form-control"
                                        value="{{ $data->country }}">
                                    @if ($errors->has('country'))
                                    <span class="text-danger">{{ $errors->first('country') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Website</label>
                                    <input type="text" id="website" name="website" class="form-control"
                                        value="{{ $data->website }}">
                                    @if ($errors->has('website'))
                                    <span class="text-danger">{{ $errors->first('website') }}</span>
                                    @endif
                                </div>
                                <div class="col-md-12">
                                    <label for="material" class="form-label">Material</label>
                                    <textarea id="material" name="material"
                                        class="form-control">{{ $data->material }}</textarea>
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
                                                <input type="file" id="input-file-front" name="principals_logo"
                                                    class="dropify"
                                                    data-default-file="{{ asset('public/our_principals_logos/' . $data->principals_logo) }}">
                                            </div>
                                            @if ($errors->has('principals_logo'))
                                            <span class="text-danger">{{ $errors->first('principals_logo') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="card mb-3">
                                    <div
                                        class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                        <h6 class="mb-0 fw-bold">Flag Image</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-3 align-items-center">
                                            <div class="col-md-12">
                                                <label class="form-label" for="input-file-front"> Flag Image Upload</label>
                                                <input type="file" id="input-file-front" name="flag_logo"
                                                    class="dropify"
                                                    data-default-file="{{ asset('public/our_principals_flag/' . $data->flag_logo) }}">
                                            </div>
                                            @if ($errors->has('flag_logo'))
                                            <span class="text-danger">{{ $errors->first('flag_logo') }}</span>
                                            @endif
                                        </div>
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
    $('#material').summernote({
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

    var drprincipals = $('#dropify-principals').dropify();
    drprincipals.on('dropify.beforeClear', function(principals, element) {
        return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
    });

    drprincipals.on('dropify.afterClear', function(principals, element) {
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
document.addprincipalsListener('DOMContentLoaded', function() {
    document.querySelector('.add-more').addprincipalsListener('click', function() {
        let row = document.querySelector('.template').cloneNode(true);
        row.classList.remove('template');
        row.style.display = 'flex';
        document.querySelector('.wattage-price-container').appendChild(row);
    });

    document.querySelector('.wattage-price-container').addprincipalsListener('click', function(e) {
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