<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('informations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 512);
            $table->string('title', 512);
            $table->string('description', 512)->nullable();
            $table->string('keywords', 512)->nullable();
            $table->text('preview');
            $table->text('text');
            $table->string('alias', 255)->unique();
            $table->enum('is_published',[0,1])->default(1);
            $table->date('published_at')->default(now());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('informations');
    }
}
