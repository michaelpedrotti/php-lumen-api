<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void  {
        
        Schema::create('profile', function (Blueprint $table) {
           
            $table->id();
            $table->string('name', 255)->notNullable();
            
//            $this->timestamp('createdAt', $precision)->nullable();
//            $this->timestamp('updatedAt', $precision)->nullable();
        });
        
        app(\Database\Seeders\ProfileSeeder::class)->run();
    }

    public function down(): void {
    
        Schema::drop('profile');
    }
};
