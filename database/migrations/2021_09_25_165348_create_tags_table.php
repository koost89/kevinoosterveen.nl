<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class
CreateTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('taggables', function (Blueprint $table) {
            $table->id();

            $table->foreignId('tag_id')
                ->references('id')
                ->on('tags')
                ->cascadeOnDelete();

            $table->morphs('taggable');
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
        Schema::dropIfExists('taggables');
        Schema::dropIfExists('tags');
    }
}
