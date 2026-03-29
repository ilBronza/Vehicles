<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up() : void
	{
		$modelsTable = config('vehicles.models.vehicleModel.table');
		$vehiclesTable = config('vehicles.models.vehicle.table');

			Schema::create($modelsTable, function (Blueprint $table)
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
				$table->decimal('external_length')->nullable();
				$table->decimal('external_width')->nullable();
				$table->decimal('external_height')->nullable();
				$table->decimal('internal_length')->nullable();
				$table->decimal('internal_width')->nullable();
				$table->decimal('internal_height')->nullable();
				$table->decimal('internal_volume_mq')->nullable();
				$table->decimal('mass_empty')->nullable();
				$table->decimal('mass_max_loading')->nullable();
				$table->string('license_needed')->nullable();
				$table->softDeletes();
				$table->timestamps();
			});

			Schema::table($vehiclesTable, function (Blueprint $table) use ($modelsTable)
			{
				$table->string('vehicle_model_id')->nullable()->after('id');
				$table->foreign('vehicle_model_id')->references('id')->on($modelsTable);
			});
	}

	public function down() : void
	{
		$modelsTable = config('vehicles.models.vehicleModel.table');
		$vehiclesTable = config('vehicles.models.vehicle.table');

			Schema::table($vehiclesTable, function (Blueprint $table)
			{
				$table->dropForeign(['vehicle_model_id']);
				$table->dropColumn('vehicle_model_id');
			});

		Schema::dropIfExists($modelsTable);
	}
};
