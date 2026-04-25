<?php

namespace IlBronza\Vehicles\Http\Controllers\Providers\Fieldsets;

use IlBronza\Products\Providers\Helpers\RowsHelpers\RowFieldsetParametersFile;
use IlBronza\Vehicles\Models\VehicleType;

class VehicleOrderrowEditUpdateFieldsetsParameters extends RowFieldsetParametersFile
{
    public function _getFieldsetsParameters() : array
    {
        $result = [
            'main' => [
                'translationPrefix' => 'products::fields',
                'fields' => [
                    'quantity' => ['number' => 'numeric|nullable'],
                ],
                'width' => ["1-3@l", '1-2@m']
            ],
        ];

        return static::addRowCostsFieldset(
            $result,
            VehicleType::gpc()::make()
        );
    }
}
