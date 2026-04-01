@extends('admin.layouts.app')

@section('title', 'Sub product Edit')

@section('content')
@push('styles')
<div class="container-xxl">
    <div class="row align-items-center">
        <div class="border-0 mb-4">
            <div
                class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Sub product Edit</h3>
            </div>
        </div>
    </div> <!-- Row end  -->
    <div class="card-body">
        <form method="post" enctype="multipart/form-data" action="{{ route('subproduct.update', $data->id) }}">
            @csrf
            @method('PUT')
            <div class="row g-3 mb-3">
                <div class="col-lg-12">
                    <div class="card mb-3">
                        <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                            <h6 class="mb-0 fw-bold ">product Details</h6>
                        </div>
                        <div class="card-body">
                            <div class="row g-3 align-items-center">
                               
                                <div class="col-md-6">
                                     <label class="form-label">Category</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}" 
                                                {{ $category->id == $data->category_id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label">Sub Category</label>
                                    <select name="subcategory_id" id="subcategory_id" class="form-control">
                                        <option value="">Select Subcategory</option>
                                        @foreach ($subcategories as $subcategory)
                                            <option value="{{ $subcategory->id }}" 
                                                {{ $subcategory->id == $data->subcategory_id ? 'selected' : '' }}>
                                                {{ $subcategory->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Product</label>
                                    <select name="product_id" id="product_id" class="form-control">
                                        <option value="">Select Product</option>
                                        @foreach ($products as $product)
                                            <option value="{{ $product->id }}" 
                                                {{ $product->id == $data->product_id ? 'selected' : '' }}>
                                                {{ $product->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Product Title</label>
                                    <input type="text" id="title" name="title" class="form-control"
                                        value="{{ $data->title }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Product Url</label>
                                    <input type="text" id="url" name="url" class="form-control"  value="{{ $data->url }}" >
                                  
                                </div>
                                <div class="col-md-12">
                                    <label for="short_description" class="form-label"> Short description</label>
                                    <textarea id="short_description" name="short_description"
                                        class="form-control">{{ $data->short_description }}</textarea>
                                </div>
                                <div class="card mb-3">
                                    <div
                                        class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                        <h6 class="mb-0 fw-bold">Front Image</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="row g-3 align-items-center">
                                            <div class="col-md-12">
                                                <label class="form-label" for="input-file-front"> Image Upload</label>
                                                <input type="file" id="input-file-front" name="front_image"
                                                    class="dropify"
                                                    data-default-file="{{ asset('public/subproduct_front_image/' . $data->front_image) }}">
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Top Title</label>
                                    <input type="text" id="top_title" name="top_title" value="{{$data->top_title}}" class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <label for="description" class="form-label">Top Description</label>
                                    <textarea id="description" name="description" class="form-control"
                                        >{{ $data->description }}</textarea>
                                   
                                </div>

                                <div class="col-md-12">
                                    <label for="product_description" class="form-label">Product Description</label>
                                    <textarea id="product_description" name="product_description" class="form-control"
                                        >{{ $data->product_description }}</textarea>
                                  
                                </div>

                                <div class="card-body">
                                    <div class="row g-3 align-items-center">
                                        <div class="col-md-12">
                                            <label class="form-label" for="input-file-front">Images Upload</label>
                                            <input type="file" id="input-file-front" name="detail_images[]"
                                                class="dropify" multiple>
                                            @if ($data->detail_images)
                                            <div class="existing-images">
                                                @foreach (json_decode($data->detail_images) ?? [] as $image)
                                                <div class="image-container" id="image-container-{{ $loop->index }}">
                                                    <img src="{{ asset('public/subproduct_detail_files/' . basename($image)) }}"
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

                                        @if ($errors->has('detail_images'))
                                        <span class="text-danger">{{ $errors->first('detail_images') }}</span>
                                        @endif
                                    </div>
                                </div>

                                <div class="col-md-12">
                            <label class="form-label">Data sheet Title</label>
                            <input type="text" id="datasheet_title" name="datasheet_title" value="{{ $data->datasheet_title }}" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="datasheet_description" class="form-label">Data sheet Description</label>
                            <textarea id="datasheet_description" name="datasheet_description" class="form-control">{{ $data->datasheet_description }}</textarea>
                        </div>
                        {{-- PDF Upload --}}
                        <div class="col-md-12 mt-3">
                            <label class="form-label">Upload PDF</label>
                            <input type="file" name="pdf" class="form-control" accept="application/pdf">
                        </div>
                        
                        {{-- View PDF (if exists) --}}
                        @if(!empty($data->pdf))
                            <div class="col-md-12 mt-2">
                                <a href="{{ asset('public/product_pdf/' . $data->pdf) }}" target="_blank" class="btn btn-sm btn-primary">
                                    View PDF
                                </a>
                            </div>
                        @endif
                        <div class="col-md-6">
                            <label class="form-label">Industry1 Title</label>
                            <input type="text" id="industry_title_1" name="industry_title_1" value="{{ $data->industry_title_1 }}" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="industry_description_1" class="form-label">Industry1 Description</label>
                            <textarea id="industry_description_1" name="industry_description_1" class="form-control" >{{ $data->industry_description_1 }}</textarea>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                <h6 class="mb-0 fw-bold">Industry Image 1</h6>
                            </div>
                            <div class="card-body">
                                <div class="row g-3 align-items-center">
                                    <div class="col-md-12">
                                        <label class="form-label" for="input-file-front"> Image Upload</label>
                                        <input type="file" id="input-file-front" name="industry_image_1" class="dropify"
                                            data-default-file="{{ asset('public/subproduct_industry_image/industry1/' . $data->industry_image_1) }}">
                                    </div>
                                    @if ($errors->has('industry_image_1'))
                                    <span class="text-danger">{{ $errors->first('industry_image_1') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Industry2 Title</label>
                            <input type="text" id="industry_title_2" name="industry_title_2" value="{{ $data->industry_title_2 }}" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="industry_description_2" class="form-label">Industry2 Description</label>
                            <textarea id="industry_description_2" name="industry_description_2" class="form-control" >{{ $data->industry_description_2 }}</textarea>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                <h6 class="mb-0 fw-bold">Industry Image 2</h6>
                            </div>
                            <div class="card-body">
                                <div class="row g-3 align-items-center">
                                    <div class="col-md-12">
                                        <label class="form-label" for="input-file-front"> Image Upload</label>
                                        <input type="file" id="input-file-front" name="industry_image_2" class="dropify"
                                            data-default-file="{{ asset('public/subproduct_industry_image/industry2/' . $data->industry_image_2) }}">
                                    </div>
                                    @if ($errors->has('industry_image_2'))
                                    <span class="text-danger">{{ $errors->first('industry_image_2') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Industry3 Title</label>
                            <input type="text" id="industry_title_3" name="industry_title_3" value="{{ $data->industry_title_3 }}" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="industry_description_3" class="form-label">Industry3 Description</label>
                            <textarea id="industry_description_3" name="industry_description_3" class="form-control" >{{ $data->industry_description_3 }}</textarea>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                <h6 class="mb-0 fw-bold">Industry Image 3</h6>
                            </div>
                            <div class="card-body">
                                <div class="row g-3 align-items-center">
                                    <div class="col-md-12">
                                        <label class="form-label" for="input-file-front"> Image Upload</label>
                                        <input type="file" id="input-file-front" name="industry_image_3" class="dropify"
                                            data-default-file="{{ asset('public/subproduct_industry_image/industry3/' . $data->industry_image_3) }}">
                                    </div>
                                    @if ($errors->has('industry_image_3'))
                                    <span class="text-danger">{{ $errors->first('industry_image_3') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Industry4 Title</label>
                            <input type="text" id="industry_title_4" name="industry_title_4" value="{{ $data->industry_title_4 }}" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="industry_description" class="form-label">Industry4 Description</label>
                            <textarea id="industry_description_4" name="industry_description_4" class="form-control" >{{ $data->industry_description_4 }}</textarea>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header py-3 d-flex justify-content-between bg-transparent border-bottom-0">
                                <h6 class="mb-0 fw-bold">Industry Image 4</h6>
                            </div>
                            <div class="card-body">
                                <div class="row g-3 align-items-center">
                                    <div class="col-md-12">
                                        <label class="form-label" for="input-file-front"> Image Upload</label>
                                        <input type="file" id="input-file-front" name="industry_image_4" class="dropify"
                                            data-default-file="{{ asset('public/subproduct_industry_image/industry4/' . $data->industry_image_4) }}">
                                    </div>
                                    @if ($errors->has('industry_image_4'))
                                    <span class="text-danger">{{ $errors->first('industry_image_4') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Meta Title</label>
                            <input type="text" id="meta_title" name="meta_title" value="{{ $data->meta_title }}" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="meta_description" class="form-label">Meta Description</label>
                            <textarea id="meta_description" name="meta_description"  class="form-control">{{ $data->meta_description }}</textarea>
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
    $('#description,#industry_description_1,#industry_description_2,#industry_description_3,#industry_description_4').summernote({
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
    $('#datasheet_description').summernote({
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
    $('#product_description').summernote({
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
    })
    $('#meta_description').summernote({
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
    })
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

    var drProduct = $('#dropify-product').dropify();
    drProduct.on('dropify.beforeClear', function(product, element) {
        return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
    });

    drProduct.on('dropify.afterClear', function(product, element) {
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
document.addProductListener('DOMContentLoaded', function() {
    document.querySelector('.add-more').addProductListener('click', function() {
        let row = document.querySelector('.template').cloneNode(true);
        row.classList.remove('template');
        row.style.display = 'flex';
        document.querySelector('.wattage-price-container').appendChild(row);
    });

    document.querySelector('.wattage-price-container').addProductListener('click', function(e) {
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
<script>
    $(document).ready(function() {
        var selectedCategory = $('#category_id').val();
        var selectedSubcategory = "{{ $data->subcategory_id }}"; 

        function loadSubcategories(categoryId, selectedSubcategory) {
            if (categoryId) {
                $.ajax({
                    url: "{{ url('/admin/product/subcategory') }}/" + categoryId,
                    type: "GET",
                    dataType: "json",
                    success: function(data) {
                        $('#subcategory_id').html('<option value="">Select Subcategory</option>');
                        $.each(data, function(key, value) {
                            var isSelected = value.id == selectedSubcategory ? 'selected' : '';
                            $('#subcategory_id').append('<option value="' + value.id + '" ' + isSelected + '>' + value.name + '</option>');
                        });
                    }
                });
            } else {
                $('#subcategory_id').html('<option value="">Select Subcategory</option>');
            }
        }

       
        loadSubcategories(selectedCategory, selectedSubcategory);

       
        $('#category_id').on('change', function() {
            var categoryId = $(this).val();
            loadSubcategories(categoryId, null);
        });
    });
</script>

@endpush