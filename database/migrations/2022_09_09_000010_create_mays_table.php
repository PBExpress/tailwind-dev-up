<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaysTable extends Migration
{
    public function up()
    {
        Schema::create('mays', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('month')->nullable();
            $table->string('description')->nullable();
            $table->integer('amount')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
