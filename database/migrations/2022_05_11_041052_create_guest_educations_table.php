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
        Schema::create('guest_educations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('guest_id');
            $table->bigInteger('education_id')->nullable();
            $table->string('education_name')->nullable();
            $table->string('school')->nullable();
            $table->string('profession')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
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
        Schema::dropIfExists('guest_educations');
    }
};
