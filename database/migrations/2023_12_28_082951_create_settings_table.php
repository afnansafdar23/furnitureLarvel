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
    { if(!Schema::hasTable("setting")){
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('application_name', 50);
            $table->string('short_description',  100);
            $table->string('color_one')->default('white');
            $table->string('color_two')->default('white');
            $table->string('color_three')->default('white');
            $table->string('color_four')->default('white');
            $table->string('facebook_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('gsc')->nullable();
            $table->string('site_index')->default('off');
            $table->string('email')->nullable();
            $table->timestamps();
        });
    }
}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
};
