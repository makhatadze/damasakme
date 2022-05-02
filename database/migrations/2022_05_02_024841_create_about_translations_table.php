<?php
/**
 *  database/migrations/2022_05_02_024841_create_about_translations_table.php
 *
 * Date-Time: 02.05.22
 * Time: 06:52
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
        Schema::create('about_translations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('about_id')->unsigned();
            $table->string('locale')->index();

            $table->text('content_1')->nullable();
            $table->text('content_2')->nullable();

            $table->unique(['about_id','locale']);
            $table->foreign('about_id')->references('id')->on('abouts')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about_translations');
    }
};
