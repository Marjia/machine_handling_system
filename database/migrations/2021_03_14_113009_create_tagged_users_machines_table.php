<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaggedUsersMachinesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tagged_users_machines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained('users');
            $table->foreignId('machine_id')->nullable()->constrained('machines');
            $table->double('hourly_session_charge',5,2);
            $table->string('currency')->nullable();
            $table->string('is_active',3)->default('NO');
            $table->dateTime('tagged_at')->nullable();
            $table->dateTime('detagged_at')->nullable();
            $table->foreignId('tagged_by')->nullable()->constrained('users');
            $table->foreignId('detagged_by')->nullable()->constrained('users');
            $table->timestamps();
            // $table->unique(['user_id', 'machine_id']);


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tagged_users_machines');
    }
}
