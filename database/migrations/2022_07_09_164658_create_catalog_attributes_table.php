<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogAttributesTable extends Migration
{
    public function up()
    {
        Schema::create('catalog_attribute_units', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        $units = ['см', 'м', 'г', 'кг'];

        foreach ($units as $unit) {
            \App\Models\CatalogUnits::create([
                'name' => $unit,
            ]);
        }

        Schema::create('catalog_attributes', function (Blueprint $table) {
            $table->id();
            $table->smallInteger('type');
            $table->integer('value');
            $table->unsignedBigInteger('catalog_id');
            $table->unsignedBigInteger('attribute_units_id');
            $table->timestamps();

            $table->foreign('catalog_id')->references('id')->on('catalogs')->onDelete('cascade');
            $table->foreign('attribute_units_id')->references('id')->on('catalog_attribute_units');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catalog_attribute_units');
        Schema::dropIfExists('catalog_attributes');
    }
}
