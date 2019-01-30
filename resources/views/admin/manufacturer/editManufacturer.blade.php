@extends('admin.master')

@section('title')
Edit Manufacturer
@endsection

@section('content')

<div class="row">
	<div class="col-lg-12">
		<h3>Edit manufacturer details</h3>
	  
	<hr>
	    <div class="well">
        {!! Form::open(['url'=>'/manufacturer/update','method'=>'POST','class'=>'form-horizontal',
        'name'=>'editManufacturerForm']) !!}
		
		<div class="form-group">
          <label for="email" class="col-sm-2 control-label" >Manufacturer Name</label>
            <div class="col-sm-10">
    	   <input type="text" class="form-control" name="manufacturerName" value="{{ $manufacturerById->manufacturerName}}" id="email">
           <input type="hidden" class="form-control" name="manufacturerId" value="{{ $manufacturerById->id}}" id="email">
            </div>
        </div>

        <div class="form-group">
          <label for="email2" class="col-sm-2 control-label" >Manufacturer Description</label>
            <div class="col-sm-10">
    	      <textarea class="form-control" name="manufacturerDescription" rows="8">{{$manufacturerById->manufacturerDescription}}</textarea>
            </div>
        </div>

        <div class="form-group">
          <label for="email" class="col-sm-2 control-label" >Publication Status</label>
            <div class="col-sm-10">
    	      <select class="form-control" name="publicationStatus">
    	      	<option>Select Publication Status</option>
    	      	<option value="1">Published</option>
    	      	<option value="0">Unpublished</option>
    	      </select>
            </div>
        </div>

        <div class="form-group">
        	<div class="col-sm-offset-2 col-sm-10">
        		<button type="submit" name="btn" class="btn btn-success btn-block">Update Manufacturer Info</button>
        	</div>
        </div>	

		
         {!! Form::close() !!}

		</div>
	</div>
	
</div>

<script>
    document.forms['editManufacturerForm'].elements['publicationStatus'].value={{ $manufacturerById->publicationStatus }}
</script>

@endsection