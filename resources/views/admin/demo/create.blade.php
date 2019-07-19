@extends('layouts.app')

{{--Important Variables--}}

<?php
$moduleName = " slider";
$createItemName = "Create" . $moduleName;

$breadcrumbMainName = $moduleName;
$breadcrumbCurrentName = "Create";

$breadcrumbMainIcon = " fas fa-sliders-h";
$breadcrumbCurrentIcon = "archive";


$ModelName = 'App\Slider';

$ParentRouteName = 'slider';

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
                                class="{{ $breadcrumbMainIcon  }}"> </i>{{  $breadcrumbMainName }}</a>
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
                                      action="{{ route($ParentRouteName.'.store') }}">

                                    {{ csrf_field() }}
                                    <div class="row clearfix">

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 field_area">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <textarea  name="particulars" rows="2" class="form-control no-resize"
                                                              placeholder="Particulars"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-line">
                                                <button type="submit" class="btn btn-primary m-t-15 waves-effect">
                                                    Create
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



        // Validation and calculation on Cr Voucher
        var UiController = (function () {

            var DOMString = {
                submit_form: 'form.form',

                field_area: '.field_area',

                project_id: 'select[name=project_id]',


                head_of_account_id: 'select[name=head_of_account_id]',
                date: 'input[name=date]',
                amount: 'input[name=amount]',
            };

            return {
                getDOMString: function () {
                    return DOMString;
                },
                getFields: function () {
                    return {
                        get_form: document.querySelector(DOMString.submit_form),

                        get_project_id: document.querySelector(DOMString.project_id),

                        get_head_of_account_id: document.querySelector(DOMString.head_of_account_id),
                        get_date: document.querySelector(DOMString.date),
                        get_amount: document.querySelector(DOMString.amount),
                    }
                },
                getInputsValue: function () {
                    var Fields = this.getFields();
                    return {
                        project_id: Fields.get_project_id.value == "" ? 0 : parseFloat(Fields.get_project_id.value),

                        head_of_account_id: Fields.get_head_of_account_id.value == "" ? 0 : parseFloat(Fields.get_head_of_account_id.value),
                        date: Fields.get_date.value == "" ? 0 : Fields.get_date.value,
                        amount: Fields.get_amount.value == "" ? 0 : parseFloat(Fields.get_amount.value),

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

                var FieldName1 = " Project";
                var FieldName2 = " Bank Cash";
                var FieldName3 = " Head Of Account Category";
                var FieldName4 = " Date";
                var FieldName5 = " Amount";
                var FieldName6 = " Customer";
                var FieldName7 = " Product";
                var FieldName8 = " Name";
                var FieldName9 = " Cheque Number";

                if ( Values.project_id == 0) {
                   toastr["error"]('Select Any' + FieldName1);
                    e.preventDefault();
                }

                if ( Values.bankcash_id == 0) {
                   toastr["error"]('Select Any' + FieldName2);
                    e.preventDefault();
                }

                if ( Values.head_of_account_id == 0) {
                   toastr["error"]('Select Any' + FieldName3);
                    e.preventDefault();
                }

                if (Values.date == 0) {
                    toastr["error"]('Set Any' + FieldName4);
                    e.preventDefault();
                }

                if ( Values.amount == 0) {
                    toastr["error"]('Set Any' + FieldName5);
                    e.preventDefault();
                }

                if (Values.type == 1) {
                    if ( Values.customer_id ==0 ){
                        toastr["error"]('Select Any' + FieldName6);
                        e.preventDefault();
                    }
                    if ( Values.product_id ==0 ){
                        toastr["error"]('Select Any' + FieldName7);
                        e.preventDefault();
                    }
                }

                if (Values.type == 2){
                    if ( Values.name == 0 ){
                        toastr["error"]('Set Any' + FieldName8);
                        e.preventDefault();
                    }
                }

                if (Values.bankcash_id > 1){
                    if ( Values.cheque_number == 0){
                        toastr["error"]('Set Any' + FieldName9);
                        e.preventDefault();
                    }
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

@endpush
