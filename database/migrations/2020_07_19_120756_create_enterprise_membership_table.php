<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnterpriseMembershipTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enterprise_membership', function (Blueprint $table) {
            $table->id();
            $table->foreignId('enterprise_id')->nullable()->constrained();
            $table->foreignId('membership_id')->nullable()->constrained();
            $table->longText('paypal_data')->nullable();
            $table->date('payment_date')->nullable();
            $table->date('due_date')->nullable();
            $table->boolean('is_active')->nullable()->default(false);
            $table->date('change_membership_at')->nullable();
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
        Schema::dropIfExists('enterprise_membership');
    }
}
