<?php

namespace IlBronza\Vehicles\Http\Controllers\Providers\Fieldsets;

use IlBronza\Form\Helpers\FieldsetsProvider\FieldsetParametersFile;

class VehicleCreateStoreFieldsetsParameters extends FieldsetParametersFile
{
    public function _getFieldsetsParameters() : array
    {
        return [
            'package' => [
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
                'width' => ["1-3@l", '1-2@m']
            ],
            'registration' => [
                'translationPrefix' => 'vehicles::fields',
                'fields' => [
                    'registered_at' => ['date' => 'date|nullable'],
                    'initial_km' => ['number' => 'numeric|nullable|min:0']
                ],
                'width' => ["1-3@l", '1-2@m']
            ]
        ];
    }
}
