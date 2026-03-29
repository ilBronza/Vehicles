<?php

namespace IlBronza\Vehicles\Http\Controllers\Providers\Fieldsets;

use IlBronza\Form\Helpers\FieldsetsProvider\FieldsetParametersFile;

class VehicleTypeCreateStoreFieldsetsParameters extends FieldsetParametersFile
{
	public function _getFieldsetsParameters() : array
	{
		return [
			'package' => [
				'translationPrefix' => 'vehicles::fields',
				'fields' => [
					'name' => ['text' => 'string|required'],
				],
				'width' => ["1-3@l", '1-2@m']
			],
		];
	}
}
