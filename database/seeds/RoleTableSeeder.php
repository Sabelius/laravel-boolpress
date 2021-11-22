<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleList = ['Amministratore', 'Editore', 'Scrittore', 'Lettore'];

        for ($i = 1 ; $i <= 4; $i++){
            $newRole = new Role();
            $newRole->rank = $i;
            $newRole->name = $roleList[$i-1];
            $newRole->save();
        }
        
    }
}
