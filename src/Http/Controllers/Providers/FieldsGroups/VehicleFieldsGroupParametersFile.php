<?php

namespace IlBronza\Vehicles\Http\Controllers\Providers\FieldsGroups;

use IlBronza\Datatables\Providers\FieldsGroupParametersFile;

class VehicleFieldsGroupParametersFile extends FieldsGroupParametersFile
{
	static function getFieldsGroup() : array
	{
		return [
			'translationPrefix' => 'vehicles::fields',
			'fields' =>
			[
				'mySelfPrimary' => 'primary',
				'mySelfEdit' => 'links.edit',
				'mySelfSee' => 'links.see',

				'plate' => 'flat',
				'slug' => 'flat',

				'vehicleType' => [
					'type' => 'links.seeName',
					'width' => '10em',
				],
				'vehicleModel.brand' => 'flat',
				'vehicleModel.name' => 'flat',

				'vehicleModel.passengers' => 'flat',
				'vehicleModel.fuels' => 'flat',

				'cost_per_km' => 'flat',
				'cost_per_movimentation' => 'flat',
				'cost_per_day' => 'flat',

				'mySelfDelete' => 'links.delete'
			]
		];
	}
}
