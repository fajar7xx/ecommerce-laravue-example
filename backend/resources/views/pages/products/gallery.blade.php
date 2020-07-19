@extends('layouts.admin')

@section('title', 'Product Gallery')

@section('content')
    <!-- ============================================================== -->
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Product Gallery</h2>
                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris
                    facilisis
                    faucibus at enim quis massa lobortis rutrum.</p>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Products Gallery</li>
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
            <div class="col-lg-12">
                {{-- <div class="section-block">
                    <h3 class="section-title">My Active Campaigns</h3>
                </div> --}}
                @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success</strong> The product has been updated.
                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>
                @elseif(session('deleted'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Success</strong> The product has been deleted.
                    <a href="#" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </a>
                </div>
                @endif
                <div class="card">
                    <div class="campaign-table table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr class="border-0">
                                    <th class="border-0">#</th>
                                    <th class="border-0">Name</th>
                                    <th class="border-0">Photo</th>
                                    <th class="border-0">Default</th>
                                    <th class="border-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $no = 1
                            @endphp
                            @forelse ($items as $item)
                            <tr>
                                <td>
                                    {{ $no++ }}
                                </td>
                                <td>{{ $item->product->name }}</td>
                                <td>
                                    <img src="{{ url($item->photo) }}" alt="{{ $item->product->name }}" class="img-fluid" width="100">
                                </td>
                                <td>{{ $item->is_default ? 'Yes':'No' }}</td>
                                <td>
                                    <div class="dropdown float-right">
                                        <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown"
                                            aria-expanded="false">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end"
                                            style="position: absolute; transform: translate3d(14px, 18px, 0px); top: 0px; left: 0px; will-change: transform;">
                                            <!-- item-->
                                            <a href="javascript:void(0);" class="dropdown-item">Product Galleries</a>
                                            <!-- item-->
                                            <a href="{{ route('product-gallery.edit', $item->id) }}" class="dropdown-item">Edit</a>
                                            <!-- item-->
                                            <a href="#" class="dropdown-item confirmation-btn">Delete</a>

                                            <form class="delete-form" action="{{ route('product-gallery.destroy', $item->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('delete')
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center p-5">Data Tidak ada</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer d-flex justify-content-between align-items-center">
                        <div>
                            {{-- Total Product: {{ $items->total() }} --}}
                        </div>
                        <nav aria-label="Page navigation example">
                            
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('css')
    <link rel="stylesheet" href="/sweetalert2/dist/sweetalert2.min.css">
@endpush

@push('scripts')
    <script src="/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script>
        $(".confirmation-btn").click(function(){
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value) {
                    // document.getElementById('delete-form').submit()
                    $(".delete-form").submit()
                    Swal.fire(
                        'Deleted!',
                        'The product has been deleted.',
                        'success'
                    )
                }
            })
        });
    </script>
@endpush