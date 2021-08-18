<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanRefsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_refs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('day');
            $table->integer('month');
            $table->longText('link');
            $table->json('content');
            $table->unsignedBigInteger('plan_id');
            $table->foreign('plan_id')->references('id')->on('plans')->onDelete('cascade');
            $table->unsignedBigInteger('version_id');
            $table->foreign('version_id')->references('id')->on('versions')->onDelete('cascade');
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
        Schema::dropIfExists('plan_refs');
    }
}
