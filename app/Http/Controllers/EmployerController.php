<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employer;
class EmployerController extends Controller
{
    //
   
   public function index(){}
   
    public function createEmployer(Request $request){
        
            $request->validate([
                'company_name' => 'required',
                'email' => 'required',
                'location' => 'required'
            
            ]);
            $employer = Employer::create([
                'company_name'=> $request->company_name,
                'email'=>$request->email,
                'location'=>$request->location,
            ]);
            return response()->json($employer);
    }

    public function readEmployer($id){
        try{
            $employer = Employer::findOrFail($id);
            if($employer){
                return response()->json($employer);
            }
            else{
                return response()->json('No Employer was found with ID:', $id);
            }
        }
        catch(\Exception $e){
            return response()->json([
                'error'=>'Employer does not exist With Such an ID'
    ], 400);
        } 
}
public function updateEmployer($id, Request $request){
    try{
        $request->validate([
            'company_name'=>'required',
            'email'=>'required'
        ]);
         $employer = Employer::findOrFail($id);
        if($employer){
            $employer->company_name='company_name';
            $employer->email='email';
        }
    }
    catch(\Exception $e){
        return response()->json((["error"]));
    }
} 
}