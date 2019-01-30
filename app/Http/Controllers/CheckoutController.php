<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\OrderDetail;
use App\Payment;
use App\Shipping;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Cart;

class CheckoutController extends Controller
{
    public function index(){

    	return view('frontEnd.checkout.checkoutContent');
    }

    public function customerRegistration(Request $request){

    	$this->validate($request,[
         'firstName'=>'required',
         'lastName'=>'required',
         'email'=>'required',
         'password'=>'required',
         'address'=>'required',
         'phoneNumber'=>'required',
         'districtName'=>'required',
         
    	]);

    	$customer=new Customer();
    	$customer->firstName=$request->firstName;
    	$customer->lastName=$request->lastName;
    	$customer->email=$request->email;
    	$customer->password=$request->password;
    	$customer->address=$request->address;
    	$customer->phoneNumber=$request->phoneNumber;
    	$customer->districtName=$request->districtName;
    	$customer->save();

    	$customerId=$customer->id;
    	Session::put('customerId',$customerId);


    	return redirect('/checkout/shipping');
    }


    public function customerLogin(Request $request){

        $customerEmail=$request->email;
        $customerPassword=$request->password;
        $authCustomer=Customer::where('email',$customerEmail)
                                ->where('password',$customerPassword)->first();

        if($authCustomer){
            
            Session::put('customerId',$authCustomer->id);
    

            return redirect('/checkout/shipping');
        }
        else{

            return redirect('/checkout')->with('loginError','Sorry ! Wrong email/password.');
        }

    }


    public function showShippingForm(){

    	$customerId=Session::get('customerId');
    	$customerById=Customer::find($customerId);

    	return view('frontEnd.checkout.shippingContent',['customerById'=>$customerById]);
    }

    public function saveShippingInfo(Request $request){

    	$shipping=new Shipping();
    	$shipping->fullName=$request->fullName;
    	$shipping->email=$request->email;
    	$shipping->address=$request->address;
    	$shipping->phoneNumber=$request->phoneNumber;
    	$shipping->districtName=$request->districtName;
    	$shipping->save();

    	$shippingId=$shipping->id;
    	Session::put('shippingId',$shippingId);

    	return redirect('/checkout/payment');
    }



    public function showPaymentForm(){

    	return view('frontEnd.checkout.paymentContent');
    }



    public function saveOrderInfo(Request $request){

    	$paymentType=$request->paymentType;

    	if($paymentType=='cashOnDelivery'){

    		$order= new Order();
    		$order->customerId=Session::get('customerId');
    		$order->shippingId= Session::get('shippingId');
    		$order->orderTotal= Session::get('orderTotal');
    		$order->save();

    		$orderId=$order->id;
    		Session::put('orderId',$orderId);

    		$payment= new Payment();
    		$payment->orderId= Session::get('orderId');
    		$payment->paymentType= $paymentType;
    		$payment->save();

    		$orderDetail= new OrderDetail();
    		$cartProducts=Cart::content();

    		
    		foreach ($cartProducts as $cartProduct) {

	    		$orderDetail->orderId= Session::get('orderId');
	    		$orderDetail->productId=$cartProduct->id;
	    		$orderDetail->productName=$cartProduct->name;
	    		$orderDetail->productPrice=$cartProduct->price;
	    		$orderDetail->productQuantity=$cartProduct->qty;
	    		$orderDetail->save();

                // remove from cart
               // Cart::remove($cartProduct->rowId);
    		}

    		
    		return redirect('/checkout/my-home');

    	}

    	elseif ($paymentType=='bkash') {
    	   
    	   return "Under Construction Bkash Payment. Please, use Cash on Delivery";
    	}

    	elseif ($paymentType=='paypal') {
    		
    		return "Under Construction Paypal Payment. Please, use Cash on Delivery";
    	}

    }


    public function customerHome(){

    	return view('frontEnd.customer.customerHome');
    }
}
