<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement("
            CREATE VIEW view_user AS
            SELECT us.id,us.first_name, us.second_name, 
            us.first_lastname, us.second_lastname, us.email, us.phone, s.status, 
            us.city, us.state, us.created_user, us.update_user
            FROM users us left join status s on us.status = s.id order by us.first_name asc;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement("DROP VIEW IF EXISTS view_user");
    }
};
