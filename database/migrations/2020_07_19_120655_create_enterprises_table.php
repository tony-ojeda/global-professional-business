<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnterprisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enterprises', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained();
            $table->foreignId('category_id')->nullable()->constrained();
            $table->string('name', 100)->nullable();
            $table->string('website', 255)->nullable();
            $table->string('phone', 15)->nullable();
            $table->string('email', 255)->nullable();
            $table->longText('details')->nullable();
            $table->longText('schedule')->nullable();
            $table->string('portrait_image')->nullable();
            $table->longText('address')->nullable();
            $table->longText('address_object')->nullable();
            $table->string('latitude', 50)->nullable();
            $table->string('longitude', 50)->nullable();
            // $table->enum('status', ['previous_payment', 'already_pay', 'without_payment'])->nullable()->default(['foo', 'bar']);
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
        Schema::dropIfExists('enterprises');
    }
}
