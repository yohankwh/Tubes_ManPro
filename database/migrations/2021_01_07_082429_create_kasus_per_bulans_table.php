<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKasusPerBulansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kasus_per_bulan', function (Blueprint $table) {
            $table->string('patient_id');
            $table->string('sex');
            $table->string('age');
            $table->string('country');
            $table->string('province');
            $table->string('city');
            $table->string('infection_case');
            $table->string('infected_by');
            $table->string('contact_number');
            $table->date('symptom_onset_date');
            $table->date('confirmed_date');
            $table->date('released_date');
            $table->date('deceased_date');
            $table->string('state');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kasus_per_bulan');
    }
}
