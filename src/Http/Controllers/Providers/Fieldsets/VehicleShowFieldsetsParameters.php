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
                    'slug' => ['text' => 'string|nullable'],
                    'plate' => ['text' => 'string|required'],
                    'vehicle_model_id' => [
                        'type' => 'select',
                        'multiple' => false,
                        'rules' => 'string|nullable|exists:vehicles__vehicle_models,id',
                        'relation' => 'vehicleModel'
                    ],
                    'type_id' => [
                        'type' => 'select',
                        'multiple' => false,
                        'rules' => 'string|required|exists:vehicles__types,id',
                        'relation' => 'vehicleType'
                    ],
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
