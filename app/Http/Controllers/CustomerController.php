<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Session;

class CustomerController extends Controller
{
    // ***Admin panel functionality***

	public function createCustomer(){

		return view('admin.customer.createCustomer');
	}

	public function storeCustomer(Request $request){

		$this->validate($request,[
         'firstName'=>'required',
         'lastName'=>'required',
         'email'=>'required|string|email|max:255|unique:users',
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


    	return redirect('/customer/add')->with('message','Customer Info Added Successfully!');

	}


	public function manageCustomer(){

		$customers=Customer::all();
     	return view('admin.customer.manageCustomer',['customers'=>$customers]);

	}


    public function viewCustomer($id){

        return $id;
    }


	public function editCustomer($id){

		$customerById= Customer::where('id',$id)->first();
       
      // return view('admin.customer.editCustomer',['customerById'=>$customerById]);

        return "need to update";

	}


	public function updateCustomer(Request $request){

        //  $this->validate($request,[
        //  'customerName'=>'required',
        //  'address'=>'required',
        //  'phoneNumber'=>'required',
        //  'password'=>'required',
        // ]);


    	// $customer=Customer::find($request->customerId);
    	// $customer->customerName=$request->customerName;
    	// //$customer->email=$request->email;
    	// $customer->address=$request->address;
    	// $customer->phoneNumber=$request->phoneNumber;
    	// $customer->password=$request->password;
    	// $customer->save();

    	//return redirect('/customer/manage')->with('message','Customer Info Updated Successfully!');

        return "need to update";

    }



    public function deleteCustomer($id){

    	$customer=Customer::find($id);
    	$customer->delete();

    	return redirect('/customer/manage')->with('message','Customer Info Deleted Successfully!');
    }

    // ***End Admin panel functionality***


    
    public function signUpCustomer(Request $request){


        return "update";

    }


// ***sign-up & sign-in from modal***
    
    public function customerRegistration(Request $request){

        $this->validate($request,[
         'firstName'=>'required',
         'lastName'=>'required',
         'email'=>'required|string|email|max:255|unique:users',
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

        
        return redirect('/customer/home');
    }



    public function customerSignIn(Request $request){

        $customerEmail=$request->email;
        $customerPassword=$request->password;
        $authCustomer=Customer::where('email',$customerEmail)
                                ->where('password',$customerPassword)->first();

        if($authCustomer){

            Session::put('customerId',$authCustomer->id);
           // Session::put('customerEmail',$authCustomer->email);

            return redirect('/customer/home');
        }

        else{

            return redirect('/')->with('loginError','Sorry ! Wrong email/password.');
        }

    }



    public function myHome(){

         $customerId= Session::get('customerId');
         $customerInfo=Customer::find($customerId);

        return view('frontEnd.customer.myHome',['customerInfo'=>$customerInfo]);
    }


    public function customerInfoUpdate(Request $request){

        $customerId=$request->customerId;
        $customer=Customer::find($customerId);

        $this->validate($request,[
         'firstName'=>'required',
         'lastName'=>'required',
         'password'=>'required',
         'address'=>'required',
         'phoneNumber'=>'required',
         'districtName'=>'required',
        ]);

        
        $customer->firstName=$request->firstName;
        $customer->lastName=$request->lastName;
        $customer->password=$request->password;
        $customer->address=$request->address;
        $customer->phoneNumber=$request->phoneNumber;
        $customer->districtName=$request->districtName;
        $customer->save();


        return redirect('/customer/home')->with('message','Your Info Updated Successfully.');

    }


    public function customerLogout(){
         
         $customerId=Session::get('customerId');

        if ($customerId){
            
            Session::forget(['customerId']);
            Session::forget(['shippingId']); 
            Session::forget(['orderTotal']);
            Session::forget(['orderId']);
            //Session::forget(['customerEmail']);
            
            return redirect('/')->with('message','Successfully Logout!');
        }
        
        else{

            return redirect('/');
        }
    }



}
