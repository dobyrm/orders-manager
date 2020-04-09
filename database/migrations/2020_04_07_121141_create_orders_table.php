<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * Created indexes on all fields because the user has the ability to search data on all fields
         */

        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id')->index('client_id');
            $table->integer('product_id')->index('product_id');
            $table->decimal('total', 15, 2)->index('total');
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
        Schema::dropIfExists('orders');
    }
}
