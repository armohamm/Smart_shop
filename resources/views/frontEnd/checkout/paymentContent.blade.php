@extends('frontEnd.master')

@section('title')
Payment
@endsection

@section('mainContent')

<hr>
<div class="container">
    <div class="row">
        <h3 class="text-center text-success">{{ Session::get('message') }}</h3>
        <div class="col-lg-12">
            <div class="well lead text-center text-success">You have to give us products payment information to complete your valuable Order.</div>
        </div>

        
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
          <h3 class="box-title">Payment Form</h3>
          <hr>
            <div class="well box box-primary">
                 {!! Form::open(['url'=>'/checkout/save-order','method'=>'POST','name'=>'paymentForm']) !!}

                 <div class="form-group">
                     <div class="radio-inline">
                         <label><input type="radio" name="paymentType" value="cashOnDelivery"> Cash On Delivery</label>
                     </div>
                 </div>

                 <div class="form-group">
                     <div class="radio-inline">
                         <label><input type="radio" name="paymentType" value="bkash"> Bkash</label>
                     </div>
                 </div>

                 <div class="form-group">
                     <div class="radio-inline">
                         <label><input type="radio" name="paymentType" value="paypal"> Paypal</label>
                     </div>
                 </div>
                    

                    <div class="form-group">
                        <input type="submit" name="submit" class="btn btn-primary btn-block" value="Submit Order">
                    </div>
                    
                 {!! Form::close() !!}
            </div>
        </div>
        
    </div>
</div>

@endsection