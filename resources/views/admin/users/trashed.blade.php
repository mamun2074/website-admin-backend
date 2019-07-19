@extends('layouts.app')

@section('title')
    Trashed Users
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
                <a class="btn btn-sm btn-info" href="{{ route('users') }}">Back</a>
            </div>

            <ol class="breadcrumb breadcrumb-col-cyan pull-right">
                <li><a href="{{ route('dashboard') }}"><i class="material-icons">home</i> Home</a></li>
                <li><a href="{{ route('users') }}"><i class="material-icons">account_box</i> User</a></li>
                <li class="active"><i class="material-icons">archive</i> Trashed Users</li>
            </ol>
            <!-- Hover Rows -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <a class="btn btn-sm btn-success " href="{{ route('users') }}">All Users</a>

                            <ul class="header-dropdown m-r--5">
                                <form action="">
                                    <input type="search" name="search" class="form-control input-sm "
                                           placeholder="Search"/>
                                </form>
                            </ul>
                        </div>
                        <div class="body table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>SL.No</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>User Role</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                @if ($trashes->count() > 0)
                                    <?php $i = 1; ?>
                                    @foreach($trashes as $trashe)
                                        <tr>
                                            <th scope="row">{{ $i }}</th>
                                            <td>{{ $trashe->name }}</td>
                                            <td>{{ $trashe->email }}</td>
                                            <td>

                                                @if ($trashe->user_role==1)
                                                    Admin
                                                @elseif($trashe->user_role==2)
                                                    Editor
                                                @elseif($trashe->user_role==3)
                                                    Author
                                                @elseif($trashe->user_role==4)
                                                    Subscriber
                                                @elseif($trashe->user_role==5)
                                                    Contributer
                                                @endif

                                            </td>
                                            <td>

                                                <a class="btn btn-xs btn-success waves-effect" href="{{ route('user.restore',['id'=>$trashe->id]) }}"
                                                   data-toggle="tooltip"
                                                   data-placement="top" title="Want To Restore?"> <i
                                                            class="material-icons">restore</i></a>

                                                <a class="btn btn-xs btn-danger waves-effect" href="{{ route('user.kill',['id'=>$trashe->id]) }}"
                                                   data-toggle="tooltip"
                                                   data-placement="top" title="Permanently Delete?"> <i
                                                            class="material-icons">delete</i></a>

                                            </td>
                                        </tr>

                                        <?php $i++; ?>
                                    @endforeach


                                @else
                                    <tr>
                                        <th colspan="5" class="text-center text-danger">There Has No Data</th>
                                    </tr>

                                @endif

                                </tbody>
                            </table>
                            {{ $trashes->links() }}
                        </div>

                    </div>
                </div>
            </div>
            <!-- #END# Hover Rows -->


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



        $(document).on("click", "tr td a:nth-child(2)", function (e) {

            var confirm = window.confirm("Do you want to permanently delete?");
            if (confirm == false) {
                e.preventDefault();
            }
        });

    </script>

@endpush



