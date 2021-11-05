<?php

namespace App\Http\Controllers;

use JWTAuth;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $user;

    public function __construct()
    {
        //$this->middleware('auth:api')->except('index', 'show');
        $this->user = JWTAuth::parseToken()->authenticate();
    }

    public function index()
    {
        $jobCats = Category::simplePaginate(2);

        if(JWTAuth::user()->usertype == 'admin')
        
        return response()->json([
            'data' => $jobCats,
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

        
        $jobCat = new Category();
        $jobCat->name = $request->name;
        $jobCat->description = $request->description;
        
        if(JWTAuth::user()->usertype == 'admin')

        return response()->json([
            'success' => true,
            'message' => 'Category Saved successfully !!!',
            'data' => $jobCat->save(),
        ], 201);

        else
            return response()->json([
                'success' => false,
                'message' => 'Sorry, you can\'t access this resource',
            ], 500);

    }

    public function show($id)
    {
        $jobCat = Category::findOrFail($id);
        return response()->json([
            'data' => $jobCat
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);

        $jobCat = Category::findOrFail($id);
        $jobCat->name = $request->name;
        $jobCat->description = $request->description;
        
        if(JWTAuth::user()->usertype == 'admin')

        return response()->json([
            'success' => true,
            'message' => 'Category updated successfully !!!',
            'data' => $jobCat->save(),
        ], 200);

        else
            return response()->json([
                'success' => false,
                'message' => 'Sorry, you can\'t access this resource',
            ], 500);

    }

    public function delete(Request $request, $id)
    {
        $jobCat = Category::findOrFail($id);
        
        if(JWTAuth::user()->usertype == 'admin')

        return response()->json([
            'success' => true,
            'message' => 'Category deleted successfully !!!',
            'data' => $jobCat->delete(),
        ], 202);

        else
            return response()->json([
                'success' => false,
                'message' => 'Sorry, you can\'t access this resource',
            ], 500);
    }

}

