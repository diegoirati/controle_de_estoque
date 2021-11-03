<?php

use App\User;
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
        User::query()->create([
            'name' => 'Guarapuava',
            'email' => 'guarapuava@feira.com',
            'password' => bcrypt('senhagpuava123'),
            'cidade' => 'guarapuava'
        ]);

        User::query()->create([
            'name' => 'Irati',
            'email' => 'irati@feira.com',
            'password' => bcrypt('senhairate456'),
            'cidade' => 'irati'
        ]);
    }
}
