<?php

namespace App\Http\Controllers;

use JWTAuth;
use App\Models\JobType;
use Illuminate\Http\Request;

class JobTypeController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    public function index()
    {
        $jobTypes = JobType::simplePaginate(2);

        if(JWTAuth::user()->usertype == 'admin')
        
        return response()->json([
            'data' => $jobTypes,
        ]);

        else
            return response()->json([
                'success' => false,
                'message' => 'Sorry, you can\'t access this resource',
            ], 500);


    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'job_type_name' => 'required',
            'JT_description' => 'required',
        ]);

        
        $jobType = new JobType();
        $jobType->job_type_name = $request->job_type_name;
        $jobType->JT_description = $request->JT_description;
        
        if(JWTAuth::user()->usertype == 'admin')

        return response()->json([
            'success' => true,
            'message' => 'JobType Saved successfully !!!',
            'data' => $jobType->save(),
        ], 201);

        else
            return response()->json([
                'success' => false,
                'message' => 'Sorry, you can\'t access this resource',
            ], 500);

    }

    public function show($id)
    {
        $jobType = JobType::findOrFail($id);
        return response()->json([
            'data' => $jobType
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'job_type_name' => 'required',
            'JT_description' => 'required',
        ]);

        $jobType = JobType::findOrFail($id);
        $jobType->job_type_name = $request->job_type_name;
        $jobType->JT_description = $request->JT_description;
        
        if(JWTAuth::user()->usertype == 'admin')

        return response()->json([
            'success' => true,
            'message' => 'JobType updated successfully !!!',
            'data' => $jobType->save(),
        ], 200);

        else
            return response()->json([
                'success' => false,
                'message' => 'Sorry, you can\'t access this resource',
            ], 500);

    }

    public function delete(Request $request, $id)
    {
        $jobType = JobType::findOrFail($id);
        
        if(JWTAuth::user()->usertype == 'admin')

        return response()->json([
            'success' => true,
            'message' => 'JobType deleted successfully !!!',
            'data' => $jobType->delete(),
        ], 202);

        else
            return response()->json([
                'success' => false,
                'message' => 'Sorry, you can\'t access this resource',
            ], 500);
    }
    
}
