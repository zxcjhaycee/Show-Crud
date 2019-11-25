<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShowAudiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('show_audiences', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('show_id')->index();
            $table->foreign('show_id')->references('id')->on('shows')->onDelete('cascade');
            $table->unsignedBigInteger('audience_id')->index();
            $table->foreign('audience_id')->references('id')->on('audiences')->onDelete('cascade');
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
        Schema::dropIfExists('show_audiences');
    }
}
