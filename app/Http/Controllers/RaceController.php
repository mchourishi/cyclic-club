<?php

namespace App\Http\Controllers;

use App\Race;
use App\Rider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Club;

class RaceController extends Controller
{
    private $validationRules;

    /**
     * RaceController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->validationRules = [
            config('constants.RACES.FIELDS.TITLE') => parent::VAL_REQ,
            config('constants.RACES.FIELDS.ADDRESS') => parent::VAL_REQ,
            config('constants.RACES.FIELDS.DATE_TIME') => parent::VAL_REQ_DATE_TIME,
            config('constants.RACES.FIELDS.STATUS') => parent::VAL_REQ,
            config('constants.RACES.FIELDS.CLUB_ID') => parent::VAL_REQ_INTEGER,
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $races = Race::latest()->orderBy(config('constants.RACES.FIELDS.STATUS'))->get();
        return view('races.index', compact('races'));
    }

    /**
     * Show the form for creating a new resource.
     * @param Club $clubs
     * @return \Illuminate\Http\Response
     */
    public function create(Club $clubs)
    {
        $clubs = $clubs->getClubs();
        $riders = Rider::get();
        return view('races.create', compact('clubs','riders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate($this->validationRules);

        try {
            $data = $request->all();
            $data['date_time'] = Carbon::createFromFormat('d-m-Y g:i', $request->date_time)->toDateTimeString();
            $race = Race::create($data);
            // Attach Riders to the Race.
            if(!empty($request->riders)){
                $riders = Rider::find($request->riders);
                $race->riders()->attach($riders);
            }
            $message = "Successfully added Race.";
            return redirect()->route(\config('constants.RACES.ROUTE.INDEX'))->with(parent::SESSION_MESSAGE, $message);
        } catch (\Exception $e) {
            $message = "Failed creating Race";
            return redirect()->route(\config('constants.RACES.ROUTE.CREATE'))->with(parent::SESSION_ERROR, "{$message}, please try again.");
        }
    }

    /**
     * Display Race Riders and their results.
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id){
        $race = Race::findorFail($id);
        $riders = $race->riders()->orderBy('order')->get();
        return view('races.show', compact('race','riders'));
    }
}
