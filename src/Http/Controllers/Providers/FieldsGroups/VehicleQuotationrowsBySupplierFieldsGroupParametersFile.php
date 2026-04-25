<?php

namespace IlBronza\Vehicles\Http\Controllers\Providers\FieldsGroups;

use IlBronza\Products\Models\Quotations\Quotation;
use IlBronza\Products\Providers\Helpers\RowsHelpers\RowsFieldsGroupParametersFile;
use IlBronza\Vehicles\Models\VehicleType;


class VehicleQuotationrowsBySupplierFieldsGroupParametersFile extends RowsFieldsGroupParametersFile
{
	static function getFieldsGroup() : array
	{
        $helper = static::createByContainer(Quotation::gpc()::make());

        $fields = $helper->getRowStartingFields();


        $fields = static::addCostsFields(
            $fields,
            VehicleType::gpc()::make()
        );

		$result = [
            'translationPrefix' => 'products::fields',
            'fields' => $fields
        ];

        return $result;
	}
}