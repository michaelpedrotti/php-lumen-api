<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void  {
        
        Schema::create('permission', function (Blueprint $table) {
            $table->id();
            $table->integer('profile_id');
            $table->string('resource')->notNullable();
            $table->json('actions');
        });
        
        app(\Database\Seeders\PermissionSeeder::class)->run();
    }

    public function down(): void {
    
        Schema::drop('permission');
    }
};