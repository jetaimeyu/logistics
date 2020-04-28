<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('company_name')->unique()->comment('企业名称');
            $table->integer('user_id')->comment('用户ID');
            $table->string('concat')->comment('联系人');
            $table->string('phone')->comment('手机');
            $table->string('tel')->comment('座机');
            $table->string('company_img')->comment('企业图片');
            $table->string('province');
            $table->string('city');
            $table->string('district');
            $table->string('street');
            $table->integer('level')->default(0) ->comment('等级0未审核1已审核2待定');
            $table->integer('views')->comment('浏览量');
            $table->string('latitude')->comment('纬度');
            $table->string('longitude')->comment('经度');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
