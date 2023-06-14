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
        Schema::table('users', function (Blueprint $table) {
            $table->string('img')->after('email')->nullable();
            $table->string('gender')->after('img');
            $table->datetime('birthday')->after('gender')->nullable();
            $table->string('description')->after('birthday')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('img');
            $table->dropColumn('gender');
            $table->dropColumn('birthday');
            $table->dropColumn('description');
        });
    }
};
