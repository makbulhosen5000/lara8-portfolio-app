<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkDocumentariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_documentaries', function (Blueprint $table) {
            $table->id();
            $table->string('total_work')->nullable();
            $table->string('total_project')->nullable();
            $table->string('total_experience')->nullable();
            $table->string('total_companies')->nullable();
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
        Schema::dropIfExists('work_documentaries');
    }
}
