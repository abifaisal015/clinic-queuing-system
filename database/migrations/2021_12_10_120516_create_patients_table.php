<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('citizen');
            $table->char('nik')->unique()->nullable();
            $table->char('gender')->nullable();
            $table->string('phone_number')->nullable();
            $table->text('address')->nullable();
            $table->string('birthplace',255)->nullable();
            $table->date('birthdate')->nullable();
            $table->string('family_name')->nullable();
            $table->string('family_contact')->nullable();
            $table->enum('status', ['ACTIVE', 'INACTIVE'])->default('ACTIVE');
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
        Schema::dropIfExists('patients');
    }
}
