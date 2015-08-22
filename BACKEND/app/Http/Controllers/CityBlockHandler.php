<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CityBlockHandler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($X,$Y,$name)
    {
        // initialize our city block (8 buildings with 4 floors each.)
        $CityBlock=App\City::create(compact([$X,$Y,$name]));
        for ($i=0; $i < 8; $i++) {
            // create 8 buildings
            $B = new App\Building;
            $B->CityBlock => $CityBlock->id;
            $B->save();
            $TypeArray = ['','Shop','Work','Home','Home'];
            for ($Number=1; $Number < 5 ; $Number++) {
                App\Floor::create(['floortype'=>$TypeArray[$Number],
                    'Number'=>$Number,
                    'BuildingID'=>$B->id ])
            }
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
