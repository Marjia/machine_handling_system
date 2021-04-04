<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoices_no')->unique();
            $table->foreignId('user_sessions_id')->nullable()->constrained('user_sessions');
            $table->dateTime('from_date');
            $table->dateTime('to_date');
            $table->double('amount',5,2);
            $table->double('discount');
            $table->double('final_amount',5,2);
            $table->double('tax_amount');
            $table->string('is_paid',3)->default('NO');
            $table->double('total_payable_amount');
            $table->string('is_active',3)->default('NO');
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
        Schema::dropIfExists('invoices');
    }
}
