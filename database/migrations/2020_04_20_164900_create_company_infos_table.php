<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_infos', function (Blueprint $table) {
            $table->id();
            $table->softDeletes();
            $table->timestamps();
            $table->string('comp_name')->comment('企业名称');
            $table->string('contact')->comment('联系人');
            $table->string('phone')->comment('联系人手机号');
            $table->string('tel')->comment('座机');
            $table->string('address')->comment('省市区信息');
            $table->string('detail_address')->comment('详细地址');
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
        Schema::dropIfExists('company_infos');
    }
}
