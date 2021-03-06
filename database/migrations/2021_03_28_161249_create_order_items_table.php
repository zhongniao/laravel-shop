<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('product_sku_id')->constrained()->onDelete('cascade');
            $table->unsignedInteger('amount');
            $table->decimal('price', 10, 2, true);
            $table->unsignedInteger('rating')->nullable();
            $table->text('review')->nullable();
            $table->timestamp('reviewed_at')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
