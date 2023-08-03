<?php

namespace IlBronza\Vehicles\Http\Controllers\Providers\Fieldsets;

use IlBronza\Form\Helpers\FieldsetsProvider\FieldsetParametersFile;

class KmreadingShowFieldsetsParameters extends FieldsetParametersFile
{
    public function _getFieldsetsParameters() : array
    {
        return [
            'package' => [
                'fields' => [
                    'km' => ['number' => 'numeric'],
                    'registered_at' => ['datetime' => 'date|required'],
                    'vehicle_id' => [
                        'type' => 'select',
                        'multiple' => false,
                        'rules' => 'string|nullable|exists:vehicles__vehicles,id',
                        'relation' => 'vehicle'
                    ],
                    'user_id' => [
                        'type' => 'select',
                        'multiple' => false,
                        'rules' => 'string|nullable|exists:users,id',
                        'relation' => 'user'
                    ],

                ],
                'width' => ["1-3@l", '1-2@m']
            ]
        ];
    }
}
