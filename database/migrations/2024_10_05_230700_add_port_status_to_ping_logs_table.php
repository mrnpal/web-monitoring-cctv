<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPortStatusToPingLogsTable extends Migration
{
    public function up()
    {
        Schema::table('ping_logs', function (Blueprint $table) {
            $table->string('port_status')->nullable(); 
        });
    }

    public function down()
    {
        Schema::table('ping_logs', function (Blueprint $table) {
            $table->dropColumn('port_status');
        });
    }
}
