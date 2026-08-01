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
        Schema::table('trains', function (Blueprint $table) {

            $table->dropColumn(['departure_time', 'departure_day', 'arrival_time', 'arrival_day']);

            $table->dateTime('departure_date')->after('arrival_station');
            $table->dateTime('arrival_date')->after('departure_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('trains', function (Blueprint $table) {
        
            $table->time('departure_time', precision: 0)->after('arrival_station');
            $table->date('departure_day')->after('departure_time');
            $table->time('arrival_time', precision: 0)->after('departure_day');
            $table->date('arrival_day')->after('arrival_time');
            
            $table->dropColumn('departure_date');
            $table->dropColumn('arrival_date');
        
        });
    }
};
