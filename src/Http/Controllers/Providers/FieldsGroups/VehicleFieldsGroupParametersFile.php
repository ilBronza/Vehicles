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

                'vehicleType' => [
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

                'vehicleType.producer' => 'flat',
                'vehicleType.vehicle_type' => 'flat',
                'vehicleType.passengers' => [
                    'type' => 'flat',
                    'width' => '4em'
                ],
                'vehicleType.fuels' => 'flat',
                'vehicleType.external_length' => [
                    'type' => 'flat',
                    'width' => '4em'
                ],
                'vehicleType.external_width' => [
                    'type' => 'flat',
                    'width' => '4em'
                ],
                'vehicleType.external_height' => [
                    'type' => 'flat',
                    'width' => '4em'
                ],
                'vehicleType.mass_empty' => 'flat',
                'vehicleType.mass_max_loading' => 'flat',

                'name' => [
                    'type' => 'flat',
                    'width' => '14em'
                ],

                'cost_per_km' => 'flat',
                'cost_per_movimentation' => 'flat',
                'registered_at' => 'flat',

                'initial_km' => 'flat',
                'current_km' => 'flat',

                'mySelfDelete' => 'links.delete'
            ]
        ];
	}
}