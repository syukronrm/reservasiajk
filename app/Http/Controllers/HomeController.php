<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Reservations;

class HomeController extends Controller
{
    public function index() {
    	return view('index');
    }

    public function showReserve() {
    	return view('reserve');
    }

    public function reserve(Request $request) {
    	$dateStart = new \DateTime($request->input('start'));
    	$dateEnd = new \DateTime($request->input('end'));

    	$reservation = new Reservations();
    	$reservation->keperluan = $request->input('keperluan');
    	$reservation->start = date_format($dateStart, "Y-m-d H:i:s");
    	$reservation->end = date_format($dateEnd, "Y-m-d H:i:s");
    	$reservation->status = "PENDING";
    	$reservation->user_id = Auth::id();
    	$reservation->save();

    	return redirect('/');
    }

    public function jadwal() {
        $timeNow = date_format(new \DateTime(), "Y-m-d H:i:s");
        $now = DB::select('select * from reservations where `start`<"'. $timeNow .'" and `end`>"'. $timeNow .'" and status="ACCEPTED" limit 1;');
        $upcoming = DB::select('select * from reservations where `start`>"'. $timeNow .'" and status="ACCEPTED" LIMIT 10;');

        $jadwalNow = null;
        if ($now) {
            $jadwalNow = $now;
        }

        $result = array(
            'now' => $jadwalNow,
            'upcoming' => $upcoming
        );

        return response()->json($result);
    }
}
