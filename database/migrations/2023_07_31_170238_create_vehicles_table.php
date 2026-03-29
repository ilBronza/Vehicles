<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up() : void
	{
		$typesTable = config('vehicles.models.vehicleType.table');
		$modelsTable = config('vehicles.models.vehicleModel.table');
		$vehiclesTable = config('vehicles.models.vehicle.table');
		$kmreadingTable = config('vehicles.models.kmreading.table');

		Schema::create($typesTable, function (Blueprint $table)
		{
			$table->string('id')->primary();
			$table->string('name');
			$table->string('producer')->nullable();
			$table->unsignedSmallInteger('passengers')->nullable();
			$table->decimal('km_liter_city')->nullable()->comment('km per liter city');
			$table->decimal('km_liter_extra')->nullable()->comment('km per liter extracity');
			$table->decimal('km_liter_highway')->nullable()->comment('km per liter highway');
			$table->decimal('cost_per_km')->nullable();
			$table->decimal('cost_per_movimentation')->nullable();
			$table->string('fuels')->nullable();
			$table->string('vehicle_type')->nullable();
			$table->decimal('external_length')->nullable()->comment('millimeters');
			$table->decimal('external_width')->nullable()->comment('millimeters');
			$table->decimal('external_height')->nullable()->comment('millimeters');
			$table->decimal('internal_length')->nullable()->comment('millimeters');
			$table->decimal('internal_width')->nullable()->comment('millimeters');
			$table->decimal('internal_height')->nullable()->comment('millimeters');
			$table->decimal('internal_volume_mq')->nullable();
			$table->decimal('mass_empty')->nullable();
			$table->decimal('mass_max_loading')->nullable();
			$table->string('license_needed')->nullable();
			$table->softDeletes();
			$table->timestamps();
		});

		Schema::create($modelsTable, function (Blueprint $table) use ($typesTable)
		{
			$table->string('id')->primary();
			$table->string('brand')->nullable();
			$table->string('name');
			$table->unsignedSmallInteger('passengers')->nullable();
			$table->decimal('km_liter_city')->nullable();
			$table->decimal('km_liter_extra')->nullable();
			$table->decimal('km_liter_highway')->nullable();
			$table->string('fuels')->nullable();
			$table->string('vehicle_type')->nullable();
			$table->foreign('vehicle_type')->references('id')->on($typesTable);
			$table->decimal('sizes_marching_external_length')->nullable();
			$table->decimal('sizes_marching_external_width')->nullable();
			$table->decimal('sizes_marching_external_height')->nullable();
			$table->decimal('sizes_marching_internal_length')->nullable();
			$table->decimal('sizes_marching_internal_width')->nullable();
			$table->decimal('sizes_marching_internal_height')->nullable();
			$table->decimal('sizes_functioning_external_length')->nullable();
			$table->decimal('sizes_functioning_external_width')->nullable();
			$table->decimal('sizes_functioning_external_height')->nullable();
			$table->decimal('sizes_functioning_internal_length')->nullable();
			$table->decimal('sizes_functioning_internal_width')->nullable();
			$table->decimal('sizes_functioning_internal_height')->nullable();
			$table->decimal('sizes_functioning_internal_volume_mq')->nullable();
			$table->decimal('mass_empty')->nullable();
			$table->decimal('mass_max_loading')->nullable();
			$table->string('license_needed')->nullable();
			$table->softDeletes();
			$table->timestamps();
		});

		Schema::create($vehiclesTable, function (Blueprint $table) use ($typesTable, $modelsTable)
		{
			$table->uuid('id')->primary();
			$table->string('slug', 12)->nullable();
			$table->string('vehicle_model_id')->nullable();
			$table->foreign('vehicle_model_id')->references('id')->on($modelsTable);
			$table->string('type_id')->nullable();
			$table->foreign('type_id')->references('id')->on($typesTable);
			$table->nullableUuidMorphs('owner');
			$table->string('plate')->nullable();
			$table->string('name')->nullable();
			$table->text('description')->nullable();
			$table->decimal('cost_per_km')->nullable()->comment('EURO per km');
			$table->decimal('cost_per_movimentation')->nullable();
			$table->timestamp('registered_at')->nullable();
			$table->unsignedInteger('initial_km')->nullable();
			$table->decimal('current_km', 10, 1)->nullable();
			$table->softDeletes();
			$table->timestamps();
		});

		Schema::create($kmreadingTable, function (Blueprint $table) use ($vehiclesTable)
		{
			$table->uuid('id')->primary();
			$table->unsignedBigInteger('user_id')->nullable();
			$table->foreign('user_id')->references('id')->on('users');
			$table->string('vehicle_id')->nullable();
			$table->foreign('vehicle_id')->references('id')->on($vehiclesTable);
			$table->decimal('km', 10, 1);
			$table->timestamp('registered_at')->nullable();
			$table->softDeletes();
			$table->timestamps();
		});
	}

	public function down() : void
	{
		$typesTable = config('vehicles.models.vehicleType.table');
		$modelsTable = config('vehicles.models.vehicleModel.table');
		$vehiclesTable = config('vehicles.models.vehicle.table');
		$kmreadingTable = config('vehicles.models.kmreading.table');

		Schema::dropIfExists($kmreadingTable);
		Schema::dropIfExists($vehiclesTable);
		Schema::dropIfExists($modelsTable);
		Schema::dropIfExists($typesTable);
	}
};
