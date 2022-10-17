@extends('_layout.layout_main')

@section('content')
    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <div class="row">
                <div class="col-sm-3">
                    <div class="card overflow-hidden">
                        <div class="card-header p-3 pb-0">
                            <p class="text-sm mb-0 text-capitalize font-weight-bold">Daily Active Users</p>
                            <h5 class="font-weight-bolder mb-0">
                                {{$DAUdata->where('created_at', '>', $now)->count()}}
                                <span class="text-success text-sm font-weight-bolder">
                                </span>
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="chart">
                                <canvas id="chart-line-1" class="chart-canvas" height="100"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 mt-sm-0 mt-4">
                    <div class="card overflow-hidden">
                        <div class="card-header p-3 pb-0">
                            <p class="text-sm mb-0 text-capitalize font-weight-bold">New Registered Users</p>
                            <h5 class="font-weight-bolder mb-0">
                                {{$NRUdata->where('created_at', '>', $now)->count()}}
                                <span class="text-success text-sm font-weight-bolder"></span>
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="chart">
                                <canvas id="chart-line-2" class="chart-canvas" height="100"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 mt-sm-0 mt-4">
                    <div class="card overflow-hidden">
                        <div class="card-header p-3 pb-0">
                            <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Mahasiswa</p>
                            <h5 class="font-weight-bolder mb-0">
                                {{$StudentData->count()}}
                                <span class="text-success text-sm font-weight-bolder"></span>
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="chart">
                                <canvas id="chart-line-2" class="chart-canvas" height="100"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 mt-sm-0 mt-4">
                    <div class="card overflow-hidden">
                        <div class="card-header p-3 pb-0">
                            <p class="text-sm mb-0 text-capitalize font-weight-bold">Jumlah Dosen</p>
                            <h5 class="font-weight-bolder mb-0">
                                {{$LecturerData->count()}}
                                <span class="text-success text-sm font-weight-bolder"></span>
                            </h5>
                        </div>
                        <div class="card-body p-0">
                            <div class="chart">
                                <canvas id="chart-line-2" class="chart-canvas" height="100"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-sm-6">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="mb-0">Daily Active User</h6>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end align-items-center">
                            <i class="far fa-calendar-alt me-2"></i>
                            <small>Today</small>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <ul class="list-group">
                        @foreach ($DAUdata->take(5) as $x)
                        <li class="list-group-item border-0 justify-content-between ps-0 pb-0 border-radius-lg">
                            <div class="d-flex">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">{{$x->user->full_name}} ({{$x->user->id}})</h6>
                                        <span class="text-xs">{{$x->user->created_at}}</span>
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark mt-3 mb-2" />
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-sm-6 mt-sm-0 mt-4">
            <div class="card h-100">
                <div class="card-header pb-0 p-3">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="mb-0">New Registered Users</h6>
                        </div>
                        <div class="col-md-6 d-flex justify-content-end align-items-center">
                            <i class="far fa-calendar-alt me-2"></i>
                            <small>Today</small>
                        </div>
                    </div>
                </div>
                <div class="card-body p-3">
                    <ul class="list-group">
                        @foreach ($NRUdata->take(5) as $x)
                        <li class="list-group-item border-0 justify-content-between ps-0 pb-0 border-radius-lg">
                            <div class="d-flex">
                                <div class="d-flex align-items-center">
                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">{{$x->id}}</h6>
                                        <span class="text-xs">{{$x->created_at}}</span>
                                    </div>
                                </div>
                            </div>
                            <hr class="horizontal dark mt-3 mb-2" />
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
