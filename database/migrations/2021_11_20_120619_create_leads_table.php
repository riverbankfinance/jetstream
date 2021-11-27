<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->tinyInteger('status')->default(0);
            $table->string('fullName');
            $table->string('birthday')->nullable();
            $table->string('fullNameCoborrower')->nullable();
            $table->string('birthdayCoborrower')->nullable();
            $table->string('emailCoborrower')->nullable();
            $table->string('phoneCoborrower')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zip')->nullable();
            $table->string('url')->nullable();
            $table->string('ip')->nullable();
            $table->string('agent')->nullable();
            $table->string('referringUrl')->nullable();
            $table->string('noText')->nullable();
            $table->string('rating')->nullable();
            $table->string('floifyLoan')->nullable();
            $table->string('credit')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('loan_type')->nullable();
            $table->string('goal')->nullable();
            $table->string('closed')->nullable();
            $table->string('message')->nullable();
            //$table->morphs('commentable');
            $table->timestamps();
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onDelete('set null');
                    //->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leads');
    }
}
