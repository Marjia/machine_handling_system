<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('first_name',25)->nullable();
            $table->string('last_name',25)->nullable();
            $table->string('company_name',40)->nullable();
            $table->string('bank_account_type',40)->nullable();
            $table->string('web_site',40)->nullable();
            $table->string('phone_number',14)->nullable();
            $table->string('address')->nullable();
            $table->string('tax_reg_no',30)->nullable();
            $table->string('is_active',3)->default('NO');
            $table->string('is_admin',3)->default('NO');
            $table->string('is_deleted',3)->default('NO');
            $table->string('is_tagged',3)->default('NO');
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('modified_by')->nullable()->constrained('users');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
