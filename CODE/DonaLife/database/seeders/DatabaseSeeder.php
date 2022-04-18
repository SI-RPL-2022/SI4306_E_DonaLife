<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            RegionalSeeder::class,
        ]);
        $faker = Faker::create('id_ID');
        for ($i=1; $i <= 20; $i++) { 
            User::insert([
                'nama' => $faker->name(),
                'email' => $faker->unique()->safeEmail(),
                'telepon'=>$faker->numerify('##########'),
                'role' => 'donatur',
                'alamat'=>$faker->address,
                'created_at' => now(),
                'updated_at' => now(),
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            ]);
        };
    }
}
