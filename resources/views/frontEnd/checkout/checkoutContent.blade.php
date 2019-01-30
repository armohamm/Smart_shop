@extends('frontEnd.master')

@section('title')
Checkout
@endsection

@section('mainContent')

<hr>
<div class="container">
    <div class="row">
        <h3 class="text-center text-success">{{ Session::get('message') }}</h3>
        <div class="col-lg-12">
            <div class="well lead text-center text-success">You have to Login first for Place an Order.If you are not registered. Register here...</div>
        </div>

        
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-6">
          <h3 class="box-title">Customer Registration</h3>
          <hr>
            <div class="well box box-primary">
                 {!! Form::open(['url'=>'/checkout/sign-up','method'=>'POST']) !!}
                    <div class="form-group">
                      <label for="firstName">First Name</label>
                      <input type="text" name="firstName" class="form-control" placeholder="Enter your first name" required>
                    </div>

                    <div class="form-group">
                      <label for="lastName">Last Name</label>
                      <input type="text" name="lastName" class="form-control" placeholder="Enter your last name" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                    </div>

                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" class="form-control" placeholder="Enter your address" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="phoneNumber">Phone Number</label>
                        <input type="number" name="phoneNumber" class="form-control" placeholder="Enter your phone number" required>
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
        
                        <input type="submit" name="submit" class="btn btn-primary btn-block" value="Register">
                    </div>
                    
                 {!! Form::close() !!}
            </div>
        </div>

        <div class="col-lg-6">
          <h3 class="box-title">Customer Login</h3>
          <hr>
          @if(session()->has('loginError'))
          <h3 class="alert alert-danger">{{ Session::get('loginError') }}</h3>
          @endif
            <div class="well box box-primary">
                {!! Form::open(['url'=>'/checkout/sign-in','method'=>'POST']) !!}

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                    </div>
                    <div class="form-group">
        
                        <input type="submit" name="submit" class="btn btn-primary btn-block" value="Login">
                    </div>
                    
                 {!! Form::close() !!}
            </div>
        </div>

        
    </div>
</div>


@endsection