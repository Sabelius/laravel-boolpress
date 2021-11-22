<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use App\Role;
use App\User;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        $role_ids = Role::pluck('id')->toArray();

        foreach ($users as $user){
            $user->roles()->sync([Arr::random($role_ids), Arr::random($role_ids)]);
        }
    }
}
