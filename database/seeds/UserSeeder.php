<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $query = DB::table('users')->select(DB::raw('MAX(RIGHT(kode_unity,5)) as kode'));
        $kd = "";
        if ($query->count() > 0) {
            foreach ($query->get() as $k) {
                $tmp = ((int) $k->kode)+1;
                $kd = sprintf("%05s", $tmp);
            }
        }else{
            $kd = "00001";
        }
        DB::table('users')->insert([
            'kode_unity' => 'UP-ADMIN-' . $kd,
            'username' => 'admin',
            'password' => Hash::make('Unity2022'),
            'name' => 'Admin Unity Property',
            'email' => 'unitypropertindo@gmail.com',
        ]);
    }
}
