<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduct2Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product2', function (Blueprint $table) {
            $table->id();
            $table->string('SkuCode',255)->nullable();
            $table->string('ProductColourCode',255)->nullable();
            $table->string('ProductGroup',255)->nullable();
            $table->string('Brand',255)->nullable();
            $table->string('PrimaryCategory',255)->nullable();
            $table->string('ProductName',255)->nullable();
            $table->text('Specification')->nullable();
            $table->text('RetailDescription')->nullable();
            $table->text('BulletText1')->nullable();
            $table->text('BulletText2')->nullable();
            $table->text('BulletText3')->nullable();
            $table->string('JacketLength',255)->nullable();
            $table->string('LegLength',255)->nullable();
            $table->text('WashingInstructions')->nullable();
            $table->string('Fabric',255)->nullable();
            $table->string('Weight',255)->nullable();
            $table->string('BagCapacity',255)->nullable();
            $table->string('PrintArea',255)->nullable();
            $table->string('Embroidery',255)->nullable();
            $table->string('Dimensions',255)->nullable();
            $table->string('SizeRange',255)->nullable();
            $table->text('SizeDescription')->nullable();
            $table->text('SizeInfo')->nullable();
            $table->string('SupplierCode',255)->nullable();
            $table->string('DirectoryPageNumber',255)->nullable();
            $table->text('PrimaryImage')->nullable();
            $table->string('ColourCode',255)->nullable();
            $table->string('ColourName',255)->nullable();
            $table->string('PrimaryColour',255)->nullable();
            $table->text('ColourImage')->nullable();
            $table->string('Alpha',255)->nullable();
            $table->string('SizeCode',255)->nullable();
            $table->string('WebSize',255)->nullable();
            $table->integer('SingleQuantity')->nullable();
            $table->string('CartonQty',255)->nullable();
            $table->string('PackQty',255)->nullable();
            $table->string('VatCode',255)->nullable();
            $table->string('CartonPrice',255)->nullable();
            $table->string('PackPrice',255)->nullable();
            $table->string('SinglePrice',255)->nullable();
            $table->string('SkuStatus',255)->nullable();
            $table->string('WeightKG',255)->nullable();
            $table->string('CommodityCode',255)->nullable();
            $table->string('CountryOfOrigin',255)->nullable();
            $table->string('type',10)->default('ralawise');
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
        Schema::dropIfExists('product2');
    }
}
