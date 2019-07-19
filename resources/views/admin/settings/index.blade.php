@extends('layouts.app')

@section('title')
    Settings
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
            <div class="block-header pull-left">
                <h2>General Settings</h2>
            </div>

            <ol class="breadcrumb breadcrumb-col-cyan pull-right">
                <li>
                    <a href="{{ route('dashboard') }}"><i class="material-icons">home</i> Home</a>
                </li>
                <li>
                    <a href="{{ route('settings') }}"><i class="material-icons">settings</i>Settings</a>
                </li>
                <li class="active"><i class="material-icons">archive</i> General Settings</li>
            </ol>

            <!-- Inline Layout | With Floating Label -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                General settings
                                <small>Put Your Company Information</small>
                            </h2>

                            <div class="body">
                                <form enctype="multipart/form-data" id="form_validation" method="post"
                                      action="{{ route('setting.update') }}">

                                    {{ csrf_field() }}
                                    <div class="row clearfix">

                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <label>Title</label>
                                                    <input placeholder="Title" name="title"
                                                           value="{{ $setting->title  }}" type="text"
                                                           class="form-control" required>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <label>Company Name</label>
                                                    <input name="company_name" value="{{ $setting->company_name  }}"
                                                           type="text" class="form-control" required>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <label>Customer Support Number</label>
                                                    <input placeholder="Customer Support Number" name="customer_support_number" value="{{ $setting->customer_support_number  }}"
                                                           type="text" class="form-control" required>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <label>Customer Support Email</label>
                                                    <input placeholder="Customer Support Email" name="customer_support_email" value="{{ $setting->customer_support_email  }}"
                                                           type="email" class="form-control" required>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <label>Location</label>
                                                    <input placeholder="Location" name="location" value="{{ $setting->location  }}"
                                                           type="text" class="form-control" required>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <label>Working Hour</label>
                                                    <input placeholder="Working Hour" name="working_hour" value="{{ $setting->working_hour  }}"
                                                           type="text" class="form-control" required>

                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <div class="form-group ">
                                                <div class="form-line">
                                                    <label>Company Logo</label>
                                                    <input name="company_logo" type="file" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6">
                                            <img style="width: 125px;height: 125px"
                                                 src="{{ asset( 'upload/company-logo/'.$setting->company_logo_main) }}"
                                                 alt="">
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <div class="form-group ">
                                                <div class="form-line">
                                                    <label>Favicon</label>
                                                    <input name="company_logo_favicon" type="file" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6">
                                            <img style="width: 125px;height: 125px"
                                                 src="{{ asset( 'upload/company-logo/'.$setting->company_logo_favicon) }}"
                                                 alt="">
                                        </div>

                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                            <div class="form-group ">
                                                <div class="form-line">
                                                    <label>Page Banner</label>
                                                    <input name="page_banner" type="file" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6">
                                            <img style="width: 125px;height: 125px"
                                                 src="{{ asset( 'upload/company-logo/'.$setting->page_banner) }}"
                                                 alt="">
                                        </div>



                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <label>Address</label>
                                                    <input name="address" value="{{ $setting->address  }}" type="text"
                                                           class="form-control">

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6">
                                            <h2>
                                                Footer settings
                                                <small>Put Your Footer Information</small>
                                                <hr>
                                            </h2>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-4">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <label>Footer About</label>
                                                    <textarea placeholder="Footer About" class="form-control" name="footer_about" >{{ $setting->footer_about }}</textarea>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-6">
                                            <h2>
                                                Social settings
                                                <small>Put Your Socila Links</small>
                                                <hr>
                                            </h2>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <label>Facebook</label>
                                                    <input placeholder="Facebook links" name="facebook" value="{{ $setting->facebook  }}" type="text"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <label>Twitter</label>
                                                    <input placeholder="Twitter links" name="twitter" value="{{ $setting->twitter  }}" type="text"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <label>Linked-In</label>
                                                    <input placeholder="LinkedIn links" name="linkedIn" value="{{ $setting->linkedIn  }}" type="text"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <label>YouTube</label>
                                                    <input placeholder="YouTube links" name="youtube" value="{{ $setting->youtube  }}" type="text"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-4">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <label>Instra Gram</label>
                                                    <input placeholder="YouTube links" name="instragram" value="{{ $setting->instragram  }}" type="text"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>




                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-line">
                                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">
                                                    Update
                                                </button>
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



@push('include-js')


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