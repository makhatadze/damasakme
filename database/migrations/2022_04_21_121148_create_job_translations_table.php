<?php
/**
 *  database/migrations/2022_04_21_121148_create_job_translations_table.php
 *
 * Date-Time: 21.04.22
 * Time: 16:16
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */

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
        Schema::create('job_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('job_id')->unsigned();
            $table->string('locale')->index();

            $table->string('title')->nullable();

            $table->unique(['job_id','locale']);
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('job_translations');
    }
};
