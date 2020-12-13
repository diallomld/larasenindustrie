<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->text("content");
            $table->foreignId("user_id")->constrained();
            $table->foreignId("category_id")->constrained();
            $table->foreignId("region_id")->constrained();
            $table->unsignedBigInteger("prix");
            $table->string("adresse");
            $table->boolean("is_active")->default(false);
            $table->string("image")->nullable();
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
        Schema::dropIfExists('ads');
    }
}
