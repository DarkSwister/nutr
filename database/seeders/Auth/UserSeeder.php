<?php

namespace Database\Seeders\Auth;

use App\Domains\Auth\Models\User;
use App\Models\Group;
use Database\Seeders\Traits\DisableForeignKeys;
use Illuminate\Database\Seeder;

/**
 * Class UserTableSeeder.
 */
class UserSeeder extends Seeder
{
    use DisableForeignKeys;

    /**
     * Run the database seed.
     */
    public function run()
    {
        $this->disableForeignKeys();

        // Add the master administrator, user id of 1
        $admin = User::create([
            'type' => User::TYPE_ADMIN,
            'first_name' => 'Super',
            'last_name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => 'secret',
            'email_verified_at' => now(),
        ]);


        if (app()->environment(['local', 'testing'])) {
            $user = User::create([
                'type' => User::TYPE_USER,
                'first_name' => 'Test User',
                'last_name' => 'User',
                'email' => 'user@user.com',
                'password' => 'secret',
                'email_verified_at' => now(),
            ]);
        }
        Group::create(['name' => 'Test']);
        $this->enableForeignKeys();
    }
}
