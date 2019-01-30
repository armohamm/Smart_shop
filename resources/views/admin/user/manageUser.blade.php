@extends('admin.master')

@section('title')
Manage User
@endsection

@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Users (admin)</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
           <div class="row">
                <div class="col-lg-12">
                    <h3 class="text-center text-success">{{ Session::get('message') }}</h3>
                    <h3 class="text-center text-success"></h3>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            You can update/delete users from here.
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>User Name</th>
                                        <th>User Address</th>
                                        <th>User Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($users as $user)
                                    <tr class="odd gradeX">
                                        <td>{{$user->id}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{!!$user->address!!}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            <a href="{{ url('/user/edit/'.$user->id)}}" class="btn btn-success" title="User Edit">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>
                                            <a href="{{ url('/user/delete/'.$user->id)}}" onclick="return confirm('Are you sure to delete?');"  class="btn btn-danger" title="User Delete">
                                                <span class="glyphicon glyphicon-trash"></span>
                                            </a>
                                            
                                        </td>
                                    </tr>
                                     @endforeach
                                                                                                        
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>


@endsection