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
        Schema::create('diseases', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string("disease_name");
            $table->string('image')->nullable();
            $table->longText('overview');
            $table->longText('learn_general');
            $table->longText("symptom");
            $table->longText("reason");
            $table->longText("risk");
            $table->longText("diagnose");
            $table->longText('prevent');
//            $table->bigInteger("season_id")->nullable();
//            $table->bigInteger("object_id")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('diseases');
    }
};
