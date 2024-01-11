<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
// 
        $usersList = [
            [
                'first_name' => 'Administrator',
                'email' => 'admin@admin.com',
                'role_id' => 1,

            ], [
                'first_name' => 'User',
                'email' => 'user@mailinator.com',
                'role_id' => 2,
            ],
            [
                'first_name' => 'Json',
                'email' => 'json@mailinator.com',
                'role_id' => 2,
            ],
            [
                'first_name' => 'Chris',
                'email' => 'chris@mailinator.com',
                'role_id' => 2,
            ]
        ];

        // foreach (range(1,2) as $value) {
        foreach ($usersList as $value) {
            $count = User::where('email',$value['email'])->count();
            if ($count == 0) {
                User::create([
                    // 'first_name'=> $faker->firstName(),
                    'first_name'=> $value['first_name'],
                    'last_name'=> $faker->lastName(),
                    'username'=> $faker->name(),
                    'mobile_number'=> $faker->phoneNumber(),
                    // 'address' => $faker->address(),
                    'profile_picture' => $faker->imageUrl($width = 200, $height = 200),
                    // 'city' => $faker->city(),
                    // 'role_id'=> $faker->randomElement([1,2]),
                    'role_id'=> $value['role_id'],
                    // 'email'=> $faker->safeEmail(),
                    'email'=> $value['email'],
                    'email_verified_at'=> now(),
                    'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
                    'remember_token' => \Str::random(10),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
