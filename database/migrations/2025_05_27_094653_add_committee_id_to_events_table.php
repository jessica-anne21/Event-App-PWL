<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('events', function (Blueprint $table) {
        $table->foreignId('committee_id')->constrained('users')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('events', function (Blueprint $table) {
        $table->dropForeign(['committee_id']);
        $table->dropColumn('committee_id');
    });
}

};
