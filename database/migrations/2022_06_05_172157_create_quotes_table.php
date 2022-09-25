<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('product_id');
            $table->string('name',255);
            $table->string('email',255);
            $table->string('phone',255)->nullable();
            $table->integer('quantity');
            $table->string('line1',255)->nullable();
            $table->string('line2',255)->nullable();
            $table->string('line3',255)->nullable();
            $table->string('position_type',255)->nullable();
            $table->text('logos')->nullable();
            $table->text('supplier')->nullable();
            $table->string('business_name',255)->nullable();
            $table->text('other_details ')->nullable();
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
        Schema::dropIfExists('quotes');
    }
}
