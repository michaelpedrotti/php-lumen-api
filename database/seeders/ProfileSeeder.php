<?php namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileSeeder {
    
    public function run(): void {
        
        DB::table('profile')->insert([
            
            [
                "id" => 1,
                "name"  => "Administrator"
            ],
            [
                "id" => 2,
                "name"  => "Reader"
            ]   
        ]);
    } 
}