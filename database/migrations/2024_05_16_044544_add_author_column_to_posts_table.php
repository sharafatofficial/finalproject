<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('add_posts', function (Blueprint $table) {
            $table->string('author_id')->nullable()->after('description');
        });
    }

    public function down()
    {
        Schema::table('add_posts', function (Blueprint $table) {
            $table->dropColumn('author_id');
        });
    }
};
