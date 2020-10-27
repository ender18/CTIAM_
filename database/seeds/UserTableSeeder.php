<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'admin')->first();
        $role_lider = Role::where('name', 'lider')->first();
        $role_final = Role::where('name', 'final')->first();

        $user_admin = new User();
        $user_admin->name = 'administrador';
        $user_admin->email = 'admin@mail.com';
        $user_admin->password = bcrypt('admin123');
        $user_admin->save();
        $user_admin->roles()->attach($role_admin);

        $user_lider = new User();
        $user_lider->name = 'lider';
        $user_lider->email = 'lider@mail.com';
        $user_lider->password = bcrypt('lider123');
        $user_lider->save();
        $user_lider->roles()->attach($role_lider);

        $user_final = new User();
        $user_final->name = 'final';
        $user_final->email = 'final@mail.com';
        $user_final->password = bcrypt('final123');
        $user_final->save();
        $user_final->roles()->attach($role_final);




    }
}
