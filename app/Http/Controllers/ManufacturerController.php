<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Manufacturer;
use DB;

class ManufacturerController extends Controller
{
    public function createManufacturer(){

    	return view('admin.manufacturer.createManufacturer');
    }

    public function storeManufacturer(Request $request){

    	$this->validate($request,[
         'manufacturerName'=>'required',
         'manufacturerDescription'=>'required',
    	]);

    	//return $request->all();

    	// $manufacturer=new Manufacturer();
    	// $manufacturer->manufacturerName=$request->manufacturerName;
    	// $manufacturer->manufacturerDescription=$request->manufacturerDescription;
    	// $manufacturer->publicationStatus=$request->publicationStatus;
    	// $manufacturer->save();



    	DB::table('manufacturers')->insert([
    		'manufacturerName'=>$request->manufacturerName,
    		'manufacturerDescription'=>$request->manufacturerDescription,
    		'publicationStatus'=>$request->publicationStatus,
    	]);

    	return redirect('/manufacturer/add')->with('message','Manufacturer Info Added Successfully!');

    }



    public function manageManufacturer(){

    	$manufacturers=Manufacturer::all();

    	return view('admin.manufacturer.manageManufacturer',['manufacturers'=>$manufacturers]);

    }


    public function editManufacturer($id){

    	$manufacturerById=Manufacturer::where('id',$id)->first();

    	return view('admin.manufacturer.editManufacturer',['manufacturerById'=>$manufacturerById]);

    }


    public function updateManufacturer(Request $request){

    	$manufacturer=Manufacturer::find($request->manufacturerId);

    	$manufacturer->manufacturerName=$request->manufacturerName;
    	$manufacturer->manufacturerDescription=$request->manufacturerDescription;
    	$manufacturer->publicationStatus=$request->publicationStatus;
    	$manufacturer->save();

    	return redirect('/manufacturer/manage')->with('message','Manufacturer Info Updated Successfully!');
   

    }


   public function deleteManufacturer($id){

   	$manufacturer=Manufacturer::find($id);
   	$manufacturer->delete();

   	return redirect('/manufacturer/manage')->with('message','Manufacturer Info Deleted Successfully!');

   }





}
