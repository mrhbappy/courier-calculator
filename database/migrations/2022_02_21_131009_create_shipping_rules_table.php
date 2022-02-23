<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_rules', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            // $table->double('regular_rate');
            // $table->double('express_rate');
            // $table->double('isd_rate');
            // $table->double('osd_rate');
            $table->string('delivery_type');
            $table->string('delivery_route');
            $table->string('weight_range');
            $table->string('expiry_date');
            $table->double('shipping_rate');
            $table->integer('created_by');
            $table->tinyInteger('is_active');
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
        Schema::dropIfExists('shipping_rules');
    }
}
