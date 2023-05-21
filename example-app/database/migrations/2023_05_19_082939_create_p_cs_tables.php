<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePCsTables extends Migration
{
    public function up()
    {
        Schema::create('p_cs', function (Blueprint $table) {
            // this will create an id, a "published" column, and soft delete and timestamps columns
            createDefaultTableFields($table);
            
            $table->integer('position')->unsigned()->nullable();
            
            // add those 2 columns to enable publication timeframe fields (you can use publish_start_date only if you don't need to provide the ability to specify an end date)
            // $table->timestamp('publish_start_date')->nullable();
            // $table->timestamp('publish_end_date')->nullable();
        });

        Schema::create('p_c_translations', function (Blueprint $table) {
            createDefaultTranslationsTableFields($table, 'p_c');
            $table->string('title', 200)->nullable();
            $table->text('description')->nullable();
        });

        Schema::create('p_c_slugs', function (Blueprint $table) {
            createDefaultSlugsTableFields($table, 'p_c');
        });

        Schema::create('p_c_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'p_c');
        });
    }

    public function down()
    {
        Schema::dropIfExists('p_c_revisions');
        Schema::dropIfExists('p_c_translations');
        Schema::dropIfExists('p_c_slugs');
        Schema::dropIfExists('p_cs');
    }
}
