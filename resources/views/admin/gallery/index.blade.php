@extends('layouts.app')

{{--Important Variable--}}

<?php


$moduleName = " gallery";
$createItemName = "Create" . $moduleName;

$breadcrumbMainName = $moduleName;
$breadcrumbCurrentName = "Create";

$breadcrumbMainIcon = " fas fa-images";
$breadcrumbCurrentIcon = "archive";


$ModelName = 'App\Gallery';

$ParentRouteName = 'gallery';

?>

@section('title')
    {{ $moduleName }}->{{ $breadcrumbCurrentName  }}
@stop

@section('top-bar')
    @include('includes.top-bar')
@stop
@section('left-sidebar')
    @include('includes.left-sidebar')
@stop
@section('content')
    {{--{{ dd($users->all()) }}--}}

    <section class="content">
        <div class="container-fluid">
            <div class="block-header pull-left">
                @if ( \Request::route()->getName() == $ModelName.'.search' )
                    <a class="btn btn-sm btn-info" href="{{ route($ParentRouteName) }}">Back</a>
                @endif
                <a class="btn btn-sm btn-success" href="{{ route($ParentRouteName.'.create') }}">Add </a>

            </div>

            <ol class="breadcrumb breadcrumb-col-cyan pull-right">
                <li><a href="{{ route($ParentRouteName) }}"><i class="material-icons">home</i> Home</a></li>

                <li><a href="{{ route($ParentRouteName) }}"><i
                                class="{{ $breadcrumbMainIcon }}"></i>{{  $breadcrumbMainName }}</a>
                </li>
                <li class="active"><i
                            class="material-icons">{{ $breadcrumbCurrentIcon  }}</i> {{ $breadcrumbCurrentName  }}</li>
            </ol>

            <!-- Hover Rows -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">


                    @if ($items->count() > 0)
                        <div class="card">
                            <div class="header">
                                <a class="btn btn-xs btn-success"
                                   href="{{ route($ParentRouteName)  }}">All({{ $ModelName::all()->count() }})</a>

                                @if ( $ModelName::onlyTrashed()->count() > 0 )
                                    <a class="btn btn-xs btn-danger "
                                       href="{{ route($ParentRouteName.'.trashed') }}">Trash({{ $ModelName::onlyTrashed()->count()  }}
                                        )</a>
                                @endif

                                <ul class="header-dropdown m-r--5">
                                    <form class="search" action="{{ route($ParentRouteName.'.active.search') }}"
                                          method="get">
                                        {{ csrf_field() }}
                                        <input type="search" name="search" class="form-control input-sm "
                                               placeholder="Search"/>
                                    </form>
                                </ul>
                            </div>

                            <form class="actionForm" action="{{ route($ParentRouteName.'.active.action') }}"
                                  method="get">

                                <div class="body table-responsive">
                                    <div class="row ">
                                        <div class="margin-bottom-0 col-md-2 col-lg-2 col-sm-2">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select class="form-control" name="apply_comand_top" id="">
                                                        <option value="0">Select Action</option>
                                                        <option value="1">Move To Trash</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class=" margin-bottom-0 col-md-2 col-lg-2 col-sm-2">
                                            <div class="form-group">
                                                <input class="btn btn-sm btn-info" type="submit" value="Apply"
                                                       name="ApplyTop">
                                            </div>
                                        </div>
                                        <div class=" margin-bottom-0 col-md-8 col-sm-8 col-xs-8">
                                            <div class="custom-paginate pull-right">
                                                {{ $items->links() }}
                                            </div>
                                        </div>
                                    </div>
                                    {{ csrf_field() }}
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                        <tr>
                                            <th class="checkbox_custom_style">
                                                <input name="selectTop" type="checkbox" id="md_checkbox_p"
                                                       class="chk-col-cyan"/>
                                                <label for="md_checkbox_p"></label>
                                            </th>
                                            <th>Gallery Image</th>
                                            <th>Options</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php $i = 1; ?>

                                        @foreach($items as $item)
                                            <tr>
                                                <th>
                                                    <input name="project[project_id][]" value="{{ $item->id }}"
                                                           type="checkbox" id="md_checkbox_{{ $i }}"
                                                           class="chk-col-cyan selects "/>
                                                    <label for="md_checkbox_{{ $i }}"></label>
                                                </th>

                                                {{--{{ dd($item->id) }}--}}

                                                <td><img style="width: 50px; height: 50px" src="{{ asset($item->thumbnail)}}" alt=""></td>

                                                <td>

                                                    <a class="btn btn-xs btn-info waves-effect"
                                                       href="{{ route($ParentRouteName.'.edit',['id'=>$item->id]) }}"
                                                       data-toggle="tooltip"
                                                       data-placement="top" title="Edit"><i
                                                                class="material-icons">mode_edit</i></a>


                                                    <a class="btn btn-xs btn-danger waves-effect"
                                                       href="{{ route($ParentRouteName.'.destroy',['id'=>$item->id]) }}"
                                                       data-toggle="tooltip"
                                                       data-placement="top" title="Delete"> <i
                                                                class="material-icons">delete</i></a>


                                                </td>
                                            </tr>
                                        <?php $i++; ?>
                                        @endforeach
                                        <thead>
                                        <tr>
                                            <th class="checkbox_custom_style">
                                                <input name="selectBottom" type="checkbox" id="md_checkbox_footer"
                                                       class="chk-col-cyan"/>
                                                <label for="md_checkbox_footer"></label>
                                            </th>


                                            <th>Gallery Image</th>
                                            <th>Options</th>
                                        </tr>
                                        </thead>

                                        </tbody>
                                    </table>
                                    <div class="row ">
                                        <div class="m-0 col-md-2 col-lg-2 col-sm-2">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select class="form-control" name="apply_comand_bottom" id="">
                                                        <option value="0">Select Action</option>
                                                        <option value="1">Move To Trash</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="margin-bottom-0 col-md-2 col-lg-2 col-sm-2">
                                            <div class="form-group">
                                                <input class="btn btn-sm btn-info" type="submit" value="Apply"
                                                       name="ApplyButtom">
                                            </div>
                                        </div>
                                        <div class=" margin-bottom-0 col-md-8 col-sm-8 col-xs-8">
                                            <div class="custom-paginate pull-right">
                                                {{ $items->links() }}
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    @else
                        <div class="card">
                            <div class="header">
                                <a class="btn btn-xs btn-success"
                                   href="{{ route($ParentRouteName)  }}">All({{ $ModelName::all()->count() }})</a>

                                @if ( $ModelName::onlyTrashed()->count() > 0 )
                                    <a class="btn btn-xs btn-danger "
                                       href="{{ route($ParentRouteName.'.trashed') }}">Trash({{ $ModelName::onlyTrashed()->count()  }}
                                        )</a>
                                @endif

                            </div>

                            <div class="body table-responsive">
                                <table class="table table-hover">

                                    <thead>


                                    <tr>
                                        <th colspan="8" class="text-danger text-center">There Has No Data</th>
                                    </tr>
                                    </thead>

                                </table>
                            </div>

                        </div>
                    @endif
                </div>
            </div>
            <!-- #END# Hover Rows -->
        </div>
    </section>

    <!-- Large Size -->
    <div class="modal fade" id="largeModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content  modal-ajax-content">
                <div class="preloader add_spinner">
                    <div class="spinner-layer pl-red">
                        <div class="circle-clipper left">
                            <div class="circle"></div>
                        </div>
                        <div class="circle-clipper right">
                            <div class="circle"></div>
                        </div>
                    </div>
                </div>
                <div class="modal-header">
                    <h4 class="modal-title" id="largeModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    <div class="row modal-content-data">
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center" scope="col">Items</th>
                                <th class="text-center" scope="col">Description</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Id</td>
                                <td>Name</td>
                            </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </div>
        </div>
    </div>
@stop

@push('include-css')
    <!-- Wait Me Css -->
    <link href="{{ asset('asset/plugins/waitme/waitMe.css') }}" rel="stylesheet"/>

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


@endpush

@push('include-js')

    {{--<script src="{{ asset('asset/js/pages/ui/modals.js') }}"></script>--}}
    <script src="{{ asset('asset/plugins/autosize/autosize.js') }}"></script>

    <!-- Moment Plugin Js -->
    <script src="{{ asset('asset/plugins/momentjs/moment.js') }}"></script>

    <!-- Bootstrap Material Datetime Picker Plugin Js -->
    <script src="{{ asset('asset/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}"></script>

    <script src="{{ asset('asset/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>

    <script src="{{ asset('asset/js/pages/forms/basic-form-elements.js') }}"></script>
    <!-- Autosize Plugin Js -->


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
        $(document).on('click', 'a.ajaxCall', function (e) {

            e.preventDefault();
            var mainThis = $(this);
            var id = mainThis.attr('href');
            var url = "{{ route($ParentRouteName.'.show') }}";

            var add_spinner = $(".add_spinner");
            var modalAjaxContent = $(".modal-ajax-content");
            var modalContentData = $(".modal-content-data");
            var table = modalContentData.find("table");
            var thead = modalContentData.find("table thead");
            var tbody = modalContentData.find("table tbody");

            $.ajax({
                url: url,
                type: 'POST',
                dataType: 'json',
                data: {'id': id, '_token': "{{ csrf_token() }}"},
                beforeSend: function () {
                    $('#largeModal').modal('show');
                    modalAjaxContent.find(".modal-title").html("");
                    add_spinner.show();
                    table.hide();
                },
                success: function (data) {

                    modalAjaxContent.find(".modal-title").html(data["name"]);
                    var tr = '';
                    $.each(data, function (index, value) {

                        if (value == null || value == "") {
                            return true;
                        }

                        tr += "<tr><td>" + index + "</td><td>" + value + "</td></tr>";
                    });


                    tr = tr.replace("voucher_no", "Voucher No");
                    tr = tr.replace("project_name", "Project Name");
                    tr = tr.replace("customer_name", "Customer Name");
                    tr = tr.replace("product_name", "Product Name");
                    tr = tr.replace("bankcash_name", "Bankcash Name");
                    tr = tr.replace("head_of_account_name", "Head of Account Name");
                    tr = tr.replace("mr_bill_no", "MR Bill No");
                    tr = tr.replace("date", "Date");
                    tr = tr.replace("amount", "Amount");
                    tr = tr.replace("particulars", "Particulars");
                    tbody.html(tr);
                },
                error: function (error) {
                    console.log(error);
                },
                complete: function () {
                    //$(placeholder).removeClass('loading');
                    add_spinner.hide();
                    modalAjaxContent.css("background-color", "white");
                    table.show();
                },
            });
        });
    </script>

    {{--All datagrid --}}
    <script src="{{ asset('asset/js/dataTable.js')  }}"></script>
    <script>
        BaseController.init();
    </script>
@endpush



