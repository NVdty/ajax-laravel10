<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CruController extends Controller
{
    public function showAllCars(){

        $all_cars = Car::all();
        //display all cars
        return view('all-cars', compact('all_cars'));
    }

    public function addCar(Request $request){

        //form validation
        $validator = Validator::make($request->all(),[
            'name' => 'required',
            'manufacture_year' => 'required',
            'engine_capacity' => 'required',
            'fuel_type' => 'required',
        ]);
        
        if ($validator->fails()){
            return response()->json(['msg' => $validator->errors()->ToArray()]);
        }else{
            try { 
                
                $addCar = new Car;
                $addCar->name = $request->name;
                $addCar->manufacture_year = $request->manufacture_year;
                $addCar->engine_capacity = $request->engine_capacity;
                $addCar->fuel_type = $request->fuel_type;
                $addCar->save();

                return response()->json(['success' => true, 'msg' => 'Car Added Succesfully']);
            } catch (\Exception $e) {
                return response()->json(['success' => false, 'msg' => $e->getMessage()]);
            }
        }
    }

    public function deleteCar($id){
        try {
            $delete_car = Car::where('id', $id)->delete();
            //if success print msg
            return response()->json(['success' => true, 'msg' => 'Car delete Succesfully']);

        } catch (\Exception $e) {
            return response()->json(['success' => false, 'msg' => $e->getMessage()]);
        }
    }
}
