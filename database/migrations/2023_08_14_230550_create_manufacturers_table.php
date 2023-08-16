<?php

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
//        Schema::create('manufacturers', function (Blueprint $table) {
//            $table->id();
//            $table->string("name");
//            $table->unsignedInteger('sub_category_id');
//            $table->foreign('sub_category_id')
//                ->references('id')
//                ->on('sub_categories')
//                ->onDelete('cascade');
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('manufacturer');
        });
    }
};
