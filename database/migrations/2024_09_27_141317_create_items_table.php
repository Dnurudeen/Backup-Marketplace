<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            // $table->id();
            // $table->string('name');
            // $table->text('description');
            // $table->decimal('price', 15, 2);
            // $table->unsignedBigInteger('category_id');
            // //$table->foreignId('category_id')->constrained()->onDelete('cascade');
            // $table->enum('condition', ['new', 'foreign_used', 'nigerian_used']);
            // $table->unsignedBigInteger('seller_id');
            // //$table->foreignId('seller_id')->constrained('users')->onDelete('cascade');
            // $table->timestamps();

            // // Foreign keys
            // $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            // $table->foreign('seller_id')->references('id')->on('users')->onDelete('cascade');

            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('user_id');
            $table->string('location');
            $table->json('images');
            $table->string('youtube_link')->nullable();
            $table->string('name');
            $table->string('item_type');
            $table->string('model');
            $table->string('manufaction_year');
            $table->string('condition');
            $table->boolean('exchange_possible');
            $table->text('description');
            $table->string('price');
            $table->boolean('negotiable');
            $table->timestamps();

            // Foreign keys
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
