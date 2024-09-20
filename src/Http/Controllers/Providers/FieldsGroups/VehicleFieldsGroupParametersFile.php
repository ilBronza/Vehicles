<?php

namespace IlBronza\Vehicles\Http\Controllers\Providers\FieldsGroups;

use IlBronza\Datatables\Providers\FieldsGroupParametersFile;

class VehicleFieldsGroupParametersFile extends FieldsGroupParametersFile
{
	static function getFieldsGroup() : array
	{
		return [
            'translationPrefix' => 'vehicles::fields',
            'fields' => 
            [
                'mySelfPrimary' => 'primary',
                'mySelfEdit' => 'links.edit',
                'mySelfSee' => 'links.see',

                'type' => [
                    'type' => 'links.link',
                    'function' => 'getShowUrl',
                    'textParameter' => 'name',
                    'target' => '_blank',
                    'icon' => false,
                    'width' => '245px'
                ],


//                'sellableSuppliers_count' => 'flat',
//                'sellable_suppliers_count' => 'flat',

                'name' => 'flat',
                'plate' => 'flat',
                'registered_at' => 'flat',

                'initial_km' => 'flat',
                'current_km' => 'flat',

                'mySelfDelete' => 'links.delete'
            ]
        ];
	}
}