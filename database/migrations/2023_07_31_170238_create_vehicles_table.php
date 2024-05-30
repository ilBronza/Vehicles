<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(config('vehicles.models.type.table'), function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('name');

            $table->string('producer')->nullable();

            $table->unsignedSmallInteger('passengers')->nullable();

            $table->decimal('km_liter_city')->commenct('km per liter city')->nullable();
            $table->decimal('km_liter_extra')->commenct('km per liter extracity')->nullable();
            $table->decimal('km_liter_highway')->commenct('km per liter highway')->nullable();

            $table->decimal('cost_per_km')->nullable();

            $table->string('fuels')->nullable();

            $table->string('vehicle_type')->nullable();

            $table->decimal('external_length')->commenct('millimeters')->nullable();
            $table->decimal('external_width')->commenct('millimeters')->nullable();
            $table->decimal('external_height')->commenct('millimeters')->nullable();

            $table->decimal('internal_length')->commenct('millimeters')->nullable();
            $table->decimal('internal_width')->commenct('millimeters')->nullable();
            $table->decimal('internal_height')->commenct('millimeters')->nullable();
            $table->decimal('internal_volume_mq')->nullable();


            $table->decimal('mass_empty')->nullable();
            $table->decimal('mass_max_loading')->nullable();

            $table->string('license_needed')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create(config('vehicles.models.vehicle.table'), function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->string('type_id')->nullable();
            $table->foreign('type_id')->references('id')->on(config('vehicles.models.type.table'));

            $table->string('plate')->nullable();
            $table->string('name')->nullable();

            $table->text('description')->nullable();
            $table->decimal('cost_per_km')->commenct('EURO per km')->nullable();

            $table->timestamp('registered_at')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create(config('vehicles.models.kmreading.table'), function (Blueprint $table) {
            $table->uuid('id')->primary();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('vehicle_id')->nullable();
            $table->foreign('vehicle_id')->references('id')->on(config('vehicles.models.vehicle.table'));

            $table->decimal('km', 10, 1);
            $table->timestamp('registered_at')->nullable();

            $table->softDeletes();
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
        Schema::dropIfExists(config('vehicles.models.kmreading.table'));
        Schema::dropIfExists(config('vehicles.models.vehicle.table'));
        Schema::dropIfExists(config('vehicles.models.type.table'));
    }
}
