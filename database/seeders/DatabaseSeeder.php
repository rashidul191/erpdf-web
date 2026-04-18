<?php

namespace Database\Seeders;

use App\Enums\RoleStatus;
use App\Models\Role;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // User::factory(10)->create();
        $user = tap(
            User::create([
                'username' => 'user',
                'name' => 'User',
                'phone' => '01700000000',
                'email' => 'user@gmail.com',
                'address' => 'Dhaka, Bangladesh',
                'password' => Hash::make('12345678')
            ])
        )->markEmailAsVerified();

        $admin = Admin::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'phone' => '01800000000',
            'password' => Hash::make('12345678'),
            'role' => RoleStatus::Admin
        ]);
        $this->call(GlobalDataSeeder::class);
        $this->call(PageDataSeeder::class);
        $this->call(LaratrustSeeder::class);

        $user->attachRole(Role::whereName('user')->first());
        $admin->attachRole(Role::whereName('admin')->first());
    }
}
