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
        Schema::create('activity_user_test_log', function (Blueprint $table) {
            $table->id();
            $table->string('model_id')->nullable();
            $table->string('url')->nullable();
            $table->string('time')->nullable();
            $table->string('creator')->nullable();
            $table->string('creator_id')->nullable();
            $table->string('action')->nullable();
            $table->string('key')->nullable();
            $table->string('old_value')->nullable();
            $table->string('new_value')->nullable();
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
        Schema::dropIfExists('activity_user_test_log');
    }
};
