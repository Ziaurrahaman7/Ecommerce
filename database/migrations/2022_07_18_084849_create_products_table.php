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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('sku')->unique();
            $table->string('slug')->unique();
            $table->foreignId('category_id')->constrained('categories')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('price');
            $table->bigInteger('discount')->nullable();
            $table->longText('description')->nullable();
            $table->bigInteger('shiping_cost')->nullable();
            $table->longText('shiping_address')->nullable();
            $table->string('feather_image');
            $table->string('related_img')->nullable();
            $table->bigInteger('stock')->nullable();
            $table->tinyInteger('visibility')->default('1');
            $table->tinyInteger('is_promoted')->default('0');
            $table->dateTime('promote_start_date')->nullable();
            $table->dateTime('promote_end_date')->nullable();
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
        Schema::dropIfExists('products');
    }
};
