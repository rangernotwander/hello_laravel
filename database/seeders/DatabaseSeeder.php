<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(50)->create();

        // 将第一个用户设为管理员
        $admin = User::first();
        $admin->update([
            'name' => 'Summer',
            'email' => 'summer@example.com',
            'is_admin' => true,
        ]);
    }
}
