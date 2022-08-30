<?php

namespace App\Http\Controllers;

use App\Models\State;
use App\Models\Cities;
use App\Models\Vendor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function fetchvendorsList(Request $request) {

        $input = $request->all();
        $states = Vendor::where('shop_id', $input['shop_id'])->get()->toArray();
        return $states;
        if (count($states)) {
            $message = 'Success';
            return Response()->json($states);
        }
    }


    public function statelist(Request $request) {

        $input = $request->all();
        $states = State::where('country_id', $input['country_id'])->get()->toArray();
        if (count($states)) {
            $message = 'Success';
            return Response()->json($states);
        }
    }

    public function citylist(Request $request) {

        $input = $request->all();
        $city = Cities::where('state_id', $input['state_id'])->get()->toArray();
        if (count($city)) {
            $message = 'Success';
            return Response()->json($city);
        } else {
            $message = 'Data not found';
            return Response()->json($city);
        }
    }
}
