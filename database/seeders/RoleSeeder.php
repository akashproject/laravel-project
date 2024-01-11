<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role_list = [
            [
                'name' => 'Admin'
            ],
            [
                'name' => 'User'
            ],
        ];

        foreach ($role_list as $key => $value) {
           $count = Role::where('name',$value['name'])->count();
           if ($count == 0) {
               $date = date('Y-m-d H:i:s');
                $insertData = [
                    'name' => $value['name'],
                    'created_at' => $date,
                    'updated_at' => $date,
                ];

                Role::create($insertData);
           }
        }
    }
}
