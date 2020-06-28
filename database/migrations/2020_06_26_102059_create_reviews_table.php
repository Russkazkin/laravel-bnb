<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedTinyInteger('rating');
            $table->text('content');
            $table->foreignId('bookable_id')->constrained()->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('booking_id')->nullable()->constrained()->onDelete('restrict')->onUpdate('cascade');
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
        Schema::table('reviews', function (Blueprint $table){
            $table->dropForeign(['bookable_id']);
            $table->dropForeign(['booking_id']);
        });

        Schema::dropIfExists('reviews');
    }
}
