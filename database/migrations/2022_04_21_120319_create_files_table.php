<?php
/**
 *  database/migrations/2022_04_21_120319_create_files_table.php
 *
 * Date-Time: 21.04.22
 * Time: 16:15
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
        Schema::create('files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('src')->nullable();
            $table->string('file_type')->nullable();
            $table->string('type')->nullable();
            $table->unsignedBigInteger('fileable_id')->nullable();
            $table->string('fileable_type')->nullable();
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
        Schema::dropIfExists('files');
    }
};
