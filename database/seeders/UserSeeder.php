<?php namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder {
    
    public function run(): void {
        
        $now = date();
        
        DB::table('user')->insert([
            
            [
                "id" => 1,
                "name"  => "Administrator",
                "email"  => "admin@xyz.io",
                "password"  => Hash::make('admin'),
                "profile_id"  => 1,
                "createdAt"  => $now,
                "updatedAt"  => $now
            ],
            [
                "id" => 2,
                "name"  => "Reader",
                "email"  => "reader@xyz.io",
                "password"  => Hash::make('reader'),
                "profile_id"  => 2,
                "createdAt"  => $now,
                "updatedAt"  => $now
            ]
            
        ]);
    } 
}