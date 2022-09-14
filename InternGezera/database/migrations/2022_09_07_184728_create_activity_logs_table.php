<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            $table->unsignedBigInteger('recordable_id');
            $table->string('recordable_type');

            $table->unsignedBigInteger('admin_id')->nullable();
            $table->enum('action',['add','edit','delete'])->default('add');
            $table->jsonb('properties')->nullable();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('CASCADE');
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
        Schema::dropIfExists('client_logs');
    }
};
