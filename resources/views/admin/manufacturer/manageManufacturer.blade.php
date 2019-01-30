@extends('admin.master')

@section('title')
Manage Manufacturer
@endsection

@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Manufacturers</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
           <div class="row">
                <div class="col-lg-12">
                	<h3 class="text-center text-success">{{ Session::get('message') }}</h3>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            You can update/delete manufacturers from here.
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Manufacturer Name</th>
                                        <th>Manufacturer Description</th>
                                        <th>Publication Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                	@foreach($manufacturers as $manufacturer)
                                    <tr class="odd gradeX">
                                        <td>{{ $manufacturer->id }}</td>
                                        <td>{{ $manufacturer->manufacturerName }}</td>
                                        <td>{!! $manufacturer->manufacturerDescription !!}</td>
                                        <td>{{ $manufacturer->publicationStatus==1 ? 'Published':'Unpublished'}}</td>
                                        <td>
                                        	<a href="{{ url('/manufacturer/edit/'.$manufacturer->id)}}" class="btn btn-success" title="Manufacturer Edit">
                                        		<span class="glyphicon glyphicon-edit"></span>
                                        	</a>
                                        	<a href="{{ url('/manufacturer/delete/'.$manufacturer->id)}}" onclick="return confirm('Are you sure to delete?');"  class="btn btn-danger" title="Manufacturer Delete">
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