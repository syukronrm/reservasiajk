<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Syukron Rifail M';
        $user->nrp = '5114100093';
        $user->no_hp = '08563639879';
        $user->password =  bcrypt('sandi');
        $user->save();
    }
}
