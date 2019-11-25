<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->renameColumn('name','username');
            $table->unsignedBigInteger('audience_id')->after('id');
            $table->foreign('audience_id')->references('id')->on('audiences')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->renameColumn('username', 'name');
            $table->dropForeign('users_audience_id_foreign');
            $table->dropColumn('audience_id');
        });
    }
}
