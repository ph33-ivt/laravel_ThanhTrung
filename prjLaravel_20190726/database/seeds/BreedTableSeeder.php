<?php

use Illuminate\Database\Seeder;
//use App\Breed;

class BreedTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //insert db: cach 1
        factory(App\Breed::class, 5)->create();//factory: Khai bao goi model Breed

//        //insert db: cach 2 -> chi insert duoc 1 record
//        Breed::create([
//            'name' => 'breed1'
//        ]);
//
//        //insert db: cach 3
//        Breed::insert([
//            ['name' => 'breed1'],
//            ['name' => 'breed2'],
//            ['name' => 'breed3']
//        ]);
    }
}
