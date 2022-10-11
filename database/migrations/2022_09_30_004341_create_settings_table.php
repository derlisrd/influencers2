<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("user_id");
            $table->string("name");
            $table->string("doc");
            $table->string("tel")->nullable();
            $table->float("minimal_payment")->nullable();
            $table->string("pix")->nullable();
            $table->float("raveshare")->nullable();
            $table->text("image")->nullable();
            $table->float('raveshare_join')->nullable();
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
        Schema::dropIfExists('settings');
    }
}
