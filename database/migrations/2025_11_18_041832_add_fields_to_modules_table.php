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
        Schema::table('modules', function (Blueprint $table) {
            $table->string('title');        // nama materi
            $table->text('description')->nullable();
            $table->integer('order')->default(0); // urutan materi
        });
    }

    public function down()
    {
        Schema::table('modules', function (Blueprint $table) {
            $table->dropColumn(['title', 'description', 'order']);
        });
    }
};
