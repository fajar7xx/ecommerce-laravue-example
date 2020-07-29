@extends('layouts.admin')

@section('title', 'Transaction List')

@section('content')
    <!-- ============================================================== -->
    <!-- pageheader  -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
            <div class="page-header">
                <h2 class="pageheader-title">Transaction Lists</h2>
                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris
                    facilisis
                    faucibus at enim quis massa lobortis rutrum.</p>
                <div class="page-breadcrumb">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Transaction`</li>
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
                                    <th class="border-0">Email</th>
                                    <th class="border-0">Nomor</th>
                                    <th class="border-0">Total Transaksi</th>
                                    <th class="border-0">Status</th>
                                    <th class="border-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1
                                @endphp
                                @forelse ($transactions as $transaction)
                                <tr>
                                    <td>
                                        {{ $no++ }}
                                    </td>
                                    <td>{{ $transaction->name }}</td>
                                    <td>{{ $transaction->email }}</td>
                                    <td>{{ $transaction->number }}</td>
                                    <td>Rp. {{ $transaction->total }}</td>
                                    <td>
                                        @if ($transaction->status == 'PENDING')
                                            <span class="badge badge-info">Pending</span>
                                        @elseif($transaction->status == 'SUCCESS')
                                            <span class="badge badge-success">Success</span>
                                        @elseif($transactison->status == 'FAILED')
                                            <span class="badge badge-danger">Failed</span>
                                        @else
                                            <span></span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown float-right">
                                            <a href="#" class="dropdown-toggle card-drop" data-toggle="dropdown"
                                                aria-expanded="false">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right" x-placement="bottom-end"
                                                style="position: absolute; transform: translate3d(14px, 18px, 0px); top: 0px; left: 0px; will-change: transform;">
                                                {{-- @if ($transaction->status == 'PENDING')
                                                    <a href="{{ route('transaction.status', $transaction->id) }}?status='SUCCESS'" class="dropdown-item">Buat Sukses</a>
                                                    <a href="{{ route('transaction.status', $transaction->id) }}?status='FAILED'" class="dropdown-item">Buat Gagal</a>
                                                @endif --}}
                                                <!-- item-->
                                                <a 
                                                    href="#myModal"
                                                    class="dropdown-item"
                                                    data-remote="{{ route('transaction.show', $transaction->id) }}"
                                                    data-toggle="modal"
                                                    data-target="#myModal"
                                                    data-title="Detail transaksi {{ $transaction->uuid }}"
                                                >Detail Transaksi</a>
                                                <a href="{{ route('transaction.edit', $transaction->id) }}" class="dropdown-item">Edit</a>
                                                <!-- item-->
                                                {{-- <a href="javascript:void(0);" class="dropdown-item" id="del-btn"
                                                    onclick="
                                                    event.preventDefault(); 
                                                    confirm('Are you sure you want to delete') ? document.getElementById('delete-form').submit() : false;
                                                    ">Delete</a> --}}
                                                <a href="#" class="dropdown-item confirmation-btn">Delete</a>

                                                <form class="delete-form" action="{{ route('transaction.destroy', $transaction->id) }}" method="POST" style="display: none;">
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
                            Total Transactions: {{ $transactions->total() }}
                        </div>
                        <nav aria-label="Page navigation example">
                            {{-- <ul class="pagination">
                                <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item active"><a class="page-link " href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul> --}}
                            {{ $transactions->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                </div>
                <div class="modal-body">
                    <i class="fa fa-spinner fa-spin" aria-hidden="true"></i>
                </div>
                {{-- <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save</button>
                </div> --}}
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
        $(document).ready(function(){
            $('#myModal').on('show.bs.modal', function(e){
                let btn = $(e.relatedTarget);
                const modal = $(this);
                
                modal.find('.modal-body').load(btn.data("remote"));
                modal.find('.modal-title').html(btn.data("tile"));
            });
        });
    </script>
@endpush