<?php

namespace IlBronza\Vehicles\Http\Controllers\Providers\Fieldsets;

use IlBronza\Form\Helpers\FieldsetsProvider\FieldsetParametersFile;

class VehicleShowFieldsetsParameters extends FieldsetParametersFile
{
    public function _getFieldsetsParameters() : array
    {
        return [
            'baseData' => [
                'translationPrefix' => 'vehicles::fields',
                'fields' => [
                    'name' => ['text' => 'string|required'],
                    'plate' => ['text' => 'string|required'],
                    'type_id' => [
                        'type' => 'select',
                        'multiple' => false,
                        'rules' => 'string|nullable|exists:vehicles__types,id',
                        'relation' => 'type'
                    ],
                ],
	            'width' => ['large']
            ],
            'registration' => [
                'translationPrefix' => 'vehicles::fields',
                'fields' => [
                    'registered_at' => ['date' => 'date|nullable'],
                    'initial_km' => ['number' => 'numeric|nullable|min:0'],
                    'current_km' => ['number' => 'numeric|nullable|min:0']
                ],
	            'width' => ['medium']
            ]
        ];
    }
}
