<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@mail.ru',
            'password' => Hash::make('password')
        ]);

        $role = Role::create([
            'name' => 'admin',
            'slug' => 'admin',
        ]);

        $role2 = Role::create([
            'name' => 'user',
            'slug' => 'user',
        ]);

        DB::table('user_roles')->insert([
            'user_id' => $user->id,
            'role_id' => $role->id
        ]);
    }
}
