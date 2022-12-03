<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTotalProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('total_projects', function (Blueprint $table) {
            $table->id();
            $table->string('total_project_id')->nullable();
            $table->text('title')->nullable();
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->string('url')->nullable();
            $table->string('github')->nullable();
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
        Schema::dropIfExists('total_projects');
    }
}
