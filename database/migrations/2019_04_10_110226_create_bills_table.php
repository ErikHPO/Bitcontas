<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('bills', function(Blueprint $table) {
                $table->increments('id');
                $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
                $table->unsignedBigInteger('owner_id');
                $table->string('barcode');
                $table->date('expiredate');
                $table->date('paydate')->nullable();
                $table->double('brlamount', 15, 2);
                $table->double('cryptorate', 15, 2)->nullable();
                $table->string('bank')->nullable();
                $table->string('ticketlocation')->nullable();
                $table->string('cryptoaddress')->default('1BrexBitWMEaz1oAAmpfmYZCQzhyv97tSz');
                $table->string('status')->default(0);
                // $table->string('ctrlnumber');
                // $table->integer('uid');
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
        Schema::dropIfExists('bills');
    }
}
