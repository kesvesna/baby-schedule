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
        Schema::create('walks', function (Blueprint $table) {
            $table->id();
            $table->dateTime('walk_start_at')->nullable()->default(null);
            $table->dateTime('walk_finish_at')->nullable()->default(null);
            $table->time('walk_time')->nullable()->default(null);
            $table->foreignId('user_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('walks', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::dropIfExists('walks');
    }
};
