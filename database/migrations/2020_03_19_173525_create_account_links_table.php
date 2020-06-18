6<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('account_links', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('rd_acc_no')->unique();
            $table->integer('rupees');
            $table->date('dop');
            $table->string('nominee')->nullable();
            $table->date('dom');
            $table->string('as_card_no');
            $table->string('name');
            $table->string('address');
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
        Schema::dropIfExists('account_links');
    }
}
