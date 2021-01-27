<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Data extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data', function (Blueprint $table) {
            $table->id();
            $table->string('text_data');
            $table->string('ug_text_data');
            $table->string('author');
            $table->string('sender_name');            
            $table->foreignId('cat_id')->reference('id')->on('category');
            $table->foreignId('user_id')->reference('id')->on('users');
            $table->foreignId('lan_id')->reference('id')->on('languages');
            $table->boolean('is_approve');
            $table->boolean('is_blocked');
            $table->rememberToken();
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
        //
    }
}
