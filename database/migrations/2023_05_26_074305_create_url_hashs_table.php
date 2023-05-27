<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUrlHashsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('url_hashes', function (Blueprint $table) {
            $table->id();
            $table->string('original_url');
            $table->string('hashed_url');
            $table->unsignedBigInteger('click_count')->default(0);
            $table->integer('click_limit')->default(1);
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
        Schema::dropIfExists('url_hashs');
    }
}
