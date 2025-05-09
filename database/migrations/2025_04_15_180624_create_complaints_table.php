<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();

            // Optional: Link to user table if complaint is from a logged-in user
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('set null');
        
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            
            $table->enum('user_type', ['user', 'room_owner', 'guest'])->default('guest'); // Guest if not logged in
            $table->string('category'); 
        
            $table->string('subject');
            $table->text('description');
        
            $table->string('attachment')->nullable();
        
            $table->enum('status', ['pending', 'in_progress', 'resolved'])->default('pending');
        
            $table->text('admin_response')->nullable();
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaints');
    }
};
