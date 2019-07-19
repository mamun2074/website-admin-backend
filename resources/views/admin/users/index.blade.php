@extends('layouts.app')

@section('title')
    Users->Inventory Management
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
                
                @if ( \Request::route()->getName() == 'users.search' )
                    <a class="btn btn-sm btn-info" href="{{ route('users') }}">Back</a>
                @endif
                
                <a class="btn btn-sm btn-success" href="{{ route('add-user') }}">Add User</a>
            
            </div>
            <ol class="breadcrumb breadcrumb-col-cyan pull-right">
                <li><a href="{{ route('dashboard') }}"><i class="material-icons">home</i> Home</a></li>
                <li class="active"><i class="material-icons">account_box</i> Users</li>
            </ol>
            <!-- Hover Rows -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">

                            <a class="btn btn-sm btn-danger " href="{{ route('user.trashed') }}"> All Trashed</a>

                            <ul class="header-dropdown m-r--5">
                                <form class="userSearch" action="{{ route('users.search') }}" method="get">
                                    {{ csrf_field() }}
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

                                @if ($users->count() >0)
                                    <?php $i = 1; ?>
                                    @foreach($users as $user)
                                        <tr>
                                            <th scope="row">{{ $i }}</th>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>

                                                @if ($user->user_role==1)
                                                    Admin
                                                @elseif($user->user_role==2)
                                                    Editor
                                                @elseif($user->user_role==3)
                                                    Author
                                                @elseif($user->user_role==4)
                                                    Subscriber
                                                @elseif($user->user_role==5)
                                                    Contributer
                                                @endif

                                            </td>
                                            <td>
                                                <a class="btn btn-xs btn-info waves-effect"
                                                   href="{{ route('user.edit',['id'=>$user->id ]) }}"
                                                   data-toggle="tooltip"
                                                   data-placement="top" title="Edit"><i
                                                            class="material-icons">mode_edit</i></a>

                                                @if ( Auth::user()->id !== $user->id )
                                                    <a class="btn btn-xs btn-danger waves-effect"
                                                       href="{{ route('user.delete',['id'=>$user->id]) }}"
                                                       data-toggle="tooltip"
                                                       data-placement="top" title="Trash"> <i
                                                                class="material-icons">delete</i></a>
                                                @endif


                                            </td>
                                        </tr>

                                        <?php $i++; ?>
                                    @endforeach


                                @else
                                    <tr>
                                        <th colspan="5" class="text-danger text-center">There Has No Data</th>
                                    </tr>

                                @endif

                                </tbody>
                            </table>
                            {{ $users->links() }}
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


        $(document).on("submit", ".userSearch", function (e) {
            var mainThis = $(this);
            var searchText=mainThis.find('input[name=search]');
            
            if ( searchText.val().length < 3 ){
                alert("Put at least 3 letters");
                e.preventDefault();
            }
        });

    </script>

@endpush



