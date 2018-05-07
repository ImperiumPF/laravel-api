<?php

use Imperium\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = new Role();
        $role_admin->name = 'Administrador';
        $role_admin->description = 'Administrador do sistema';
        $role_admin->save();
        
        $role_pat = new Role();
        $role_pat->name = 'Patrocinador';
        $role_pat->description = 'Patrocinador';
        $role_pat->save();

        $role_user = new Role();
        $role_user->name = 'Utilizador';
        $role_user->description = 'Utilizador';
        $role_user->save();
    }
}
