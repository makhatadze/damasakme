<?php
/**
 *  database/migrations/2022_04_21_114958_create_degree_translations_table.php
 *
 * Date-Time: 21.04.22
 * Time: 16:06
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
        Schema::create('degree_translations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('degree_id')->unsigned();
            $table->string('locale')->index();

            $table->string('title')->nullable();

            $table->unique(['degree_id', 'locale']);
            $table->foreign('degree_id')
                ->references('id')
                ->on('degrees')
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
        Schema::dropIfExists('degree_translations');
    }
};
