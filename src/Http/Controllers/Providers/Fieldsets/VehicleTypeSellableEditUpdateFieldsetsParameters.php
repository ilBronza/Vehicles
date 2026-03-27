<?php

namespace IlBronza\Vehicles\Http\Controllers\Providers\Fieldsets;

class VehicleTypeSellableEditUpdateFieldsetsParameters extends VehicleTypeEditUpdateFieldsetsParameters
{
    public function _getFieldsetsParameters() : array
    {
        $result = parent::_getFieldsetsParameters();

        $result['pricings'] = [
                'translationPrefix' => 'vehicles::fields',
                'fields' => [
                    'cost_per_km' => ['number' => 'numeric|nullable'],
                    'cost_per_movimentation' => ['number' => 'numeric|nullable'],
                ],
                'width' => ["1-3@l", '1-2@m']
            ];

        return $result;
    }
}
