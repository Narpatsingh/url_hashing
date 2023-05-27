<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExpiredAtToUrlHashsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('url_hashes', function (Blueprint $table) {
            //
            $table->timestamp('expired_at')->nullable()->after('click_limit');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('url_hashs', function (Blueprint $table) {
            //
            $table->dropColumn('expired_at');
        });
    }
}
