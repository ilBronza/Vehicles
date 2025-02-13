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
		Schema::table(config('vehicles.models.vehicle.table'), function (Blueprint $table) {
			$table->unsignedInteger('initial_km')->nullable();
			$table->string('slug', 12)->after('id')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 */
	public function down(): void
	{
		Schema::table(config('vehicles.models.vehicle.table'), function (Blueprint $table) {
			$table->dropColumn('initial_km');
			$table->dropColumn('slug');
		});
	}
};
