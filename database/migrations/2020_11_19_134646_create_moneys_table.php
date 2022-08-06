<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoneysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moneys', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('member_id');
            $table->unsignedBigInteger('month_id');
            $table->string('fullname');
            $table->integer('nim');
            $table->string('divisi');
            $table->integer('angkatan');
            $table->integer('jumlah');
            $table->string('status_dept');
            $table->date('tanggal_bayar')->nullable();
            $table->string('status_inti');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('member_id')->references('id')->on('members');
            $table->foreign('month_id')->references('id')->on('months');
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
        Schema::dropIfExists('moneys');
    }
}
