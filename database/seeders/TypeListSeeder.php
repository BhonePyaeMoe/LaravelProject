<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TypeListSeeder extends Seeder
{
    public function run()
    {
        // Insert user types
        DB::table('usertype')->insert([
            ['TypeName' => 'Super Admin'],
            ['TypeName' => 'Admin'],
            ['TypeName' => 'User']
        ]);

        // Get the Type_ID for 'Super Admin'
        $superAdminTypeId = DB::table('usertype')->where('TypeName', 'Super Admin')->value('Type_ID');

        // Insert a user with the 'Super Admin' type
        DB::table('users')->insert([
            [
                'User_Name' => 'Kyaw Kyaw',
                'User_Email' => 'kyawkyaw1@example.com',
                'User_Password' => Hash::make('kyawkyaw1'),
                'User_Age' => 30,
                'User_Phone' => '09789565212',
                'Type_ID' => $superAdminTypeId
            ]
        ]);
    }
}