@extends('admin.layouts.app')

@section('title', 'Product Add')

@section('content')
<div class="container-xxl">
    <div class="row align-items-center">
        <div class="border-0 mb-4">
            <div
                class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Product Add</h3>
            </div>
        </div>
    </div> <!-- Row end -->

    <div class="card-body">
        <form method="post" enctype="multipart/form-data" action="{{ route('product.store') }}">
            @csrf
            <div class="col-lg-12">
                <div class="card mb-3 p-3">
                    <div class="card-header py-3 p-0 d-flex justify-content-between bg-transparent border-bottom-0">
                        <h6 class="mb-0 fw-bold">Product Information</h6>
                    </div>
                    <div class="row g-3 align-items-center">
                            <div class="col-md-6">
                                    <label class="form-label">Category</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Sub Category</label>
                                <select name="subcategory_id" id="subcategory" class="form-control">
                                    <option value="">Select Subcategory</option>
                                    @foreach ($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        <div class="col-md-6">
                            <label class="form-label">Product Title</label>
                            <input type="text" id="title" name="title" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Product Url</label>
                            <input type="text" id="url" name="url" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="short_description" class="form-label">Short description</label>
                            <textarea id="short_description" name="short_description" class="form-control"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="front_image">Front Image</label>
                            <input type="file" id="front_image" name="front_image" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Top Title</label>
                            <input type="text" id="top_title" name="top_title" class="form-control">
                        </div>
                        <!--<div class="col-md-6">-->
                        <!--    <label class="form-label">Sub Title</label>-->
                        <!--    <input type="text" id="sub_title" name="sub_title" class="form-control">-->
                        <!--</div>-->
                        <div class="col-md-12">
                            <label for="description" class="form-label">Top Description</label>
                            <textarea id="description" name="description" class="form-control"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label for="product_description" class="form-label">Product Description</label>
                            <textarea id="product_description" name="product_description" class="form-control" ></textarea>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label" for="cat_file">Image</label><br>
                            <small>Note: You can select multiple images</small>
                            <input type="file" id="detail_images" name="detail_images[]" multiple class="form-control" accept="image/*" onchange="previewImages()">
                        </div>
                        <div id="imagePreview" class="col-md-12 mt-3">
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Data sheet Title</label>
                            <input type="text" id="datasheet_title" name="datasheet_title" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="datasheet_description" class="form-label">Data sheet Description</label>
                            <textarea id="datasheet_description" name="datasheet_description" class="form-control"></textarea>
                        </div>
                        <div class="col-md-12">
                            <label class="form-label">Meta Title</label>
                            <input type="text" id="meta_title" name="meta_title" class="form-control">
                        </div>
                        <div class="col-md-12">
                            <label for="meta_description" class="form-label">Meta Description</label>
                            <textarea id="meta_description" name="meta_description" class="form-control"></textarea>
                        </div>
                        <div class="col-md-12">
                            <!--<label class="form-label">Linked Industry Products</label>-->
                            <!--<div class="row">-->
                            <!--    @foreach($industryProducts as $industryProduct)-->
                            <!--        <div class="col-md-4">-->
                            <!--            <div class="form-check">-->
                            <!--                <input type="checkbox"-->
                            <!--                    class="form-check-input"-->
                            <!--                    name="industry_products[]"-->
                            <!--                    value="{{ $industryProduct->id }}"-->
                            <!--                    id="industry_{{ $industryProduct->id }}"-->
                            <!--                    {{ (isset($product) && in_array($industryProduct->id, json_decode($product->industry_products ?? '[]'))) ? 'checked' : '' }}>-->
                            <!--                <label class="form-check-label" for="industry_{{ $industryProduct->id }}">-->
                            <!--                    {{ $industryProduct->title }}-->
                            <!--                </label>-->
                            <!--            </div>-->
                            <!--        </div>-->
                            <!--    @endforeach-->
                            <!--</div>-->
                        </div>
                    </div>
                </div>
            </div>
            <label class="form-label">Linked Industry Products</label>

@php
    $selectedIndustries = [];

    if (isset($data) && $data->industries) {
        $decoded = json_decode($data->industries, true);
        if (is_array($decoded)) {
            $selectedIndustries = array_map('intval', $decoded);
        }
    }
@endphp

@foreach($industryProducts as $industryProduct)
    <div class="col-md-4">
        <div class="form-check">
            <input class="form-check-input"
                type="checkbox"
                name="industries[]"
                value="{{ $industryProduct->id }}"
                id="industry_{{ $industryProduct->id }}"
                {{ in_array((int)$industryProduct->id, $selectedIndustries) ? 'checked' : '' }}>
            <label class="form-check-label" for="industry_{{ $industryProduct->id }}">
                {{ $industryProduct->title }}
            </label>
        </div>
    </div>
@endforeach
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
    document.getElementById("detail_images").addProductListener("change", function(product) {
        const previewContainer = document.getElementById("image_preview");
        previewContainer.innerHTML = ""; // Clear previous previews
        const files = product.target.files;

        if (files) {
            for (let i = 0; i < files.length; i++) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement("img");
                    img.src = e.target.result;
                    img.classList.add("img-thumbnail");
                    img.style.marginRight = "10px";
                    img.style.marginBottom = "10px";
                    previewContainer.appendChild(img);
                };
                reader.readAsDataURL(files[i]);
            }
        }
    });
    function previewImages() {
        var previewContainer = document.getElementById('imagePreview');
        previewContainer.innerHTML = ''; 

        var files = document.getElementById('detail_images').files;

        if (files) {
            for (var i = 0; i < files.length; i++) {
                var file = files[i];

                if (file.type.startsWith('image/')) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        var imageContainer = document.createElement('div');
                        imageContainer.classList.add('image-container');
                        
                        var img = document.createElement('img');
                        img.src = e.target.result;
                        img.classList.add('img-thumbnail', 'm-2');
                        img.style.width = '150px'; // Set the width of the image
                        img.style.height = '150px'; // Set the height of the image
                        
                        var deleteBtn = document.createElement('button');
                        deleteBtn.classList.add('btn', 'btn-danger', 'btn-sm', 'delete-btn');
                        deleteBtn.innerHTML = '<i class="fa fa-trash"></i>';
                        deleteBtn.type = 'button';
                        deleteBtn.onclick = function () {
                            imageContainer.remove(); 
                        };

                        imageContainer.appendChild(img);
                        imageContainer.appendChild(deleteBtn);

                        previewContainer.appendChild(imageContainer);
                    }

                    reader.readAsDataURL(file);
                }
            }
        }
    }

</script>

<script>
    $(document).ready(function() {
    $('#category_id').on('change', function() {
        var categoryId = $(this).val();
        console.log("Selected Category ID:", categoryId);

        if (categoryId) {
            $.ajax({
                url: "{{ url('/admin/product/subcategory') }}/" + categoryId,
                type: "GET",
                dataType: "json",
                beforeSend: function() {
                    console.log("Sending AJAX Request to:", "/admin/product/subcategory/" + categoryId);
                },
                success: function(data) {
                    console.log("Response Data:", data);
                    $('#subcategory').html('<option value="">Select Subcategory</option>');
                    $.each(data, function(key, value) {
                        $('#subcategory').append('<option value="' + value.id + '">' + value.name + '</option>');
                    });
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error:", error); 
                    console.log("XHR Response:", xhr.responseText); // Show Laravel error message
                }
            });
        } else {
            $('#subcategory').html('<option value="">Select Subcategory</option>');
        }
    });
});

</script>

<style>
    .image-container {
        position: relative;
        display: inline-block;
        margin-right: 10px;
        margin-bottom: 10px;
    }

    .delete-btn {
        position: absolute;
        top: 10px;
        right: 10px;
        display: block; 
        cursor: pointer;
    }

    .image-container:hover .delete-btn {
        display: block; 
    }
</style>
@endpush