<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up() : void
	{
		$table = 'products__sellables__sellables';

		if (! Schema::hasTable($table))
			return;

		$legacy = [
			'Type',
			'type',
			'IlBronza\\Vehicles\\Models\\Type',
			'IlBronza\\Vehicles\\Models\\Sellables\\Type',
		];

		DB::table($table)->whereIn('target_type', $legacy)->update(['target_type' => 'VehicleType']);
	}

	public function down() : void
	{
		$table = 'products__sellables__sellables';

		if (! Schema::hasTable($table))
			return;

		DB::table($table)->where('target_type', 'VehicleType')->update(['target_type' => 'Type']);
	}
};
