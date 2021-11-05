<?php

namespace App\Http\Controllers;

use JWTAuth;
use Illuminate\Http\Request;
use App\Models\WorkCondition;

class WorkConditionController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    public function index()
    {
        $workConditions = WorkCondition::simplePaginate(2);

        if(JWTAuth::user()->usertype == 'admin')
        
        return response()->json([
            'data' => $workConditions,
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
            'name' => 'required',
            'description' => 'required',
        ]);

        
        $workCondition = new WorkCondition();
        $workCondition->name = $request->name;
        $workCondition->description = $request->description;
        
        if(JWTAuth::user()->usertype == 'admin')

        return response()->json([
            'success' => true,
            'message' => 'Work Condition Saved successfully !!!',
            'data' => $workCondition->save(),
        ], 201);

        else
            return response()->json([
                'success' => false,
                'message' => 'Sorry, you can\'t access this resource',
            ], 500);

    }

    public function show($id)
    {
        $workCondition = WorkCondition::findOrFail($id);
        return response()->json([
            'data' => $workCondition
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);

        $workCondition = WorkCondition::findOrFail($id);
        $workCondition->name = $request->name;
        $workCondition->description = $request->description;
        
        if(JWTAuth::user()->usertype == 'admin')

        return response()->json([
            'success' => true,
            'message' => 'Work Condition updated successfully !!!',
            'data' => $workCondition->save(),
        ], 201);

        else
            return response()->json([
                'success' => false,
                'message' => 'Sorry, you can\'t access this resource',
            ], 500);

    }

    public function delete(Request $request, $id)
    {
        $workCondition = WorkCondition::findOrFail($id);
        
        if(JWTAuth::user()->usertype == 'admin')

        return response()->json([
            'success' => true,
            'message' => 'Work Condition deleted successfully !!!',
            'data' => $workCondition->delete(),
        ], 202);

        else
            return response()->json([
                'success' => false,
                'message' => 'Sorry, you can\'t access this resource',
            ], 500);
    }

}
