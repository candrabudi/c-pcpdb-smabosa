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
        Schema::create('student_mothers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('mother_name', 191);
            $table->string('place_of_birth', 191);
            $table->date('date_of_birth');
            $table->string('education', 191);
            $table->string('religion', 191);
            $table->string('profession', 191);
            $table->string('income', 20);
            $table->string('whatsapp_phone_number', 20);
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
        Schema::dropIfExists('student_mothers');
    }
};
