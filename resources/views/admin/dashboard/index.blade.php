@extends('layouts.app')


@section('title')
    Dashboard
@stop
@section('top-bar')
    @include('includes.top-bar')
@stop

@section('left-sidebar')
    @include('includes.left-sidebar')
@stop

@push('include-js')

    <!-- Jquery CountTo Plugin Js -->
    <script src="{{ asset('asset/plugins/jquery-countto/jquery.countTo.js') }}"></script>

    <!-- Morris Plugin Js -->
    <script src="{{ asset('asset/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('asset/plugins/morrisjs/morris.js') }}"></script>

    <!-- ChartJs -->
    <script src="{{ asset('asset/plugins/chartjs/Chart.bundle.js') }}"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="{{ asset('asset/plugins/flot-charts/jquery.flot.js') }}"></script>
    <script src="{{ asset('asset/plugins/flot-charts/jquery.flot.resize.js') }}"></script>
    <script src="{{ asset('asset/plugins/flot-charts/jquery.flot.pie.js') }}"></script>
    <script src="{{ asset('asset/plugins/flot-charts/jquery.flot.categories.js') }}"></script>
    <script src="{{ asset('asset/plugins/flot-charts/jquery.flot.time.js') }}"></script>
    <script src="{{ asset('asset/js/pages/index.js') }}"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="{{ asset('asset/plugins/jquery-sparkline/jquery.sparkline.js') }}"></script>


@endpush


@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">library_add</i>
                        </div>
                        <div class="content">
                            <div class="text">Categories</div>

                            <div class="number count-to" data-from="0" data-to="{{ App\Category::all()->count()  }}" data-speed="1000"
                                 data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="fas fa-newspaper"></i>
                        </div>
                        <div class="content">
                            <div class="text">Blog</div>
                            <div class="number count-to" data-from="0" data-to="{{ App\Blog::all()->count() }}" data-speed="1000"
                                 data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class=" fas fa-users"></i>
                        </div>
                        <div class="content">
                            <div class="text">Team</div>
                            <div class="number count-to" data-from="0" data-to="{{ App\Team::all()->count()  }}" data-speed="1000"
                                 data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">Users</div>
                            <div class="number count-to" data-from="0" data-to="{{ App\User::all()->count()  }}" data-speed="1000"
                                 data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->

        </div>
    </section>

@stop