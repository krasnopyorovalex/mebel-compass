<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnsNameBtnAndNameFormToReadySolutionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ready_solutions', function (Blueprint $table) {
            $table->string('name_btn')->nullable();
            $table->string('name_form')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ready_solutions', function (Blueprint $table) {
            $table->dropColumn(['name_btn', 'name_form']);
        });
    }
}
