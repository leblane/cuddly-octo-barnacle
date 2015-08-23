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
    public function create(Request $request)
    {
        $postdata = $request->all();
        $X = $postdata['X'];
        $Y = $postdata['Y'];
        $name = $postdata['name'];
        // initialize our city block (8 buildings with 4 floors each.)
        return $this->makeBlock($X,$Y);
    }

    public function makeInitialCityBlock()
    {
        die('already done');

        $Z = 0;
        for ($X=32760; $X < 32768; $X++) {
            for ($Y=32760; $Y < 32768; $Y++) {
                $Z = $Z + 1;
//                $this->makeBlock($X,$Y);
            }
        }
        return $Z . "Loads of blocks made";
    }

    private function makeBlock($X,$Y)
    {
        $CityBlock=new \App\Cityblock;
        $CityBlock->X = $X;
        $CityBlock->Y = $Y;
        $xy = $X*65536+$Y;
        $CityBlock->name = "CityBlock#" . $xy;
        $CityBlock->save();
        for ($i=0; $i < 8; $i++) {
            // create 8 buildings
            $B = new \App\Building;
            $B->CityBlock = $CityBlock->id;
            $B->save();
            $TypeArray = ['','Shop','Work','Home','Home'];
            for ($Number=1; $Number < 5 ; $Number++) {
                \App\Floor::create(['floortype'=>$TypeArray[$Number],
                    'Number'=>$Number,
                    'BuildingID'=>$B->id ]);
            }
        }
        return $CityBlock->id;
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
