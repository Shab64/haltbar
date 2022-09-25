<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUneekTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uneek', function (Blueprint $table) {
            $table->id();
            $table->string('Company_Name',200)->nullable();
            $table->string('Category',200)->nullable();
            $table->string('Product_Code',200)->nullable();
            $table->string('Product_Name',200)->nullable();
            $table->text('Full_Description')->nullable();
            $table->string('Short_Code',200)->nullable();
            $table->bigInteger('Commodity_Code')->nullable();
            $table->bigInteger('EAN_Bar_Code')->nullable();
            $table->integer('Wash_Degrees')->nullable();
            $table->string('Gender',200)->nullable();
            $table->integer('GSM')->nullable();
            $table->string('Composition',200)->nullable();
            $table->string('Specifications',200)->nullable();
            $table->string('Colour_Code',200)->nullable();
            $table->string('Colour',200)->nullable();
            $table->string('Pantone',200)->nullable();
            $table->string('Hex',200)->nullable();
            $table->string('Size',200)->nullable();
            $table->float('Price_Single')->nullable();
            $table->integer('Qty_Single')->nullable();
            $table->integer('SingleQuantity')->nullable();
            $table->float('Price_Pack')->nullable();
            $table->integer('Pack_Qty')->nullable();
            $table->float('Price_Caton')->nullable();
            $table->integer('Carton_Qty')->nullable();
            $table->float('Price_1K')->nullable();
            $table->integer('1K_Qty')->nullable();
            $table->float('MyPrice')->nullable();
            $table->string('Model_Large_Image',200)->nullable();
            $table->string('Model_Small_Image',200)->nullable();
            $table->string('Large_Colour_Image',200)->nullable();
            $table->string('Small_Colour_Image',200)->nullable();
            $table->string('Video_Link',200)->nullable();
            $table->string('Packaging',200)->nullable();
            $table->string('Country_of_Origin',200)->nullable();
            $table->float('Gross_Weight',200)->nullable();
            $table->float('Net_Weight',200)->nullable();
            $table->string('Tax_Code',200)->nullable();
            $table->date('date')->nullable();
            $table->string('type',10)->default('uneek');
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
        Schema::dropIfExists('uneek');
    }
}
