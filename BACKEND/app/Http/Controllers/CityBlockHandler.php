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
//        die('already done');

        $start = 32760;
        $stop = 32768;

        $Z = 0;
        for ($X=$start; $X < $stop; $X++) {
            for ($Y=$start; $Y < $stop; $Y++) {
                $Z = $Z + 1;
                $this->makeBlock($X,$Y);
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
        $TypeArray = [0,"Shop","Work","Home","Home"];
        for ($i=0; $i < 8; $i++) {
            // create 8 buildings
            $B = new \App\Building;
            $B->CityBlock = $CityBlock->id;
            $B->save();
            for ($Number=1; $Number < 5 ; $Number++) {
// This is done because the create method seems to have a bug when assigning
// enum values. Manually seems to work.
                $f = new \App\Floor;
                $f['floortype']=$TypeArray[$Number];
                $f['Number']=$Number;
                $f['BuildingID']=$B->id;
                $f->save();
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
    public function show(Request $request)
    {
        return(\App\Cityblock::find($request->input('id')));
        //
    }

    public function dump(Request $request)
    {
        $cbi = $request->input('id');
        $cb = \App\Cityblock::find($cbi);
        $blist = \App\Building::where('Cityblock',$cbi)->get();
        foreach ($blist as $building) {
            $floors = \App\Floor::where('BuildingID',$building['id'])->get();
            $building['floors']=$floors;
        }
        $cb['buildings']=$blist;
        return($cb);
    }

    public function dumpgrid(Request $request)
    {
    /*
        given an X,Y, width, and height:  return an 2-dimensional array
        of each city block in that range.
    */
        $X = $request->input('X');
        $Y = $request->input('Y');
        $w = $request->input('W');
        $h = $request->input('H');
        $result = [];
        for ($i=$X; $i < $X+$w; $i++) {
            $line = [];
            for ($j=$Y; $j < $Y+$h; $j++) {
                // retrieve the id based on X and Y
                $cb = \App\Cityblock::where('X',$i)->where('Y',$j)->first();
                $line[] = $cb['id'];
            }
            $result[]=$line;
        }
        return $result;
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
