<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('name',"Superadmin")->first();
        if(is_null($role)){
            $role = new Role();
            $role->name = "Superadmin"; 
            $role->save();
        }
    }
}
