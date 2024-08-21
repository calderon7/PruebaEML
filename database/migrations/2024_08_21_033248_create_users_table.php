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
            $table->integer('num_document')->unique();
            $table->string('user_name', 30)->unique();
            $table->string('first_name', 30);
            $table->string('second_name', 30)->nullable();
            $table->string('first_lastname', 30);
            $table->string('second_lastname', 30);
            $table->foreignId('genere')->constrained('genere')->onDelete('cascade');
            $table->string('email', 60)->unique();
            $table->string('phone', 12);
            $table->foreignId('status')->constrained('status')->onDelete('cascade');
            $table->integer('city');
            $table->integer('state');
            $table->dateTime('created_user');
            $table->timestamp('update_user');
            $table->date('date_birth');
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
