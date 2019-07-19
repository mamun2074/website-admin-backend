@extends('layouts.app')

{{--Important Variables--}}

<?php


$moduleName = " team";
$createItemName = "Create" . $moduleName;

$breadcrumbMainName = $moduleName;
$breadcrumbCurrentName = "Create";

$breadcrumbMainIcon = " fas users";
$breadcrumbCurrentIcon = "archive";


$ModelName = 'App\Team';

$ParentRouteName = 'team';



?>

@section('title')
    {{ $moduleName }}->{{ $createItemName }}
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
                <a class="btn btn-sm btn-info" href="{{ route($ParentRouteName) }}">Back</a>
            </div>

            <ol class="breadcrumb breadcrumb-col-cyan pull-right">
                <li><a href="{{ route($ParentRouteName) }}"><i class="material-icons">home</i> Home</a></li>

                <li><a href="{{ route($ParentRouteName) }}"><i
                                class="fas fa-wallet"> </i>{{  $breadcrumbMainName }}</a>
                </li>
                <li class="active"><i
                            class="material-icons">{{ $breadcrumbCurrentIcon  }}</i> {{ $breadcrumbCurrentName  }}</li>
            </ol>

            <!-- Inline Layout | With Floating Label -->
            <div class="row clearfix">

                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                {{ $createItemName  }}
                                <small>Put {{ $moduleName  }} Information</small>
                            </h2>

                            <div class="body">
                                <form class="form" id="form_validation" method="post"
                                      action="{{ route($ParentRouteName.'.update',['id'=>$item->id]) }}"  enctype="multipart/form-data">

                                    {{ csrf_field() }}

                                    <div class="row clearfix">

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 field_area">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <label for="TitNamele">Name</label>

                                                    <input value="{{ $item->name  }}" id="Name" placeholder="Name" type="text" name="name"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 field_area">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <label for="thumbnail">Thumbnail</label>
                                                    <input id="thumbnail" type="file" name="thumbnail"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 field_area">
                                            <div class="form-group form-float">
                                                <img  style="width: 80px; height: 80px" src="{{ asset($item->thumbnail)  }}" alt="">
                                            </div>
                                        </div>


                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 field_area">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <label for="Designation">Designation</label>
                                                    <input  value="{{ $item->designation  }}" id="Designation" placeholder="Designation" type="text"
                                                           name="designation" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 field_area">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <label for="Facebook">Facebook</label>
                                                    <input  value="{{ $item->facebook  }}" id="Facebook" type="text" name="facebook"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 field_area">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <label for="twitter">Twitter</label>
                                                    <input  value="{{ $item->twitter  }}" id="twitter" type="text" name="twitter" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 field_area">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <label for="linkedin">Linked In</label>
                                                    <input  value="{{ $item->linkedin  }}" id="linkedin" type="text" name="linkedin"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6 field_area">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <label for="youtube">Youtube</label>
                                                    <input  value="{{ $item->youtube  }}" id="youtube" type="text" name="youtube" class="form-control">
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 field_area">
                                            <div class="form-group form-float">
                                                <div class="form-line">

                                                    <textarea cols="5" rows="50" placeholder="Pots content here"
                                                              class="form-control" name="team_content"
                                                              id="summernote"> {{ $item->team_content  }} </textarea>
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



    <!-- Bootstrap Material Datetime Picker Css -->
    <link href="{{ asset('asset/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}"
          rel="stylesheet"/>

    <!-- Bootstrap DatePicker Css -->
    <link href="{{ asset('asset/plugins/bootstrap-datepicker/css/bootstrap-datepicker.css') }}" rel="stylesheet"/>


    <!-- noUISlider Css -->
    <link href="{{ asset('asset/plugins/nouislider/nouislider.min.css') }}" rel="stylesheet"/>

    <!-- Sweet Alert Css -->
    <link href="{{ asset('asset/plugins/sweetalert/sweetalert.css') }}" rel="stylesheet"/>


    {{--Summer Note--}}
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">



@endpush

@push('include-js')


    <!-- Moment Plugin Js -->
    <script src="{{ asset('asset/plugins/momentjs/moment.js') }}"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="{{ asset('asset/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>

    <!-- Bootstrap Datepicker Plugin Js -->
    <script src="{{ asset('asset/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>


    <!-- Sweet Alert Plugin Js -->
    <script src="{{ asset('asset/plugins/sweetalert/sweetalert.min.js') }}"></script>


    <!-- Autosize Plugin Js -->
    <script src="{{ asset('asset/plugins/autosize/autosize.js') }}"></script>

    <script src="{{ asset('asset/js/pages/forms/basic-form-elements.js') }}"></script>


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


        // Validation
        var UiController = (function () {

            var DOMString = {
                submit_form: 'form.form',

                field_area: '.field_area',

                name: 'input[name=name]',
                designation: 'input[name=designation]',
                team_content: 'textarea[name=team_content]',
                thumbnail: 'input[name=thumbnail]',

            };

            return {
                getDOMString: function () {
                    return DOMString;
                },
                getFields: function () {
                    return {
                        get_form: document.querySelector(DOMString.submit_form),

                        get_name: document.querySelector(DOMString.name),
                        get_designation: document.querySelector(DOMString.designation),
                        get_team_content: document.querySelector(DOMString.team_content),
                        get_thumbnail: document.querySelector(DOMString.thumbnail),

                    }
                },
                getInputsValue: function () {
                    var Fields = this.getFields();
                    return {
                        name: Fields.get_name.value == "" ? 0 : Fields.get_name.value,
                        designation: Fields.get_designation.value == "" ? 0 : Fields.get_designation.value,
                        team_content: Fields.get_team_content.value == "" ? 0 : Fields.get_team_content.value,
                        thumbnail: Fields.get_thumbnail.value == "" ? 0 : Fields.get_thumbnail.value,

                    }
                },

            }
        })();

        var MainController = (function (UICnt) {

            var DOMString = UICnt.getDOMString();
            var Fields = UICnt.getFields();

            var setUpEventListner = function () {
                Fields.get_form.addEventListener('submit', validation);
            };

            var validation = function (e) {
                var Values, Fields;
                Values = UICnt.getInputsValue();
                Fields = UICnt.getFields();


                if (Values.name == 0) {
                    toastr["error"]('Name field should not empty');
                    e.preventDefault();
                }
                if (Values.designation == 0) {
                    toastr["error"]('Designation field should not empty');
                    e.preventDefault();
                }
                if (Values.team_content == 0) {
                    toastr["error"]('Team content field should not empty');
                    e.preventDefault();
                }



            };

            return {
                init: function () {
                    console.log("App Is running");
                    setUpEventListner();
                }
            }

        })(UiController);

        MainController.init();


    </script>


    {{--Text Editor--}}
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>
    <script>
        $(document).ready(function () {
            $('#summernote').summernote({
                height: 300
            });
        });
    </script>


@endpush
