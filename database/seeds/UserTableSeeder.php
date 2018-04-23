<?php

use Imperium\Models\Role;
use Imperium\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'Administrador')->first();
        $role_pat = Role::where('name', 'Patrocinador')->first();
        $role_user  = Role::where('name', 'Utilizador')->first();

        $user_admin = new User();
        $user_admin->name = 'Administrador';
        $user_admin->email = 'admin@sapo.pt';
        $user_admin->password = bcrypt('admin');
        $user_admin->is_verified = 1;
        $user_admin->save();
        $user_admin->roles()->attach($role_admin);

        $user_pat = new User();
        $user_pat->name = 'Patrocinador';
        $user_pat->email = 'pat@sapo.pt';
        $user_pat->password = bcrypt('pat');
        $user_pat->is_verified = 1;
        $user_pat->save();
        $user_pat->roles()->attach($role_pat);

        $user = new User();
        $user->name = 'User';
        $user->email = 'user@sapo.pt';
        $user->password = bcrypt('user');
        $user->is_verified = 1;
        $user->save();
        $user->roles()->attach($role_user);
    }
}
