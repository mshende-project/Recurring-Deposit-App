<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RdUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('rd_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rd_acc_no')->unique();
            $table->string('name');
            $table->string('address');
            $table->date('dop');
            $table->integer('rupees');
            $table->string('nominee')->nullable();
            $table->string('as_card_no');
            $table->date('dom');
            $table->string('remark_kyc')->nullable();
            $table->string('pan_no')->nullable();
            $table->string('election_card_no')->nullable();
            $table->string('adhar_card_no')->nullable();
            $table->string('mobile_no')->nullable();
            $table->date('dob')->nullable();
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
        //
        Schema::dropIfExists('rd_users');
    }
}
