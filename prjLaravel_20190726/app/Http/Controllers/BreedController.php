<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Breed;
use App\Cat;

class BreedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listBreeds = Breed::all();
        //dd($listBreeds);
        return view('breed.list_breed', compact('listBreeds'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /* Cach 1 */
        /*$breed = Breed::find($id);
        $listCats = $breed->cats;// cats is a name of relations (function name in Breed class)
        //dd($breed, $listCats);
        return view('breed.show', compact('breed', 'listCats'));*/

        /* Cach 2 */
        $breed = Breed::with('cats')->find($id);
        //dd($breed);
        //dd($breed->name, $breed->cats);
        return view('breed.show', compact('breed'));

        //$breed = Breed::with('cats')->find($id)->toArray();// collection tra ve array
        //dd($breed);
        //dd($breed['name'], $breed['cats']);


        /* lay thong tin ra kem theo dieu kien voi 1 hay nhieu relationships */
        /*$breed = Breed::with([
            'cats'=>function($query) {
                return $query->where('name', 'like', '%'.'e'.'%');
                //return $query->where('name', 'like', '%'.'e'.'%')->get(); // ->get()  ==> thừa truy vấn
            }//,
//            'relation_name1',
//            'relations_name'=>function($query){
//                return $query->where('column', 'condition', 'value');
//            }
        ])->find($id)->toArray();
        dd($breed);*/

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*
        foreach($breed->cats as $cat)
        {
            $cat->delete();
        }
        $breed->delete();
        */
        $breed = Breed::find($id);
        $breed->delete();
        echo 'Success';
    }

    public function listCatByBreedID($id) {
        $breed = Breed::find($id);
        $listCats = Cat::where('breed_id', $id)->get();
        //$listCats = $breed->cats;
        //dd($listCats);
        return view('breed.list_cat', compact('listCats', 'breed'));
    }
}
