@extends('admin.layouts.app')

@section('title', 'Product List')

@section('content')
<div class="container-xxl">

    <div class="row align-items-center">
        <div class="border-0 mb-4">
            <div
                class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                <h3 class="fw-bold mb-0">Product</h3>

                <div class="row align-items-center mb-3">
                    <div class="col-md-12">
                        <a href="{{ route('product.create') }}" class="btn btn-primary">Add Product</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row g-3 mb-3">


        <div class="col-md-12 col-lg-12 ">
            <div class="card mb-3 bg-transparent p-2">
                <form action="{{ route('product.index') }}" method="GET" class="d-flex mb-3" style="gap: 5px; max-width: 300px;">
                  <input type="text" name="search" value="{{ request('search') }}" placeholder="Search products by title..."
                    style="height: 36px; font-size: 14px; padding: 6px 10px;">
                  <button type="submit" class="btn btn-primary" style="height: 36px; line-height: 24px; padding: 0 16px;">
                    Search
                  </button>
                </form>
                @foreach ($data as $product)
                <div class="card border-0 mb-1">
                    <div class="card-body d-flex align-items-center flex-column flex-md-row">

                        <div class="ms-md-4 m-0 mt-4 mt-md-0 text-md-start text-center w-100">
                            <h6 class="mb-3 fw-bold">{{ $product->title }} <span
                                    class="text-muted small fw-light d-block">{{ $product->subcategory->category->name }} - {{ $product->subcategory->name }}</span>
                            </h6>

                            <div class="pe-xl-5 pe-md-4 ps-md-0 px-3 mb-2 d-inline-flex d-md-none">
                                <a href="{{ route('product.edit', ['product' => $product->id]) }}"
                                    class="btn btn-warning">Edit</a>
                                <form action="{{ route('product.destroy', ['product' => $product->id]) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                        <div class="ms-auto d-none d-md-flex">
                            <a href="{{ route('product.edit', ['product' => $product->id]) }}"
                                class="btn btn-warning me-2">Edit</a>
                            <form action="{{ route('product.destroy', ['product' => $product->id]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row g-3 mb-3">
                <div class="col-md-12">
                    {{ $data->appends(request()->query())->links() }}

                    <!--{{ $data->links() }}-->
                </div>
            </div>
        </div>
    </div> <!-- Row end  -->
</div>
@endsection

@push('styles')
<!-- plugin css file  -->
<link rel="stylesheet"
    href="{!! asset('public/backend/dist/assets/plugin/datatables/responsive.dataTables.min.css') !!}">
<link rel="stylesheet"
    href="{!! asset('public/backend/dist/assets/plugin/datatables/dataTables.bootstrap5.min.css') !!}">
@endpush


@push('scripts')
<!-- Plugin Js -->
<script src="{!! asset('public/backend/dist/assets/bundles/dataTables.bundle.js') !!}"></script>
@endpush

@push('custom_scripts')
<script>
$('#myDataTable')
    .addClass('nowrap')
    .dataTable({
        responsive: true,
        columnDefs: [{
            targets: [-1, -3],
            className: 'dt-body-right'
        }]
    });
$('.deleterow').on('click', function() {
    var tablename = $(this).closest('table').DataTable();
    tablename
        .row($(this)
            .parents('tr'))
        .remove()
        .draw();

});
</script>
@endpush
