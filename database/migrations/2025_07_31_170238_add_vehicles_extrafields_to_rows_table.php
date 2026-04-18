<?php

use IlBronza\Vehicles\Models\Sellables\VehicleType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up() : void
	{
		if(! app('products'))
		{
			echo "la migration non ha creato i campi extrafields per le tabelle vehicles";
			return ;
		}

		$relation = \IlBronza\Products\Models\Orders\Orderrow::gpc()::make()->extraFields();

		$table = $relation->getRelated()->getTable();

		Schema::table($table, function (Blueprint $table) {
			foreach(VehicleType::gpc()::make()->getPriceFieldsForSellable() as $field => $parameter)
				$table->decimal('stored_' . $field, 10, 2)->nullable();
		});
	}

	public function down() : void
	{
		if(! app('products'))
			return ;

		$relation = \IlBronza\Products\Models\Orders\Orderrow::gpc()::make()->extraFields();

		$table = $relation->getRelated()->getTable();

		Schema::table($table, function (Blueprint $table) {
			foreach(VehicleType::gpc()::make()->getPriceFieldsForSellable() as $field => $parameter)
				$table->dropColumn('stored_' . $field);
		});
	}

};
