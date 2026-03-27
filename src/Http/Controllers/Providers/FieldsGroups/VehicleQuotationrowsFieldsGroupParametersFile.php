<?php

namespace IlBronza\Vehicles\Http\Controllers\Providers\FieldsGroups;

use IlBronza\Datatables\Providers\FieldsGroupParametersFile;

class VehicleQuotationrowsFieldsGroupParametersFile extends FieldsGroupParametersFile
{
	static function getFieldsGroup() : array
	{
		return [
            'translationPrefix' => 'products::fields',
            'fields' => 
            [
                'mySelfPrimary' => 'primary',
                'mySelfEdit.quotation' => 'links.edit',
                'mySelfSee.quotation' => 'products::orders.order',

                'description' => [
                    'type' => 'flat',
                    'width' => '20em'
                ],

                'starts_at' => 'dates.date',
                'ends_at' => 'dates.date',
                'quantity' => 'flat',
                'calculated_row_total' => 'numbers.price'

            ]
        ];
	}
}