<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // one admin, one regular user
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@gulp.dev',
            'password' => '$2y$10$lt6fLKYI5AFzvUsv4Gbdc.7F8difMgAqa2UD9hmosuG9X9x.ZEpGG', // 123456
            'is_admin' => true,
        ]);
        User::create([
            'name' => 'Henrique Brites',
            'email' => 'henriquebrites@live.com',
            'password' => '$2y$10$lt6fLKYI5AFzvUsv4Gbdc.7F8difMgAqa2UD9hmosuG9X9x.ZEpGG', // 123456
            'is_admin' => false,
        ]);
    }
}
