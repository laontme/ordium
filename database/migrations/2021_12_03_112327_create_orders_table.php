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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->text("title");
            $table->text("description");
            $table->foreignId("issuer_id")->nullable()->references("id")->on("users")->nullOnDelete()->cascadeOnUpdate();
            $table->foreignId("assigned_id")->nullable()->references("id")->on("users")->nullOnDelete()->cascadeOnUpdate();
            $table->boolean('completed')->default(false);
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
        Schema::dropIfExists('orders');
    }
}
