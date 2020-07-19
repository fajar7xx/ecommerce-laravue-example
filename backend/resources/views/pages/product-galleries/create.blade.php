@extends('layouts.admin')

@section('title', 'Add Product')

@section('content')
    <!-- ============================================================== -->
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Add Product Galleries</h2>
                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris
                    facilisis
                    faucibus at enim quis massa lobortis rutrum.</p>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Product Galleries</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end pageheader  -->
    <!-- ============================================================== -->
    <div class="ecommerce-widget">

        <div class="row">
            <div class="col-lg-10 offset-1">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Add Product Photo</h4>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" novalidate="" autocomplete="off" action="{{ route('product-gallery.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="product_id">Product Name <span class="text-danger">*</span></label>
                                <select name="product_id" id="product_id" class="form-control @error('product_id') is-invalid @enderror select-box">

                                    <option value="">Select Product</option>
                                    @foreach ($products as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                                @error('product_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="photo">photo</label>
                                <input type="file" class="form-control-file @error('photo') is-invalid @enderror" id="photo" name="photo" accept="image/*">
                                @error('photo')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- <div class="mb-3">
                                <label for="is_default">is_default</label>
                                <input type="file" class="form-control-file @error('is_default') is-invalid @enderror" id="is_default" name="is_default">
                                @error('is_default')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}
                            <h5>Is Default</h5>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="is_default" class="custom-control-input" value="1"><span class="custom-control-label">Yes</span>
                            </label>
                            <label class="custom-control custom-radio custom-control-inline">
                                <input type="radio" name="is_default" checked="" class="custom-control-input" value="0"><span class="custom-control-label">No</span>
                            </label>
                            @error('is_default')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                           
                            <hr class="mb-4">
                            <button class="btn btn-primary btn-lg btn-block" type="submit">Save Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="/select2/dist/css/select2.min.css">
@endpush

@push('scripts')
    <script src="/select2/dist/js/select2.full.min.js"></script>
    <script>
        // CSRF Token
        let CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function () {
            $('#product_id').select2({
            //     ajax: {
            //         url: "{{ route('product.getproducts') }}",
            //         type: "POST",
            //         dataType: 'json',
            //         delayType: 250,
            //         data: function(params){
            //             return{
            //                 _token: "{{ csrf_token() }}",
            //                 search: params.name
            //             };
            //         },
            //         prosesResult: function(response){
            //             return{
            //                 result: response
            //             };
            //         },
            //         cache: true
            //     }
            // });
        });
    </script>
@endpush