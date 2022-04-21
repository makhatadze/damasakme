<?php
/**
 *  database/migrations/2022_04_21_112955_create_city_area_districts_table.php
 *
 * Date-Time: 21.04.22
 * Time: 15:31
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
        Schema::create('city_area_districts', function (Blueprint $table) {
            $table->id();
            $table->integer('city_area_id')->unsigned()->index();
            $table->foreign('id')->references('id')->on('city_areas')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('city_area_districts');
    }
};
