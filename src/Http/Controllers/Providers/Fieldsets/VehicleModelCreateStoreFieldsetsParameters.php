<?php

namespace IlBronza\Vehicles\Http\Controllers\Providers\Fieldsets;

use IlBronza\Form\Helpers\FieldsetsProvider\FieldsetParametersFile;

class VehicleModelCreateStoreFieldsetsParameters extends FieldsetParametersFile
{
	public function _getFieldsetsParameters() : array
	{
		return [
			'package' => [
				'translationPrefix' => 'vehicles::fields',
				'fields' => [
					'brand' => ['text' => 'string|nullable'],
					'name' => ['text' => 'string|required'],
					'passengers' => ['number' => 'integer|nullable|min:0|max:64'],
					'license_needed' => ['text' => 'string|nullable'],
					'fuels' => ['text' => 'string|nullable'],
					'vehicle_type' => ['text' => 'string|nullable'],
				],
				'width' => ["1-3@l", "1-2@m"]
			],
			'consumptions' => [
				'translationPrefix' => 'vehicles::fields',
				'fields' => [
					'km_liter_city' => ['number' => 'numeric|nullable|min:0'],
					'km_liter_extra' => ['number' => 'numeric|nullable|min:0'],
					'km_liter_highway' => ['number' => 'numeric|nullable|min:0'],
				],
				'width' => ["1-3@l", "1-2@m"]
			],
			'sizes' => [
				'translationPrefix' => 'vehicles::fields',
				'fields' => [
					'external_length' => ['number' => 'numeric|nullable|min:0'],
					'external_width' => ['number' => 'numeric|nullable|min:0'],
					'external_height' => ['number' => 'numeric|nullable|min:0'],
					'mass_empty' => ['number' => 'numeric|nullable|min:0'],
				],
				'width' => ["1-3@l", "1-2@m"]
			],
			'internal' => [
				'translationPrefix' => 'vehicles::fields',
				'fields' => [
					'internal_length' => ['number' => 'numeric|nullable|min:0'],
					'internal_width' => ['number' => 'numeric|nullable|min:0'],
					'internal_height' => ['number' => 'numeric|nullable|min:0'],
					'mass_max_loading' => ['number' => 'numeric|nullable|min:0'],
					'internal_volume_mq' => ['number' => 'numeric|nullable|min:0'],
				],
				'width' => ["1-3@l", "1-2@m"]
			]
		];
	}
}
