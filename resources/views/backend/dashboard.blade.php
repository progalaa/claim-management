@extends('backend.common.template')

@section('title', 'Dashboard')

@section('content')
    @if(Session::has('msg')){!! Session::get('msg') !!}@endif
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 col-lg-3 grid-margin stretch-card">
                <div class="card bg-gradient-primary text-white text-center card-shadow-primary">
                    <div class="card-body">
                        <h6 class="font-weight-normal">Total invoices {{ App::getLocale() }}</h6>
                        <h2 class="mb-0">28893</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 grid-margin stretch-card">
                <div class="card bg-gradient-danger text-white text-center card-shadow-danger">
                    <div class="card-body">
                        <h6 class="font-weight-normal">Total invoices</h6>
                        <h2 class="mb-0">28893</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 grid-margin stretch-card">
                <div class="card bg-gradient-warning text-white text-center card-shadow-warning">
                    <div class="card-body">
                        <h6 class="font-weight-normal">Total invoices</h6>
                        <h2 class="mb-0">28893</h2>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 grid-margin stretch-card">
                <div class="card bg-gradient-info text-white text-center card-shadow-info">
                    <div class="card-body">
                        <h6 class="font-weight-normal">Total invoices</h6>
                        <h2 class="mb-0">28893</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body pb-0">
                        <h4 class="card-title">Daily Sales</h4>
                        <div class="d-flex justify-content-between justify-content-lg-start flex-wrap">
                            <div class="mr-5 mb-2">
                                <h3>
                                    56789
                                </h3>
                                <h6 class="font-weight-normal mb-0">
                                    Online sales
                                </h6>
                            </div>
                            <div class="mb-2">
                                <h3>
                                    12345
                                </h3>
                                <h6 class="font-weight-normal mb-0">
                                    Sales in store
                                </h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body d-flex align-items-end p-0">
                        <div class="mt-auto w-100">
                            <div id="sales-legend" class="chartjs-legend mt-2 mb-4"></div>
                            <canvas id="chart-sales"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h6 class="card-title">Activity</h6>
                        </div>
                        <div class="list d-flex align-items-center border-bottom pb-3">
                            <img class="img-sm rounded-circle" src="https://via.placeholder.com/43x43" alt="">
                            <div class="wrapper w-100 ml-3">
                                <p><b>Dobrick </b>published an article</p>
                                <small class="text-muted">2 hours ago</small>
                            </div>
                        </div>
                        <div class="list d-flex align-items-center border-bottom py-3">
                            <img class="img-sm rounded-circle" src="https://via.placeholder.com/43x43" alt="">
                            <div class="wrapper w-100 ml-3">
                                <p><b>Stella </b>created an event</p>
                                <small class="text-muted">3 hours ago</small>
                            </div>
                        </div>
                        <div class="list d-flex align-items-center border-bottom py-3">
                            <img class="img-sm rounded-circle" src="https://via.placeholder.com/43x43" alt="">
                            <div class="wrapper w-100 ml-3">
                                <p><b>Peter </b>submitted the reports</p>
                                <small class="text-muted">1 hours ago</small>
                            </div>
                        </div>
                        <div class="list d-flex align-items-center border-bottom py-3">
                            <img class="img-sm rounded-circle" src="https://via.placeholder.com/43x43" alt="">
                            <div class="wrapper w-100 ml-3">
                                <p><b>Nateila </b>updated the docs</p>
                                <small class="text-muted">1 hours ago</small>
                            </div>
                        </div>
                        <div class="list d-flex align-items-center pt-3">
                            <img class="img-sm rounded-circle" src="https://via.placeholder.com/43x43" alt="">
                            <div class="wrapper w-100 ml-3">
                                <p><b>Tom </b>uploaded the demo</p>
                                <small class="text-muted">3 hours ago</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Traffic</h4>
                        <div class="w-50 mx-auto">
                            <canvas id="traffic-chart" width="100" height="100"></canvas>
                        </div>
                        <div class="text-center mt-5">
                            <h4 class="mb-2">Traffic for the day</h5>
                                <p class="card-description mb-5">Traffic through the sources google and facebook for the day</p>
                        </div>
                        <div id="traffic-chart-legend" class="chartjs-legend traffic-chart-legend"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
