<?php namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PermissionSeeder {
    
    public function run(): void {
        
        $resources = ['user', 'profile', 'permission'];
        $rows = [];
        
        foreach($resources as $resource){
            
            $rows[] = [
                'profile_id' => 1, 
                'resource' => $resource, 
                'actions' => ['C', 'R', 'U', 'D']
            ];
        }
        
        foreach($resources as $resource){
            
            $rows[] = [
                'profile_id' => 2, 
                'resource' => $resource, 
                'actions' => ['R']
            ];
        }    
        
        DB::table('permission')->insert($rows);
    } 
}