<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToTableBookingLists extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('booking_lists', function (Blueprint $table) {
            $table->date('end_date')->after('start_date');
            $table->integer('duration')->after('end_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('booking_lists', function (Blueprint $table) {
            $table->dropColumn('end_date');
            $table->dropColumn('duration');
        });
    }
}
