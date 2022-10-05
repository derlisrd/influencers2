<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("user_id");
            $table->text('description');
            $table->float('amount')->nullable();
            $table->date('date_request')->useCurrent();
            $table->date('date_paid')->nullable();
            $table->boolean('status')->default(0); // 0 pending 1 done
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
        Schema::dropIfExists('payments');
    }
}
