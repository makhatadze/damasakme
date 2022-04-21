<?php
/**
 *  database/migrations/2022_04_21_111748_create_city_area_translations_table.php
 *
 * Date-Time: 21.04.22
 * Time: 15:21
 * @author Vito Makhatadze <vitomakhatadze@gmail.com>
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('city_area_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('city_area_id')->unsigned();
            $table->string('locale')->index();

            $table->string('title')->nullable();

            $table->unique(['city_area_id', 'locale']);
            $table->foreign('city_area_id')
                ->references('id')
                ->on('city_areas')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('city_area_translations');
    }
};
