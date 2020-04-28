<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogisticsLinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('logistics_lines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('start_province');
            $table->string('start_city');
            $table->string('start_district');
            $table->string('start_contact');
            $table->string('start_phone');
            $table->string('end_province');
            $table->string('end_city');
            $table->string('end_district');
            $table->string('end_contact');
            $table->string('end_phone');
            $table->string('description')->comment('线路描述');
            $table->smallInteger('state')->default(0)->comment('审核状态0未审核 1已审核 2审核失败');
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
        Schema::dropIfExists('logistics_lines');
    }
}
