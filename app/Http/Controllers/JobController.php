<?php

namespace App\Http\Controllers;

use JWTAuth;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JobController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    public function index()
    {
        $jobs = DB::table('jobs')
                    ->join('categories', 'jobs.category_id', '=', 'categories.id')
                    ->join('job_types', 'jobs.jobType_id', '=', 'job_types.id')
                    ->join('work_conditions', 'jobs.workCondition_id', '=', 'work_conditions.id')
                    ->select('jobs.*', 'categories.category_name', 'job_types.job_type_name', 'work_conditions.work_conditions_name')
                    ->simplePaginate(5);

        return response()->json([
            'data' => $jobs,
        ]);

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'job_name' => 'required',
            'category' => 'required',
            'jobtype' => 'required',
            'work_condition' => 'required',
        ]);

        
        $job = new Job();
        $job->job_name = $request->job_name;
        $job->category_id = $request->category;
        $job->jobType_id = $request->jobtype;
        $job->workCondition_id = $request->work_condition;
        
        if(JWTAuth::user()->usertype == 'admin')

        return response()->json([
            'success' => true,
            'message' => 'Job Saved successfully !!!',
            'data' => $job->save(),
        ], 201);

        else
            return response()->json([
                'success' => false,
                'message' => 'Sorry, you can\'t access this resource',
            ], 500);

    }

    public function show($id)
    {
        $job = Job::findOrFail($id);
        return response()->json([
            'data' => $job
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'job_name' => 'required',
            'category' => 'required',
            'jobtype' => 'required',
            'work_condition' => 'required',
        ]);

        
        $job = Job::findOrFail($id);
        $job->job_name = $request->job_name;
        $job->category_id = $request->category;
        $job->jobType_id = $request->jobtype;
        $job->workCondition_id = $request->work_condition;
        
        if(JWTAuth::user()->usertype == 'admin')

        return response()->json([
            'success' => true,
            'message' => 'Job Updated successfully !!!',
            'data' => $job->save(),
        ], 200);

        else
            return response()->json([
                'success' => false,
                'message' => 'Sorry, you can\'t access this resource',
            ], 500);

    }

    public function delete(Request $request, $id)
    {
        $job = Job::findOrFail($id);
        
        if(JWTAuth::user()->usertype == 'admin')

        return response()->json([
            'success' => true,
            'message' => 'Job deleted successfully !!!',
            'data' => $job->delete(),
        ], 202);

        else
            return response()->json([
                'success' => false,
                'message' => 'Sorry, you can\'t access this resource',
            ], 500);
    }

    public function search($job_name)
    {
        $search = Job::where("job_name", "like", "%" . $job_name . "%")
                    ->get();
        return $search;
    }
    
}
