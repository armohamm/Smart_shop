@extends('frontEnd.master')

@section('title')
Checkout-home
@endsection

@section('mainContent')

<hr>
<div class="container">
    <div class="row">
        
        <div class="col-lg-12">
            <div class="well lead text-center text-success">
                <h1> Thanks for your Order.We will process it very soon....</h1>
                <br><br>
                <?php 
                       $orderId=Session::get('orderId');
                       $orderTotal=Session::get('orderTotal');
                 ?>
            	 <h2>
                  Your Order Id# 0<?php echo $orderId; ?> <br>
                  Order Total: TK.<?php echo $orderTotal; ?>/-
                 </h2>
            	   
            	 <br><br>
            </div>
       
        </div>

        
    </div>
</div>

@endsection