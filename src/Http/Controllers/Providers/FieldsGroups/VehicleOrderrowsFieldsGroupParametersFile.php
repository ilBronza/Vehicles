<?php

namespace IlBronza\Vehicles\Http\Controllers\Providers\FieldsGroups;

use IlBronza\Datatables\Providers\FieldsGroupParametersFile;

class VehicleOrderrowsFieldsGroupParametersFile extends FieldsGroupParametersFile
{
	static function getFieldsGroup() : array
	{
		return [
            'translationPrefix' => 'products::fields',
            'fields' => 
            [
                'mySelfPrimary' => 'primary',
                'mySelfEdit.order' => 'links.edit',
                'mySelfSee.order' => 'products::orders.order',

                'sellable.name' => 'flat',

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