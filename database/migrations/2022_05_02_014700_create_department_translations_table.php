<?php
/**
 *  database/migrations/2022_05_02_014700_create_department_translations_table.php
 *
 * Date-Time: 02.05.22
 * Time: 05:48
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
        Schema::create('department_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('department_id')->unsigned();
            $table->string('locale')->index();

            $table->string('title')->nullable();
            $table->string('working')->nullable();

            $table->unique(['department_id','locale']);
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('department_translations');
    }
};
