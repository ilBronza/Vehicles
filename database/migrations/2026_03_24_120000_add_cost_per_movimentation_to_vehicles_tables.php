<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	/**
	 * Run the migrations.
	 */
	public function up(): void
	{
		Schema::table(config('vehicles.models.type.table'), function (Blueprint $table) {
			$table->decimal('cost_per_movimentation')->nullable()->after('cost_per_km');
		});

		Schema::table(config('vehicles.models.vehicle.table'), function (Blueprint $table) {
			$table->decimal('cost_per_movimentation')->nullable()->after('cost_per_km');
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::table(config('vehicles.models.type.table'), function (Blueprint $table) {
			$table->dropColumn('cost_per_movimentation');
		});

		Schema::table(config('vehicles.models.vehicle.table'), function (Blueprint $table) {
			$table->dropColumn('cost_per_movimentation');
		});
	}
};
