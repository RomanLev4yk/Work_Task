<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\CatResource;
use Illuminate\Support\Facades\DB;

use App\Cat;

class CatController extends Controller
{
 
    public function create(Request $request) : CatResource
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'age' => 'required|integer',
                'weight' => 'required|integer',
                'amount_of_legs' => 'required|integer'
            ]);
        }
        catch(\Exception $err) {
            logger($err->getMessage());

            return response()->json([
                'status'=> false,
                'message' => $err->getMessage(),
                'model'=> null], 422);
        }

        $model = new Cat;
        
        try {
            $model = $model->fill([
                'name'=>$request->input('name'),
                'age'=>$request->input('age'),
                'weight'=>$request->input('weight'),
                'amount_of_legs'=>$request->input('amount_of_legs')
            ]);

            $model->save();
        } 
        catch (\Exception $err) {
            logger($err->getMessage());

            return response()->json([
                'status'=> false,
                'message' => $err->getMessage(),
                'model'=> null], 422);
        }

        return new CatResource($model);
    }

    public function show(int $id) : CatResource
    {
        try {
            Cat::findOrFail($id);
        } 
        catch (\Exception $err) {
            logger($err->getMessage());

            return response()->json([
                'status'=> false,
                'message' => $err->getMessage()], 422);
        }

        return new CatResource($id);
    }
            
    public function update(Request $request, int $id) : CatResource
    {
        try {
            $request->validate([
                'name' => 'required|string',
                'age' => 'required|integer',
                'weight' => 'required|integer',
                'amount_of_legs' => 'required|integer'
            ]);
        }
        catch (\Exception $err) {
            logger($err->getMessage());

            return response()->json([
                'status'=> false,
                'message' => $err->getMessage()], 422);
        }

        return DB::transaction(function () use($request, $id) {

            try {
                $model = Cat::findOrFail($id);
            }
            catch (\Exception $err) {
                logger($err->getMessage());

                return response()->json([
                    'status'=> false,
                    'message' => $err->getMessage()], 422);
            }
       
            try {
                $model = $model->fill([
                    'name'=>$request->input('name'),
                    'age'=>$request->input('age'),
                    'weight'=>$request->input('weight'),
                    'amount_of_legs'=>$request->input('amount_of_legs')]);
                $model->save();
            }
            catch (\Exception $err) {
                logger($err->getMessage());

                return response()->json([
                    'status'=> false,
                    'message' => $err->getMessage(),
                    'model'=>null], 422);
            }
            
            return new CatResource($model);
        });
    }

    public function delete(int $id)
    {
        return DB::transaction(function () use($id) {

            try {
                $model = Cat::findOrFail($id);
            }
            catch (\Exception $err) {
                logger($err->getMessage());

                return response()->json([
                    'status'=> false,
                    'message' => $err->getMessage()], 422);
            }
            try {
                $model->delete();
            } 
            catch (\Exception $err) {
                logger($err ->getMessage());

                return response()->json([
                    'status'=> false,
                    'message' => $err->getMessage(),
                    'model'=>null], 422);
            }
            return response()->json([
                'status'=>true,
                'message'=>('delete successful'),
                'model'=>null ], 200);
        });    
    }
}