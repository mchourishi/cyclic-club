<?php

namespace App\Http\Controllers;

use App\Club;
use App\Rider;
use Illuminate\Http\Request;

class RiderController extends Controller
{
    private $validationRules;

    /**
     * RiderController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->validationRules = [
            config('constants.RIDERS.FIELDS.FIRST_NAME')    => parent::VAL_REQ,
            config('constants.RIDERS.FIELDS.LAST_NAME')     => parent::VAL_REQ,
            config('constants.RIDERS.FIELDS.GRADING')       => parent::VAL_REQ,
            config('constants.RIDERS.FIELDS.AGE')           => parent::VAL_REQ_INTEGER,
            config('constants.RIDERS.FIELDS.GENDER')        => parent::VAL_REQ,
            config('constants.RIDERS.FIELDS.CLUB_ID')       => parent::VAL_REQ_INTEGER,
        ];
    }

    /**
     * Show the form for creating a new resource.
     * @param Club $clubs
     * @return \Illuminate\Http\Response
     */
    public function create(Club $clubs)
    {
        $clubs = $clubs->getClubs();
        return view('riders.create', compact('clubs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validationRules);
        try {
            Rider::create($request->all());
            $message = "Successfully added the Rider.";
            return redirect()->route(\config('constants.RIDERS.ROUTE.CREATE'))->with(parent::SESSION_MESSAGE, $message);

        } catch (\Exception $e) {
            $message = "Failed creating Rider";
            return redirect()->route(\config('constants.RIDERS.ROUTE.CREATE'))->with(parent::SESSION_ERROR, "{$message}, please try again.");
        }
    }
}
