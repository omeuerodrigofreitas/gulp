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
            'password' => '2y$10$6Hxz91Iloh4l5kS7J3K70.92OmXsr0JT9DU49b70o5ZqGoAj2yCla', // secret
            'is_admin' => false,
        ]);
    }
}
