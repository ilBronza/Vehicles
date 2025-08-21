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

                'plate' => 'flat',
                'slug' => 'flat',

                'type' => [
                    'type' => 'links.link',
                    'function' => 'getShowUrl',
                    'textParameter' => 'name',
                    'target' => '_blank',
                    'icon' => false,
                    'width' => '245px'
                ],


                'description' => [
                    'type' => 'flat',
                    'width' => '20em'
                ],

                'type.producer' => 'flat',
                'type.vehicle_type' => 'flat',
                'type.passengers' => [
                    'type' => 'flat',
                    'width' => '4em'
                ],
                'type.fuels' => 'flat',
                'type.external_length' => [
                    'type' => 'flat',
                    'width' => '4em'
                ],
                'type.external_width' => [
                    'type' => 'flat',
                    'width' => '4em'
                ],
                'type.external_height' => [
                    'type' => 'flat',
                    'width' => '4em'
                ],
                'type.mass_empty' => 'flat',
                'type.mass_max_loading' => 'flat',

                'name' => [
                    'type' => 'flat',
                    'width' => '14em'
                ],

                'cost_per_km' => 'flat',
                'registered_at' => 'flat',

                'initial_km' => 'flat',
                'current_km' => 'flat',

                'mySelfDelete' => 'links.delete'
            ]
        ];
	}
}