<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatesProfileUserPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()

    {   
        // used to connect the users to the profile by the help of the pivot table

        Schema::create('profile_user', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('profile_id');
            $table->unsignedBiginteger('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profile_user');
    }
}
