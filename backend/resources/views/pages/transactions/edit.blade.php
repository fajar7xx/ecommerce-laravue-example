@extends('layouts.admin')

@section('title', 'Edit Transaction')

@section('content')
    <!-- ============================================================== -->
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Edit Transaction</h2>
                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris
                    facilisis
                    faucibus at enim quis massa lobortis rutrum.</p>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Transaction</li>
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
                        <h4 class="mb-0">Edit Transaction</h4>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" novalidate="" autocomplete="off" action="{{ route('transaction.update' , $transaction->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            
                            <div class="mb-3">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="name" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') ?? $transaction->name  }}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email">email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') ?? $transaction->email}}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="number">Mobile Number</label>
                                <input type="number" class="form-control @error('number') is-invalid @enderror" id="number" name="number" value="{{ old('number') ?? $transaction->number }}">
                                @error('number')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="address">Address</label>
                                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address') ?? $transaction->address}}">
                                @error('address')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                        
                            <hr class="mb-4">
                            <div class="d-flex">
                                <button class="btn btn-primary mr-2" type="submit">Save Transaction</button>
                                <a href="{{ route('transaction.index') }}" class="btn btn-warning">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection