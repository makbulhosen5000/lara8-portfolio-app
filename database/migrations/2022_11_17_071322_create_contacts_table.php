<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('intro')->nullable();
            $table->string('name')->nullable();
            $table->string('designation')->nullable();
            $table->string('resume')->nullable();
            $table->string('image')->nullable();
            $table->string('title')->nullable();
            $table->string('short_desc')->nullable();
            $table->text('long_desc')->nullable();
            $table->string('birthday')->nullable();
            $table->String('phone')->nullable();
            $table->String('email')->nullable();
            $table->string('address')->nullable();
            $table->String('github')->nullable();
            $table->String('linkedin')->nullable();
            $table->String('facebook')->nullable();
            $table->String('twitter')->nullable();
            $table->String('instagram')->nullable();
            $table->String('youtube')->nullable();
            $table->String('google')->nullable();
            $table->String('whatsapp')->nullable();
            $table->String('skype')->nullable();
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
