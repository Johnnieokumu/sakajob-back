<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jobs;

class JobsController extends Controller
{
    public function index()
    {
        $jobs = Jobs::all();
        return $jobs;
    }
    public function createJob(Request $request){
        $request->validate([
            'field_name'=>'required',
            'profession'=>'required',
            'duration'=>'required'
        ]);
        $job = Jobs::create([
                'field_name'=>$request->field_name,
                'profession'=>$request->profession,
                'duration'=>$request->duration
        ]);
        return response()->json($job);
    }
    public function readJob($id){
        try{
            $job = Jobs::findOrFail($id);
            if($job){
                return response()->json($job);
            }
            else{
                return response()->json('No Job was found with id:', $id);
            }
        }
        catch(\Exception $e){
            return response()->json($e);
        }
    }
    
    public function updateJobs($id, Request $request){
        try{
            $request->validate([
                'field_name'=>'required',
                'profession'=>'required',
                'duration'=>'required'
            ]);
            $job = Jobs::findOrFail($id);
            if($job){
                $job->field_name = $request->field_name;
                $job->profession = $request->profession;
                $job->duration = $request->duration;
                $job->save();
                return response()->json($job);
            }
            return response()->json(['error' => 'Job not found'], 404);
        }
        catch(\Exception $e){
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function deleteJob($id, Request $request){
        try {
            // Validate the request data
            $request->validate([
                'field_name' => 'required',
                'profession' => 'required'
            ]);
    
            // Find the job by its ID
            $job = Jobs::findOrFail($id);
    
            // If the job exists
            if ($job) {
                // Check if the field name and profession match the job's field and profession
                if ($job->field_name == $request->field_name && $job->profession == $request->profession) {
                    // Delete the job
                    $job->delete();
                    
                    return response()->json(['message' => 'Job deleted successfully'], 200);
                } else {
                    // If the field name or profession doesn't match, return an error
                    return response()->json(['error' => 'Field name or profession does not match the job'], 400);
                }
            } else {
                // If the job with the given ID is not found, return an error
                return response()->json(['error' => 'Job not found'], 404);
            }
        } catch (\Exception $e) {
            // If an exception occurs during the process, return an error
            return response()->json(['error' => 'Failed to delete job: ' . $e->getMessage()], 500);
        }
    }
    
}
