<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 30);
            $table->string('second_name', 30)->nullable();
            $table->string('first_lastname', 30);
            $table->string('second_lastname', 30);
            $table->string('email', 60)->unique();
            $table->string('phone', 12);
            $table->foreignId('status')->constrained('status')->onDelete('cascade');
            $table->string('city');
            $table->string('state');
            $table->dateTime('created_user');
            $table->timestamp('update_user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
