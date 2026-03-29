<?php

namespace IlBronza\Vehicles\Http\Controllers\Providers\Fieldsets;

use IlBronza\Form\Helpers\FieldsetsProvider\FieldsetParametersFile;

class VehicleTypeEditUpdateFieldsetsParameters extends FieldsetParametersFile
{
	public function _getFieldsetsParameters() : array
	{
		return [
			'package' => [
				'translationPrefix' => 'vehicles::fields',
				'fields' => [
					'name' => ['text' => 'string|required'],
				],
				'width' => ["1-3@l", '1-2@m"]
			],
			'pricing' => [
				'translationPrefix' => 'vehicles::fields',
				'fields' => [
					'cost_per_km' => ['number' => 'numeric|nullable|min:0'],
					'cost_per_movimentation' => ['number' => 'numeric|nullable|min:0'],
				],
				'width' => ["1-3@l", '1-2@m']
			],
		];
	}
}
