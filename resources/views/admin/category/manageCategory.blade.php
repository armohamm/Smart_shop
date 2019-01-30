@extends('admin.master')

@section('title')
Manage Category
@endsection

@section('content')

            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Categories</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
           <div class="row">
                <div class="col-lg-12">
                	<h3 class="text-center text-success">{{ Session::get('message') }}</h3>
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            You can update/delete categories from here.
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Category Name</th>
                                        <th>Category Description</th>
                                        <th>Publication Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                	@foreach($categories as $category)
                                    <tr class="odd gradeX">
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->categoryName }}</td>
                                        <td>{!! $category->categoryDescription !!}</td>
                                        <td>{{ $category->publicationStatus==1 ? 'Published':'Unpublished'}}</td>
                                        <td>
                                        	<a href="{{ url('/category/edit/'.$category->id)}}" class="btn btn-success" title="Category Edit">
                                        		<span class="glyphicon glyphicon-edit"></span>
                                        	</a>
                                        	<a href="{{ url('/category/delete/'.$category->id)}}" onclick="return confirm('Are you sure to delete?');"  class="btn btn-danger" title="Category Delete">
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