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
        if (!Schema::hasTable('products')) {
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->string('name', 60);
                $table->string('sku', 20);
                $table->longText('description');
                $table->longText('features');
                $table->integer('price');
                $table->integer('discounted_price')->nullable();
                $table->foreignId('parent_category_id')->nullable()->constrained('parent_categories');
                $table->json('color')->nullable();
                $table->foreignId('child_category_id')->constrained('child_categories');
                $table->integer('product_length')->nullable();
                $table->integer('product_weight')->nullable();
                $table->integer('product_height')->nullable();
                $table->integer('product_width')->nullable();
                $table->integer('availability')->default(1);
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
        Schema::dropIfExists('products');
    }
};
