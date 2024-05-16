<?php

namespace IlBronza\Vehicles\Http\Controllers\Providers\Fieldsets;

use IlBronza\Form\Helpers\FieldsetsProvider\FieldsetParametersFile;

class KmreadingCreateStoreFieldsetsParameters extends FieldsetParametersFile
{
    public function _getFieldsetsParameters() : array
    {
        if($lastKmreading = $this->getModel()?->getVehicle()?->getLastKmreading())
            $min = $lastKmreading->getKm();

        return [
            'package' => [
                'translationPrefix' => 'vehicles::fields',
                'fields' => [
                    'km' => ['number' => 'numeric|required|min:' . ($min ?? 0)],
                    'registered_at' => ['datetime' => 'date|required'],
                    'vehicle_id' => [
                        'type' => 'select',
                        'multiple' => false,
                        'rules' => 'string|nullable|exists:vehicles__vehicles,id',
                        'relation' => 'vehicle'
                    ],

                ],
                'width' => ["1-3@l", '1-2@m']
            ]
        ];
    }
}
