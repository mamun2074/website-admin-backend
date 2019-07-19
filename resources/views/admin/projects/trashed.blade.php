@extends('layouts.app')

@section('title')
    All Trashed
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
                <a class="btn btn-sm btn-info" href="{{ route('projects') }}">Back</a>
            </div>
            <ol class="breadcrumb breadcrumb-col-cyan pull-right">
                <li><a href="{{ route('dashboard') }}"><i class="material-icons">home</i> Home</a></li>
                <li><a href="{{ route('projects') }}"><i class="material-icons">library_add</i> Project</a></li>
                <li class="active"><i class="material-icons">archive</i> Trashed</li>
            </ol>
            <!-- Hover Rows -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    @if ($trashes->count() >0)
                        <div class="card">
                            <div class="header">
                                <a class="btn btn-xs btn-success "
                                   href="{{ route('projects') }}">Project({{ App\Project::all()->count() }})</a>

                                @if ( App\Project::onlyTrashed()->count() > 0 )
                                    <a class="btn btn-xs btn-danger "
                                       href="{{ route('project.trashed') }}">Trash({{ App\Project::onlyTrashed()->count()  }}
                                        )</a>
                                @endif

                                <ul class="header-dropdown m-r--5">
                                    <form class="search" action="{{ route('project.trashed.search')  }}" method="get">
                                        {{ csrf_field() }}
                                        <input type="search" name="search" class="form-control input-sm "
                                               placeholder="Search"/>
                                    </form>
                                </ul>

                            </div>
                            <form class="actionForm" action="{{ route('project.trashed.action') }}" method="get">

                                <div class="body table-responsive">
                                    <div class="row">
                                        <div class="margin-bottom-0 col-md-2 col-lg-2 col-sm-2">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <select class="form-control" name="apply_comand_top" id="">
                                                        <option value="0">Select Action</option>
                                                        <option value="1">Restore</option>
                                                        <option value="2">Delete</option>
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
                                                {{ $trashes->links() }}
                                            </div>
                                        </div>
                                    </div>
                                    {{ csrf_field() }}
                                    <table class="table table-hover">
                                        <thead>
                                        <tr>
                                            <th class="checkbox_custom_style">
                                                <input name="selectTop" type="checkbox" id="md_checkbox_p"
                                                       class="chk-col-cyan"/>
                                                <label for="md_checkbox_p"></label>
                                            </th>
                                            <th>Name</th>
                                            <th>Location</th>
                                            <th>Hand Over Date</th>
                                            <th>Options</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <?php $i = 1; ?>
                                        @foreach($trashes as $trash)
                                            <tr>
                                                <th>
                                                    <input name="project[project_id][]" value="{{ $trash->id }}"
                                                           type="checkbox" id="md_checkbox_{{ $i }}"
                                                           class="chk-col-cyan selects "/>
                                                    <label for="md_checkbox_{{ $i }}"></label>
                                                </th>
                                                <td>{{ $trash->name }}</td>
                                                <td>{{ $trash->location }}</td>

                                                <td> @if ($trash->hand_over_date)
                                                        {{ date("M-Y", strtotime($trash->hand_over_date)) }}
                                                    @endif </td>


                                                <td class="tdAction">
                                                    <a class="btn btn-xs btn-info waves-effect"
                                                       href="{{ route('project.restore',['id'=>$trash->id]) }}"
                                                       data-toggle="tooltip"
                                                       data-placement="top" title="Restore"><i
                                                                class="material-icons">restore</i></a>

                                                    <a data-target="#largeModal"
                                                       class="btn btn-xs btn-success waves-effect ajaxCall"
                                                       href="{{ $trash->id }}"
                                                       data-toggle="tooltip"
                                                       data-placement="top" title="Preview"><i
                                                                class="material-icons">pageview</i></a>


                                                    <a class="btn btn-xs btn-danger waves-effect"
                                                       href="{{ route('project.kill',['id'=>$trash->id]) }}"
                                                       data-toggle="tooltip"
                                                       data-placement="top" title="Parmanently Delete?"> <i
                                                                class="material-icons">delete</i></a>

                                                </td>
                                            </tr>

                                        <?php $i++; ?>
                                        @endforeach

                                        <thead>
                                        <tr>
                                            <th class="checkbox_custom_style selectBottom">
                                                <input name="selectBottom" type="checkbox" id="md_checkbox_footer"
                                                       class="chk-col-cyan"/>
                                                <label for="md_checkbox_footer"></label>
                                            </th>
                                            <th>Name</th>
                                            <th>Location</th>
                                            <th>Hand Over Date</th>
                                            <th>Options</th>
                                        </tr>
                                        </thead>

                                        </tbody>

                                    </table>

                                </div>
                                <div class="row p-l-30">
                                    <div class="m-0 col-md-2 col-lg-2 col-sm-2">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <select class="form-control" name="apply_comand_bottom" id="">
                                                    <option value="0">Select Action</option>
                                                    <option value="1">Restore</option>
                                                    <option value="2">Delete</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="margin-bottom-0 col-md-2 col-lg-2 col-sm-2">
                                        <div class="form-group">
                                            <input class="btn btn-sm btn-info" type="submit" value="Apply"
                                                   name="ApplyTop">
                                        </div>
                                    </div>
                                    <div class="margin-bottom-0 col-md-8 col-sm-8 col-xs-8">
                                        <div class="custom-paginate pull-right">
                                            {{ $trashes->links() }}
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    @else
                        <div class="card">
                            <table class="table table-hover">
                                <thead>
                                <tr>

                                    <th>Name</th>
                                    <th>Location</th>
                                    <th>Hand Over Date</th>
                                    <th>Options</th>
                                </tr>
                                </thead>

                                <thead>


                                <tr>
                                    <th colspan="8" class="text-danger text-center">There Has No Data</th>
                                </tr>
                                </thead>

                            </table>
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
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th scope="col">Items</th>
                                <th scope="col">Description</th>
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
            var url = "{{ route('project.trashed.show') }}";

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
                        if (index == "id" || index == "name") {
                            return true;
                        }
                        ;
                        if (index == "deleted_at") {
                            return false;
                        }

                        if (index == 'hand_over_date') {

                            var month = new Array();
                            month[0] = "January";
                            month[1] = "February";
                            month[2] = "March";
                            month[3] = "April";
                            month[4] = "May";
                            month[5] = "June";
                            month[6] = "July";
                            month[7] = "August";
                            month[8] = "September";
                            month[9] = "October";
                            month[10] = "November";
                            month[11] = "December";

                            value = new Date(value);
                            value = (month[value.getMonth() + 1]) + "-" + value.getFullYear();
                        }

                        tr += "<tr><td>" + index + "</td><td>" + value + "</td></tr>";
                    });
                    //console.log( tr );
                    tr = tr.replace("location", "Location");
                    tr = tr.replace("facing", "Facing");
                    tr = tr.replace("building_height", "Building Height");
                    tr = tr.replace("land_area", "Land Area");
                    tr = tr.replace("hand_over_date", "Hand Over Date");
                    tr = tr.replace("description", "Description");
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
    <script src="{{ asset('asset/js/dataTable.js')  }}"></script>
    <script>
        BaseController.init();
    </script>
@endpush



