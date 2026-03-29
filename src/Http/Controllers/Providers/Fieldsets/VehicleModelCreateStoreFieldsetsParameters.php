<?php

namespace IlBronza\Vehicles\Http\Controllers\Providers\Fieldsets;

use IlBronza\Form\Helpers\FieldsetsProvider\FieldsetParametersFile;

class VehicleModelCreateStoreFieldsetsParameters extends FieldsetParametersFile
{
	public function _getFieldsetsParameters() : array
	{
		return [
			'anagrafica' => [
				'translationPrefix' => 'vehicles::vehicleTypes',
				'fields' => [
					'brand' => ['text' => 'string|nullable'],
					'name' => ['text' => 'string|required'],
					'vehicle_type' => [
						'type' => 'select',
						'multiple' => false,
						'rules' => 'string|nullable|exists:vehicles__types,id',
						'relation' => 'vehicleType',
					],
					'passengers' => ['number' => 'integer|nullable|min:0|max:64'],
					'license_needed' => ['text' => 'string|nullable'],
					'fuels' => ['text' => 'string|nullable'],
				],
				'width' => ["1-3@l", '1-2@m']
			],
			'misureMarcia' => [
				'translationPrefix' => 'vehicles::fields',
				'fields' => [
					'sizes_marching_external_length' => ['number' => 'numeric|nullable|min:0'],
					'sizes_marching_external_width' => ['number' => 'numeric|nullable|min:0'],
					'sizes_marching_external_height' => ['number' => 'numeric|nullable|min:0'],
					'sizes_marching_internal_length' => ['number' => 'numeric|nullable|min:0'],
					'sizes_marching_internal_width' => ['number' => 'numeric|nullable|min:0'],
					'sizes_marching_internal_height' => ['number' => 'numeric|nullable|min:0'],
					'mass_empty' => ['number' => 'numeric|nullable|min:0'],
				],
				'width' => ["1-3@l", '1-2@m']
			],
			'misureUtilizzo' => [
				'translationPrefix' => 'vehicles::fields',
				'fields' => [
					'sizes_functioning_external_length' => ['number' => 'numeric|nullable|min:0'],
					'sizes_functioning_external_width' => ['number' => 'numeric|nullable|min:0'],
					'sizes_functioning_external_height' => ['number' => 'numeric|nullable|min:0'],
					'sizes_functioning_internal_length' => ['number' => 'numeric|nullable|min:0'],
					'sizes_functioning_internal_width' => ['number' => 'numeric|nullable|min:0'],
					'sizes_functioning_internal_height' => ['number' => 'numeric|nullable|min:0'],
					'sizes_functioning_internal_volume_mq' => ['number' => 'numeric|nullable|min:0'],
					'mass_max_loading' => ['number' => 'numeric|nullable|min:0'],
				],
				'width' => ["1-3@l", '1-2@m']
			],
			'consumptions' => [
				'translationPrefix' => 'vehicles::fields',
				'fields' => [
					'km_liter_city' => ['number' => 'numeric|nullable|min:0'],
					'km_liter_extra' => ['number' => 'numeric|nullable|min:0'],
					'km_liter_highway' => ['number' => 'numeric|nullable|min:0'],
				],
				'width' => ["1-3@l", '1-2@m']
			],
		];
	}
}
