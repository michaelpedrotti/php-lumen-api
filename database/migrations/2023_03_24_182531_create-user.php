<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

    public function up(): void  {
        
        Schema::create('user', function (Blueprint $table) {

            $table->id();
            $table->string('name', 255)->notNullable();
            $table->string('email', 255)->unique()->notNullable();
            $table->string('password', 100)->notNullable();
            $table->integer('profile_id');
            
            $table->foreign('profile_id', 'pk_641decb8851b4')
                ->references('id')
                    ->on('profile')
                        ->onDelete('cascade');
            
            $this->timestamp('createdAt')->nullable();
            $this->timestamp('updatedAt')->nullable();
            
        });
        
        app(\Database\Seeders\UserSeeder::class)->run();
    }

    public function down(): void {
        
        Schema::drop('user');
    }
};
