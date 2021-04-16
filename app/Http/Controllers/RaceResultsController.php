<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Race;

class RaceResultsController extends Controller
{
    /**
     * @param $race_id
     * Race Results View.
     * @return \Illuminate\Http\Response
     */
    public function create($race_id){
        $riders = Race::findorFail($race_id)->riders;
        return view('races.results', compact('riders', 'race_id'));
    }

    /**
     * Update Sort Order of Riders for a race
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $riders = $request->rider;
        try {
            $race_riders = Race::find($request->race_id)->riders();
            foreach ($riders as $key => $rider) {
                $race_riders->updateExistingPivot($rider, ['order' => $key]);
            }
            $message = "Successfully added Race Results.";
            return redirect()->route(\config('constants.RACES.ROUTE.INDEX'))->with(parent::SESSION_MESSAGE, $message);
        } catch (\Exception $e) {
            $message = "Failed creating Race Results.";
            return redirect()->route(\config('constants.RACES.ROUTE.INDEX'))->with(parent::SESSION_ERROR, "{$message}, please try again.");
        }

    }
}
