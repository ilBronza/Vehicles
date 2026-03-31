<?php

namespace IlBronza\Vehicles\Http\Controllers\Providers\Fieldsets;

use IlBronza\Form\Helpers\FieldsetsProvider\FieldsetParametersFile;

class VehicleTypeEditUpdateFieldsetsParameters extends FieldsetParametersFile
{
	public function _getFieldsetsParameters() : array
	{
		return [
			'baseParameters' => [
				'translationPrefix' => 'vehicles::fields',
				'fields' => [
					'name' => ['text' => 'string|required'],
				],
				'width' => ['large']
			],
            'costs' => [
                'translationPrefix' => 'vehicles::fields',
                'fields' => [
                    'cost_per_km' => [
                        'type' => 'number',
                        'rules' => 'numeric|nullable|min:0',
                        'vertical' => true
                    ],
                    'cost_per_movimentation' => [
                        'type' => 'number',
                        'rules' => 'numeric|nullable|min:0',
                        'vertical' => true
                    ],
                    'cost_per_day' => [
                        'type' => 'number',
                        'rules' => 'numeric|nullable|min:0',
                        'vertical' => true
                    ],
                ],
                'width' => ['small']
            ],
		];
	}
}
