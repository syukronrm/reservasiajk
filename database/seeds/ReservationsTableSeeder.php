<?php

use Illuminate\Database\Seeder;
use App\Reservations;

class ReservationsTableSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		$res = new Reservations();
		$res->start = new \DateTime();
		$res->end = date_add(new \DateTime(), date_interval_create_from_date_string('1 hours'));
		$res->keperluan = "Kunjungan";
		$res->status = "PENDING";
		$res->user_id = 1;
		$res->save();

		$res = new Reservations();
		$res->start = new \DateTime();
		$res->end = date_add(new \DateTime(), date_interval_create_from_date_string('1 hours'));
		$res->keperluan = "Sesi Lab Jarkom";
		$res->status = "ACCEPTED";
		$res->user_id = 1;
		$res->save();
	}
}
