@extends('frontEnd.master')

@section('title')
My account 
@endsection

@section('mainContent')

<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>

<br><br>
<div class="container">
    <div class="row">
        <div class="col-lg-2" >
            <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="{{ url('#')}}"><i class="fa fa-user fa-fw"></i> Customer Info</a>
                        </li>
                        <li>
                            <a href="{{ url('#')}}"><i class="fa fa-shopping-cart"></i> My Orders</a>
                        </li>
                    </ul>
            </div> 
        </div>

        <div class="col-lg-10">
            <div class="well lead text-center text-info">
                <h1> My account - Customer info</h1>
            </div>
          <hr>
          <h3 class="text-center text-success">{{ Session::get('message') }}</h3>
            <div class="well box box-primary">
            {!! Form::open(['url'=>'/customer/info-update','method'=>'POST','name'=>'updateCustomerInfo']) !!}
                    <div class="form-group">
                      <label for="firstName">First Name</label>
                      <input type="text" name="firstName" class="form-control" 
                      value="{{$customerInfo->firstName}}" required>
                      <input type="hidden" name="customerId" value="{{$customerInfo->id}}">
                    </div>

                    <div class="form-group">
                      <label for="lastName">Last Name</label>
                      <input type="text" name="lastName" class="form-control" value="{{$customerInfo->lastName}}"  required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" value="{{$customerInfo->email}}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="text" name="password" class="form-control" value="{{$customerInfo->password}}"  required>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" class="form-control" required>{{$customerInfo->address}}
                        </textarea>
                    </div>
                    <div class="form-group">
                        <label for="phoneNumber">Phone Number</label>
                        <input type="number" name="phoneNumber" class="form-control" value="{{$customerInfo->phoneNumber}}" required>
                    </div>

                    <div class="form-group">
                        <label for="districtName">District Name</label>
                        <select class="form-control" name="districtName">
                            <option>--- Select District Name ---</option>
                            <option value="dhaka">Dhaka</option>
                            <option value="faridpur">Faridpur</option>
                            <option value="gazipur">Gazipur</option>
                            <option value="rangpur">Rangpur</option>
                            <option value="lalmonirhat">Lalmonirhat</option>
                            <option value="dinajpur">Dinajpur</option>
                            <option value="gaibandha ">Gaibandha</option>
                            <option value="kurigram ">Kurigram</option>
                        </select>
                    </div>


                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary btn-block" value="Save">
                    </div>
                    
            {!! Form::close() !!}
            </div>
        </div>

    </div>
</div>

<script>
    document.forms['updateCustomerInfo'].elements['districtName'].value='{{$customerInfo->districtName}}'
</script>

@endsection