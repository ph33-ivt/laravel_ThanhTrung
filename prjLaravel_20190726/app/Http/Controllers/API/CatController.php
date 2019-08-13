<?php

namespace App\Http\Controllers\API;

use Dotenv\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Cat;

class CatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listCat = Cat::all();
        return response()->json($listCat, 200);// 200: http status code
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rule = [
            'name' => 'required|min:3',
            'age' => 'required|numeric',
            'breed_id' => 'required|numeric',
        ];
        $validator = \Validator::make($request->all(), $rule);
        if ($validator->fails()) {
            return response()->json([
                'error' => $validator->errors(),
                'message' => 'validation fail'
            ], 400);
        }
        $data = $request->all();
        $cat = Cat::create($data);
        return response()->json($cat, 201);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*Cat::destroy($id);
        return response()->json(['message'=>'Delete cat success'], 200);*/

        $cat = Cat::find($id);
        $breedId = $cat->breed_id;
        $cat->delete();
        $listCats = Cat::where('breed_id', $breedId)->get();
        return response()->json(
            ['message' => 'Delete cat success!',
                'list_cat' => $listCats,
            ], 200);

        /*if (\Auth::check() && \Auth::user()->role == 1) {
            $cat = Cat::find($id);
            $breedId = $cat->breed_id;
            $cat->delete();
            $listCats = Cat::where('breed_id', $breedId)->get();
            return response()->json(
                ['message' => 'Delete cat success!',
                    'list_cat' => $listCats,
                ], 200);
        }*/
    }
}
