<?php

use Illuminate\Database\Seeder;
use App\User;
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
        $user = User::where(['id'=>1])->first();
        if(is_null($user)){
            $user = new User();
            $user->role = "superadmin";
            $user->name = "Debbrota Roy";
            $user->email = "admin@gmail.com";
            $user->password = Hash::make('password'); 
            $user->save();
        }
    }
}
