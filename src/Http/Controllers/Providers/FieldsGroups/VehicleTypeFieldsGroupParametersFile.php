<?php

namespace IlBronza\Vehicles\Http\Controllers\Providers\FieldsGroups;

use IlBronza\Datatables\Providers\FieldsGroupParametersFile;

class VehicleTypeFieldsGroupParametersFile extends FieldsGroupParametersFile
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
				'name' => 'flat',
				'cost_per_km' => 'numbers.number2',
				'cost_per_movimentation' => 'numbers.number2',
				'cost_per_day' => 'numbers.number2',
				'vehicles_count' => 'flat',
				'mySelfDelete' => 'links.delete'
			]
		];
	}
}
