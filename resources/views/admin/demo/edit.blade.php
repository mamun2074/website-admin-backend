@extends('layouts.app')

{{--Important Variables--}}

<?php


$moduleName = " InitialHeadBalance";
$createItemName = "Edit" . $moduleName;

$breadcrumbMainName = $moduleName;
$breadcrumbCurrentName = "Edit";

$breadcrumbMainIcon = "account_balance_wallet";
$breadcrumbCurrentIcon = "archive";


$ModelName = 'App\InitialHeadBalance';
$ParentRouteName = 'InitialHeadBalance';



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
                                      action="{{ route($ParentRouteName.'.update',['id'=>$item->id]) }}">

                                    {{ csrf_field() }}
                                    <div class="row clearfix">


                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 field_area">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <select data-live-search="true" class="form-control show-tick"
                                                            name="project_id">
                                                        <option value="0">Select Project Name</option>

                                                        @if (App\Project::all()->count() >0 )

                                                            @foreach( App\Project::all() as $project )
                                                                <option @if ( $project->id == $item->project_id ))
                                                                        selected
                                                                        @endif value="{{ $project->id  }}">{{ $project->name  }}</option>
                                                            @endforeach
                                                        @endif

                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 field_area">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <select data-live-search="true" class="form-control show-tick"
                                                            name="head_of_account_id"
                                                            id="">
                                                        <option value="0"> Select Head of Account Name</option>

                                                        @if (App\HeadOfAccount::where('dr','1')->get()->count() >0 )
                                                            @foreach( App\HeadOfAccount::where('dr','0')->get() as $HeadOfAccount )
                                                                <option @if ( $HeadOfAccount->id == $item->head_of_account_id )
                                                                        selected
                                                                        @endif value="{{ $HeadOfAccount->id  }}">{{ $HeadOfAccount->name  }}</option>
                                                            @endforeach
                                                        @endif

                                                    </select>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 field_area">
                                            <div class="form-group form-float">
                                                <div class="form-line" id="bs_datepicker_container">
                                                    <input autocomplete="off" value="{{ $item->date }}" name="date"
                                                           type="text"
                                                           class="form-control" placeholder="Please choose a date...">

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 field_area">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <input value="{{ $item->amount  }}" name="amount" type="number"
                                                           class="form-control">
                                                    <label class="form-label">Amount </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 field_area">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <textarea name="particulars" rows="2" class="form-control no-resize"
                                                              placeholder="Particulars">{{ $item->particulars  }}</textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-6 field_area">
                                            <div class="form-group form-float">
                                                <div class="form-line">
                                                    <span>Confirm ?</span> &nbsp;&nbsp;
                                                    <input value="1" name="confirm" type="radio" id="stock"
                                                           class="with-gap radio-col-cyan" @if ( $item->confirm ==1)
                                                           checked
                                                            @endif />
                                                    <label for="stock">Yes</label>
                                                    <input value="0" name="confirm" type="radio" id="stockNo"
                                                           class="with-gap radio-col-cyan" @if ( $item->confirm==0 )
                                                           checked
                                                            @endif />
                                                    <label for="stockNo">No</label>
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
                showProduct: 'showProduct',
                type: 'select[name=type]',
                name: 'input[name=name]',
                customer_id: 'select[name=customer_id]',
                product_id: 'select[name=product_id]',
                bankcash_id: 'select[name=bankcash_id]',
                cheque_number: 'input[name=cheque_number]',
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

                        get_showProduct: document.getElementById(DOMString.showProduct),

                        get_project_id: document.querySelector(DOMString.project_id),
                        get_type: document.querySelector(DOMString.type),
                        get_name: document.querySelector(DOMString.name),
                        get_customer_id: document.querySelector(DOMString.customer_id),
                        get_product_id: document.querySelector(DOMString.product_id),
                        get_bankcash_id: document.querySelector(DOMString.bankcash_id),
                        get_cheque_number: document.querySelector(DOMString.cheque_number),
                        get_head_of_account_id: document.querySelector(DOMString.head_of_account_id),
                        get_date: document.querySelector(DOMString.date),
                        get_amount: document.querySelector(DOMString.amount),
                    }
                },
                getInputsValue: function () {
                    var Fields = this.getFields();
                    return {
                        project_id: Fields.get_project_id.value == "" ? 0 : parseFloat(Fields.get_project_id.value),

                        type: Fields.get_type.value == "" ? 0 : parseFloat(Fields.get_type.value),

                        name: Fields.get_name.value == "" ? 0 : Fields.get_name.value,
                        customer_id: Fields.get_customer_id.value == "" ? 0 : parseFloat(Fields.get_customer_id.value),
                        product_id: Fields.get_product_id.value == "" ? 0 : parseFloat(Fields.get_product_id.value),
                        bankcash_id: Fields.get_bankcash_id.value == "" ? 0 : parseFloat(Fields.get_bankcash_id.value),
                        cheque_number: Fields.get_cheque_number.value == "" ? 0 : parseFloat(Fields.get_cheque_number.value),
                        head_of_account_id: Fields.get_head_of_account_id.value == "" ? 0 : parseFloat(Fields.get_head_of_account_id.value),
                        date: Fields.get_date.value == "" ? 0 : Fields.get_date.value,
                        amount: Fields.get_amount.value == "" ? 0 : parseFloat(Fields.get_amount.value),

                    }
                },

                hideName: function () {
                    var Fields = this.getFields();
                    var DomString = this.getDOMString();
                    var NameArea = Fields.get_name.closest(DomString.field_area);

                    if (NameArea) {
                        NameArea.style.display = "none";
                    }
                    return true;
                },

                showName: function () {
                    var Fields = this.getFields();
                    var DomString = this.getDOMString();
                    var NameArea = Fields.get_name.closest(DomString.field_area);
                    if (NameArea) {
                        NameArea.style.display = "block";
                    }
                    return true;
                },


                hideCustomer: function () {
                    var Fields = this.getFields();
                    var DomString = this.getDOMString();
                    var CustomerNameArea = Fields.get_customer_id.closest(DomString.field_area);
                    if (CustomerNameArea) {
                        CustomerNameArea.style.display = "none";
                    }
                    return true;
                },

                showCustomer: function () {
                    var Fields = this.getFields();
                    var DomString = this.getDOMString();
                    var CustomerNameArea = Fields.get_customer_id.closest(DomString.field_area);


                    if (CustomerNameArea) {
                        CustomerNameArea.style.display = "block";
                    }
                    return true;
                },

                hideProduct: function () {
                    var Fields = this.getFields();
                    var DomString = this.getDOMString();
                    var ProductNameArea = Fields.get_product_id.closest(DomString.field_area);
                    if (ProductNameArea) {
                        ProductNameArea.style.display = "none";
                    }
                    return true;
                },

                showProduct: function () {
                    var Fields = this.getFields();
                    var DomString = this.getDOMString();
                    var ProductNameArea = Fields.get_product_id.closest(DomString.field_area);

                    if (ProductNameArea) {
                        ProductNameArea.style.display = "block";
                    }
                    return true;
                },

                hideChequeNumber: function () {
                    var Fields = this.getFields();
                    var DomString = this.getDOMString();
                    var ProductNameArea = Fields.get_cheque_number.closest(DomString.field_area);
                    if (ProductNameArea) {
                        ProductNameArea.style.display = "none";
                    }
                    return true;
                },

                showChequeNumber: function () {
                    var Fields = this.getFields();
                    var DomString = this.getDOMString();
                    var ProductNameArea = Fields.get_cheque_number.closest(DomString.field_area);
                    if (ProductNameArea) {
                        ProductNameArea.style.display = "block";
                    }
                    return true;
                },


            }
        })();


        var MainController = (function (UICnt) {

            var DOMString = UICnt.getDOMString();
            var Fields = UICnt.getFields();

            var setUpEventListner = function () {
                Fields.get_form.addEventListener('submit', validation);
                Fields.get_type.addEventListener('change', typeChange);
                Fields.get_bankcash_id.addEventListener('change', bankcashChange);
                Fields.get_project_id.addEventListener('change', projectChange);
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

                if (Values.project_id == 0) {
                    toastr["error"]('Select Any' + FieldName1);
                    e.preventDefault();
                }

                if (Values.bankcash_id == 0) {
                    toastr["error"]('Select Any' + FieldName2);
                    e.preventDefault();
                }

                if (Values.head_of_account_id == 0) {
                    toastr["error"]('Select Any' + FieldName3);
                    e.preventDefault();
                }

                if (Values.date == 0) {
                    toastr["error"]('Set Any' + FieldName4);
                    e.preventDefault();
                }

                if (Values.amount == 0) {
                    toastr["error"]('Set Any' + FieldName5);
                    e.preventDefault();
                }

                if (Values.type == 1) {
                    if (Values.customer_id == 0) {
                        toastr["error"]('Select Any' + FieldName6);
                        e.preventDefault();
                    }
                    if (Values.product_id == 0) {
                        toastr["error"]('Select Any' + FieldName7);
                        e.preventDefault();
                    }
                }

                if (Values.type == 2) {
                    if (Values.name == 0) {
                        toastr["error"]('Set Any' + FieldName8);
                        e.preventDefault();
                    }
                }

                if (Values.bankcash_id > 1) {
                    if (Values.cheque_number == 0) {
                        toastr["error"]('Set Any' + FieldName9);
                        e.preventDefault();
                    }
                }

            };

            var typeChange = function () {
                var Values;
                Values = UICnt.getInputsValue();
                if (Values.type == 2) {
                    UICnt.showName();
                } else {
                    UICnt.hideName();
                }


                if (Values.type == 1) {
                    UICnt.showCustomer();
                    UICnt.showProduct();

                } else {
                    UICnt.hideCustomer();
                    UICnt.hideProduct();
                }


            };

            var bankcashChange = function () {
                var Values;
                Values = UICnt.getInputsValue();

                if (Values.bankcash_id <= 1) {

                    UICnt.hideChequeNumber();
                } else {
                    UICnt.showChequeNumber();
                }

            };


            var projectChange = function () {
                var Values, Fields;
                Values = UICnt.getInputsValue();
                Fields = UICnt.getFields();

                // Fields.get_product_id.removeChild();
                // Fields.get_product_id.previousSibling.childNodes[1].removeChild();

                var project_id = Values.project_id;
                var url = "{{ route( "CrVoucher.getProducts", ":project_id")  }}";

                url = url.replace(':project_id', project_id);

                if (project_id != 0) {
                    $.ajax({
                        url: url,
                        type: 'POST',
                        dataType: 'json',
                        data: {project_id: project_id, '_token': "{{ csrf_token() }}"},
                        beforeSend: function () {

                            var option, li, a, setAttributes, span1, span2;

                            Fields.get_product_id.innerHTML = "";

                            Fields.get_product_id.previousSibling.children[0].innerHTML = "";

                            Fields.get_product_id.innerHTML = "<option value='0'>Select Product</option>";


                            li = document.createElement("li");
                            li.setAttribute("data-original-index", 0);
                            li.setAttribute("class", "");


                            a = document.createElement('a');
                            setAttributes = function (el, options) {
                                Object.keys(options).forEach(function (key) {
                                    el.setAttribute(key, options[key]);
                                });
                            };
                            setAttributes(a, {
                                "class": "",
                                "tabindex": "0",
                                "style": "",
                                "data-tokens": "null",
                            });

                            span1 = document.createElement("span");
                            setAttributes(span1, {
                                "class": "text",
                            });
                            span1.innerText = "There has no product";

                            span2 = document.createElement("span");
                            setAttributes(span2, {
                                "class": "glyphicon glyphicon-ok check-mark"
                            });

                            a.appendChild(span1);
                            a.appendChild(span2);

                            li.appendChild(a);

                            Fields.get_product_id.previousSibling.children[0].insertAdjacentElement('beforeend', li);
                        },
                        success: function (data) {

                            var i = 1;
                            $.each(data, function (index, value) {

                                var option, li, a, setAttributes, span1, span2;

                                option = document.createElement("option");
                                option.value = index;
                                option.innerText = value;
                                Fields.get_product_id.insertAdjacentElement('beforeend', option);


                                li = document.createElement("li");
                                li.setAttribute("data-original-index", i);
                                li.setAttribute("class", "");


                                a = document.createElement('a');
                                setAttributes = function (el, options) {
                                    Object.keys(options).forEach(function (key) {
                                        el.setAttribute(key, options[key]);
                                    });
                                };
                                setAttributes(a, {
                                    "class": "",
                                    "tabindex": "0",
                                    "style": "",
                                    "data-tokens": "null",
                                });

                                span1 = document.createElement("span");
                                setAttributes(span1, {
                                    "class": "text",
                                });
                                span1.innerText = value;

                                span2 = document.createElement("span");
                                setAttributes(span2, {
                                    "class": "glyphicon glyphicon-ok check-mark"
                                });

                                a.appendChild(span1);
                                a.appendChild(span2);

                                li.appendChild(a);

                                Fields.get_product_id.previousSibling.children[0].insertAdjacentElement('beforeend', li);

                                // Fields.get_product_id.previousSibling.childNodes[1].insertAdjacentElement('beforeend', li);

                                i++;

                            });


                        },
                        error: function (error) {
                            console.log(error);
                        },
                        complete: function () {

                        },
                    });
                }

            };


            return {
                init: function () {
                    console.log("App Is running");
                    setUpEventListner();

                    // Default hide fields

                    UICnt.hideName();
                    UICnt.hideCustomer();
                    UICnt.hideProduct();

                    UICnt.hideChequeNumber();

                    @if( $item->type ==1  )
                    UICnt.showCustomer();
                    UICnt.showProduct();
                    @endif

                    @if ( $item->type ==2 )

                    UICnt.showName();
                    @endif



                }
            }

        })(UiController);

        MainController.init();


    </script>

@endpush
