<?php

namespace App\Http\Controllers;

use App\Breed;
use App\Cat;
use App\Http\Requests\UpdateCatRequest;
use Illuminate\Http\Request;
use App\Http\Requests\CreateCatRequest;

class CatController extends Controller
{
    public function __construct()
    {
        //$this->middleware('isAdmin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //\DB::enableQueryLog();
        //$listCats = Cat::all(); // select * from cats;
        $listCats = Cat::withTrashed()->get(); // select * from cats ke ca record da bi xoa
        //$listCats = Cat::onlyTrashed()->get(); // lay record da bi xoa
        //dd(\DB::getQueryLog());
        //dd($listCats);

        /*$cat = Cat::withTrashed()->find(1);
        $cat ->restore();*/

        /*$cat = Cat::find(2);
        $cat->forceDelete(); //xoa trong db*/

        return view('cat.list_cat', compact('listCats')); //view(): tro toi folder view; resource->view
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listBreed = Breed::all();
        return view('cat.form-create', compact('listBreed'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCatRequest $request)
    {
        //dd($request->all());
        //$data = $request->all(); //lay tat ca thong tin duoc submit
        //$data = $request->except('_token'); //lay tat ca thong tin duoc submit loai tru _token
        $data = $request->only('name', 'age', 'breed_id');////chi lay cac thong tin duoc submit

        /*Cat::insert($data);// Cach 1: insert()*/
        $cat = Cat::create($data);// Cach 2: create()

        //tao nhieu record
        /*$data = [
            ['name' => 'cat 1',
             'age' => '18',
             'breed_id' => '9',
             'created_at' => now(),
             'update_at' => now(),
            ],
            ['name' => 'cat 2',
             'age' => '20',
             'breed_id' => '10',
             'created_at' => now(),
             'updated_at' => now(),
            ]
        ];
        Cat::insert($data);*/
        return redirect()->route('list-cat');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

   /* //Model finding
    public function show(Cat $cat)
    {
        return view('cat.show', compact('cat'));
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = Cat::find($id);
        $listBreed = Breed::all();
        return view('cat.edit-cat', compact('cat', 'listBreed'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCatRequestRequest $request, $id)
    {
        $data = $request->except('_token', '_method');
        $cat = find($id);
        $cat->update($data);
        return redirect()->route('list-cat');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*//cach 1: delete()
        $cat = Cat::find($id);
        $cat->delete();*/

        //cach 2: destroy()
        Cat::destroy($id);
        return redirect()->route('list-cat');
    }
}
