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
            $table->string('title', 50);
            $table->string('description',  100);
            $table->string('color1',  100)->default('white');
            $table->string('color2',  100)->default('white');
            $table->string('color3',  100)->default('white');
            $table->string('color4',  100)->default('white');
            $table->text('link')->nullable;
            $table->text('fblink')->nullable;
            $table->text('twlink')->nullable;
            $table->text('instalink')->nullable;
            $table->text('email')->nullable;
            $table->integer('fixheader')->default(1);

            $table->softDeletes();
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
