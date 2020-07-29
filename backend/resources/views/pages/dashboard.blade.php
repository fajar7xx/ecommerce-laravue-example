@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<!-- ============================================================== -->
<!-- pageheader  -->
<!-- ============================================================== -->
<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
        <div class="page-header">
            <h2 class="pageheader-title">E-commerce Dashboard Template </h2>
            <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis
                faucibus at enim quis massa lobortis rutrum.</p>
            <div class="page-breadcrumb">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">E-Commerce Dashboard Template</li>
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
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 class="text-muted">Income</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">Rp. {{ $income }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card border-3 border-top border-top-primary">
                <div class="card-body">
                    <h5 class="text-muted">Sales</h5>
                    <div class="metric-value d-inline-block">
                        <h1 class="mb-1">{{ $sales }}</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end new customer  -->
        <!-- ============================================================== -->
    </div>
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            {{-- <div class="card">
                <h5 class="card-header">Recent Orders</h5>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-light">
                                <tr class="border-0">
                                    <th class="border-0">#</th>
                                    <th class="border-0">Image</th>
                                    <th class="border-0">Product Name</th>
                                    <th class="border-0">Product Id</th>
                                    <th class="border-0">Quantity</th>
                                    <th class="border-0">Price</th>
                                    <th class="border-0">Order Time</th>
                                    <th class="border-0">Customer</th>
                                    <th class="border-0">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>
                                        <div class="m-r-10"><img src="assets/images/product-pic.jpg" alt="user"
                                                class="rounded" width="45"></div>
                                    </td>
                                    <td>Product #1 </td>
                                    <td>id000001 </td>
                                    <td>20</td>
                                    <td>$80.00</td>
                                    <td>27-08-2018 01:22:12</td>
                                    <td>Patricia J. King </td>
                                    <td><span class="badge-dot badge-brand mr-1"></span>InTransit </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>
                                        <div class="m-r-10"><img src="assets/images/product-pic-2.jpg" alt="user"
                                                class="rounded" width="45"></div>
                                    </td>
                                    <td>Product #2 </td>
                                    <td>id000002 </td>
                                    <td>12</td>
                                    <td>$180.00</td>
                                    <td>25-08-2018 21:12:56</td>
                                    <td>Rachel J. Wicker </td>
                                    <td><span class="badge-dot badge-success mr-1"></span>Delivered </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>
                                        <div class="m-r-10"><img src="assets/images/product-pic-3.jpg" alt="user"
                                                class="rounded" width="45"></div>
                                    </td>
                                    <td>Product #3 </td>
                                    <td>id000003 </td>
                                    <td>23</td>
                                    <td>$820.00</td>
                                    <td>24-08-2018 14:12:77</td>
                                    <td>Michael K. Ledford </td>
                                    <td><span class="badge-dot badge-success mr-1"></span>Delivered </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>
                                        <div class="m-r-10"><img src="assets/images/product-pic-4.jpg" alt="user"
                                                class="rounded" width="45"></div>
                                    </td>
                                    <td>Product #4 </td>
                                    <td>id000004 </td>
                                    <td>34</td>
                                    <td>$340.00</td>
                                    <td>23-08-2018 09:12:35</td>
                                    <td>Michael K. Ledford </td>
                                    <td><span class="badge-dot badge-success mr-1"></span>Delivered </td>
                                </tr>
                                <tr>
                                    <td colspan="9"><a href="#" class="btn btn-outline-light float-right">View
                                            Details</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> --}}
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
                                    @elseif($transaction ?? ''->status == 'FAILED')
                                    <span class="badge badge-danger">Failed</span>
                                    @else
                                    <span></span>
                                    @endif
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
            </div>
        </div>
 
        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
            <div class="card">
                <h5 class="card-header"> Status</h5>
                <div class="card-body">
                    <div class="ct-chart ct-golden-section" id="chart-status" style="height: 315px;"></div>
                    <div class="text-center m-t-40">
                        <span class="legend-item mr-3">
                            <span class="fa-xs text-primary mr-1 legend-tile"><i
                                    class="fa fa-fw fa-square-full "></i></span><span class="legend-text">Success</span>
                        </span>
                        <span class="legend-item mr-3">
                            <span class="fa-xs text-secondary mr-1 legend-tile"><i
                                    class="fa fa-fw fa-square-full"></i></span>
                            <span class="legend-text">Failed</span>
                        </span>
                        <span class="legend-item mr-3">
                            <span class="fa-xs text-info mr-1 legend-tile"><i
                                    class="fa fa-fw fa-square-full"></i></span>
                            <span class="legend-text">Pending</span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end customer acquistion  -->
        <!-- ============================================================== -->
    </div>
</div>
@endsection

@push('scripts')
    <script>         
    // ============================================================== 
    // Product Category
    // ============================================================== 
    var chart = new Chartist.Pie('#chart-status', {
        series: [{{ $chart['success'] }}, {{ $chart['failed'] }}, {{ $chart['pending'] }}],
        labels: ['Success', 'Failed', 'Pending']
    }, {
        donut: true,
        showLabel: false,
        donutWidth: 60,
        donutSolid: true,
        startAngle: 270,

    });


    chart.on('draw', function(data) {
        if (data.type === 'slice') {
            // Get the total path length in order to use for dash array animation
            var pathLength = data.element._node.getTotalLength();

            // Set a dasharray that matches the path length as prerequisite to animate dashoffset
            data.element.attr({
                'stroke-dasharray': pathLength + 'px ' + pathLength + 'px'
            });

            // Create animation definition while also assigning an ID to the animation for later sync usage
            var animationDefinition = {
                'stroke-dashoffset': {
                    id: 'anim' + data.index,
                    dur: 1000,
                    from: -pathLength + 'px',
                    to: '0px',
                    easing: Chartist.Svg.Easing.easeOutQuint,
                    // We need to use `fill: 'freeze'` otherwise our animation will fall back to initial (not visible)
                    fill: 'freeze'
                }
            };

            // If this was not the first slice, we need to time the animation so that it uses the end sync event of the previous animation
            if (data.index !== 0) {
                animationDefinition['stroke-dashoffset'].begin = 'anim' + (data.index - 1) + '.end';
            }

            // We need to set an initial value before the animation starts as we are not in guided mode which would do that for us
            data.element.attr({
                'stroke-dashoffset': -pathLength + 'px'
            });

            // We can't use guided mode as the animations need to rely on setting begin manually
            // See http://gionkunz.github.io/chartist-js/api-documentation.html#chartistsvg-function-animate
            data.element.animate(animationDefinition, false);
        }
    });

    // For the sake of the example we update the chart every time it's created with a delay of 8 seconds
    </script>
@endpush