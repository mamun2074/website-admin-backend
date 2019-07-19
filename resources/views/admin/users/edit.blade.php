@extends('layouts.app')

@section('title')
    Edit User
@stop

@section('top-bar')
    @include('includes.top-bar')
@stop
@section('left-sidebar')
    @include('includes.left-sidebar')
@stop
@section('content')

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <a class="btn btn-sm btn-info" href="{{ route('users') }}">Back</a>
            </div>
            <!-- Inline Layout | With Floating Label -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Edit User
                                <small>You Can Change Information</small>
                            </h2>

                            <div class="body">
                                <form id="form_validation" method="post" action="{{ route('user.update',['id'=>$user->id]) }}">

                                    {{ csrf_field() }}
                                    <div class="row clearfix">

                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input value="{{ $user->name  }}" name="name" type="text" class="form-control" required>
                                                    <label class="form-label">Name</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input readonly value="{{ $user->email }}"  name="email" type="email" class="form-control" required>
                                                    <label class="form-label">Email Address</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input name="password" type="password" class="form-control " >
                                                    <label class="form-label">Password</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input name="confirm_password" type="password" class="form-control">
                                                    <label class="form-label">Confirm Password</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                            <div class="form-line">
                                                <select class="form-control show-tick" name="user_role"
                                                        id="user_role">
                                                    <option>User Role</option>
                                                    <option @if ($user->user_role==1)
                                                        selected
                                                    @endif value="1">Admin</option>
                                                    <option @if ($user->user_role==2)
                                                        selected
                                                    @endif value="2">Editor</option>
                                                    <option @if ($user->user_role==3)
                                                        selected
                                                    @endif value="3">Author</option>
                                                    <option @if ($user->user_role==4)
                                                        selected
                                                    @endif value="4">Subscriber</option>
                                                    <option @if ($user->user_role==5)
                                                        selected
                                                    @endif value="5">Contributer</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                            <div class="form-line">
                                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">Update</button>
                                            </div>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- #END# Inline Layout | With Floating Label -->
            </div>
    </section>

@stop


@push('include-css')

    <!-- Colorpicker Css -->
    <link href="{{ asset('asset/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}" rel="stylesheet"/>

    <!-- Dropzone Css -->
    <link href="{{ asset('asset/plugins/dropzone/dropzone.css') }}" rel="stylesheet">

    <!-- Multi Select Css -->
    <link href="{{ asset('asset/plugins/multi-select/css/multi-select.css') }}" rel="stylesheet">

    <!-- Bootstrap Spinner Css -->
    <link href="{{ asset('asset/plugins/jquery-spinner/css/bootstrap-spinner.css') }}" rel="stylesheet">

    <!-- Bootstrap Tagsinput Css -->
    <link href="{{ asset('asset/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css') }}" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="{{ asset('asset/plugins/bootstrap-select/css/bootstrap-select.css') }}" rel="stylesheet"/>

    <!-- noUISlider Css -->
    <link href="{{ asset('asset/plugins/nouislider/nouislider.min.css') }}" rel="stylesheet"/>

    <!-- Sweet Alert Css -->
    <link href="{{ asset('asset/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet"/>


@endpush

@push('include-js')
    <script src="{{ asset('asset/js/pages/forms/advanced-form-elements.js') }}"></script>
    <!-- Jquery Validation Plugin Css -->
    <script src="{{ asset('asset/plugins/jquery-validation/jquery.validate.js') }}"></script>
    <!-- JQuery Steps Plugin Js -->
    <script src="{{ asset('asset/plugins/jquery-steps/jquery.steps.js') }}"></script>


    <!-- Sweet Alert Plugin Js -->
    <script src="{{ asset('asset/plugins/sweetalert/sweetalert.min.js') }}"></script>

    <script src="{{ asset('asset/js/pages/forms/form-validation.js') }}"></script>


    <script>
        @if(Session::has('success'))
            toastr["success"]('{{ Session::get('success') }}');
        @endif

                @if(Session::has('error'))
            toastr["error"]('{{ Session::get('error') }}');
        @endif

                @if ($errors->any())
                @foreach ($errors->all() as $error)
            toastr["error"]('{{ $error }}');
        @endforeach
        @endif

    </script>

@endpush
