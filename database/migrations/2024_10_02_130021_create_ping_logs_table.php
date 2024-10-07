<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePingLogsTable extends Migration
{
    public function up()
    {
        Schema::create('ping_logs', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address');  // Kolom untuk IP address
            $table->integer('port')->nullable(); // Kolom untuk port, dapat null
            $table->string('status'); // Kolom untuk status ping
            $table->timestamps(); // Kolom untuk created_at dan updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('ping_logs');
    }
}
