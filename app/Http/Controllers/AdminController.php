<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservations;

class AdminController extends Controller
{
	private function getAll() {
		$reservations = Reservations::all();
    	foreach ($reservations as $res) {
    		$res->nama = $res->user->name;
    		$res->nrp = $res->user->nrp;
    	}
    	return $reservations;
	}

    public function index() {
    	$reservations = $this->getAll();

    	return view('admin', ['reservations' => $reservations]);
    }

    public function accept(Request $request) {
    	$reservation = Reservations::find($request->input('idReservasi'));
    	$reservation->status = "ACCEPTED";
    	$reservation->save();

    	return view('admin', ['reservations' => $this->getAll()]);
    }

    public function reject(Request $request) {
    	$reservation = Reservations::find($request->input('idReservasi'));
    	$reservation->status = "REJECTED";
    	$reservation->save();

    	return view('admin', ['reservations' => $this->getAll()]);
    }

    public function delete(Request $request) {
    	Reservations::destroy($request->input('idReservasi'));

    	return view('admin', ['reservations' => $this->getAll()]);
    }
}
