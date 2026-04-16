<?php

namespace IlBronza\Vehicles\Http\Controllers\Providers\FieldsGroups;

use IlBronza\Datatables\Providers\FieldsGroupParametersFile;

class VehicleModelFieldsGroupParametersFile extends FieldsGroupParametersFile
{
	static function getFieldsGroup() : array
	{
		$narrow = ['type' => 'flat', 'width' => '8em'];

		return [
			'translationPrefix' => 'vehicles::fields',
			'fields' =>
			[
				'mySelfPrimary' => 'primary',
				'mySelfEdit' => 'links.edit',
				'mySelfSee' => 'links.see',
				'brand' => 'flat',
				'name' => 'flat',
				'vehicleType.name' => 'flat',
				'vehicles_count' => 'flat',
				'passengers' => 'flat',
				'license_needed' => 'flat',
				'sizes_marching_external_length' => $narrow,
				'sizes_marching_external_width' => $narrow,
				'sizes_marching_external_height' => $narrow,
				'sizes_marching_internal_length' => $narrow,
				'sizes_marching_internal_width' => $narrow,
				'sizes_marching_internal_height' => $narrow,
				'mass_empty' => 'flat',
				'sizes_functioning_external_length' => $narrow,
				'sizes_functioning_external_width' => $narrow,
				'sizes_functioning_external_height' => $narrow,
				'sizes_functioning_internal_length' => $narrow,
				'sizes_functioning_internal_width' => $narrow,
				'sizes_functioning_internal_height' => $narrow,
				'sizes_functioning_internal_volume_mq' => $narrow,
				'mass_max_loading' => 'flat',
				'mySelfDelete' => 'links.delete'
			]
		];
	}
}
