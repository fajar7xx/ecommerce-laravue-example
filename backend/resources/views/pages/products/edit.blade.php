@extends('layouts.admin')

@section('title', 'Edit Product')

@section('content')
    <!-- ============================================================== -->
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Edit Product</h2>
                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris
                    facilisis
                    faucibus at enim quis massa lobortis rutrum.</p>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
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
                {{-- <div class="section-block">
                    <h3 class="section-title">My Active Campaigns</h3>
                </div> --}}
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0">Edit Product</h4>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" novalidate="" autocomplete="off" action="{{ route('product.update' , $product->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-3">
                                <label for="name">Product Name <span class="text-danger">*</span></label>
                                <input type="name" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="add product name" value="{{ old('name') ?? $product->name  }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="type">type</label>
                                <input type="text" class="form-control @error('type') is-invalid @enderror" id="type" name="type" placeholder="type barang" value="{{ old('type') ?? $product->type}}">
                                @error('type')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control @error('description') is-invalid @enderror">{{ old('description') ?? $product->description }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="price">Price (Idr)</label>
                                <input type="number" min="0" class="form-control @error('price') is-invalid @enderror" id="price" name="price" placeholder="1.0000.000" value="{{ old('price') ?? $product->price }}">
                                @error('price')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="qty">Quantity</label>
                                <input type="number" min="0" class="form-control @error('qty') is-invalid @enderror" id="qty" name="qty" placeholder="1" value="{{ old('qty') ?? $product->qty}}">
                                @error('qty')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        
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
    <link rel="stylesheet" href="/summernote/dist/summernote-bs4.min.css">
@endpush

@push('scripts')
    <script src="/summernote/dist/summernote-bs4.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#description').summernote({
                tabsize: 2,
                height: 300
            });
        });
    </script>
@endpush